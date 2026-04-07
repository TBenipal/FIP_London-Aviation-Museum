<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events — Admin</title>
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/grid.css" rel="stylesheet">
</head>
<body data-page="events" id="event-panel">
<div id="admin-events">
    <div class="page-header">
        <div>
            <a id="header-dashboard" href="dashboard.php">← Dashboard</a>
            <h1 id="header-events">Events</h1>
        </div>
        <button class="btn btn-primary" id="new-event-btn">+ New Event</button>
    </div>

    <div id="feedback"></div>
    <table id="events-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Category</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="events-body">
            <tr><td id="loading" colspan="5">Loading...</td></tr>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal-overlay" id="modal">
    <div class="modal">
        <h2 id="modal-title">New Event</h2>

        <div class="form-group">
            <label>Title *</label>
            <input type="text" id="f-title" placeholder="e.g. BCATP Anniversary Lecture">
        </div>
        <div class="form-group">
            <label>Description *</label>
            <textarea id="f-desc" placeholder="Describe the event..."></textarea>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Date *</label>
                <input type="date" id="f-date">
            </div>
            <div class="form-group">
                <label>Time (optional)</label>
                <input type="time" id="f-time">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Location</label>
                <input type="text" id="f-location" placeholder="e.g. London International Airport">
            </div>
            <div class="form-group">
                <label>Category</label>
                <select id="f-category">
                    <option value="">— Select —</option>
                    <option value="Lecture">Lecture</option>
                    <option value="Exhibition">Exhibition</option>
                    <option value="Workshop">Workshop</option>
                    <option value="Commemoration">Commemoration</option>
                    <option value="Tour">Tour</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label>Featured Image URL</label>
            <input type="text" id="f-img" placeholder="uploads/events/photo.jpg">
        </div>
        <div class="form-group">
            <label>Status</label>
            <select id="f-status">
                <option value="draft">Draft</option>
                <option value="published">Published</option>
                <option value="archived">Archived</option>
            </select>
        </div>

        <div class="modal-actions">
            <button class="btn" id="cancel-btn">Cancel</button>
            <button class="btn btn-primary" id="save-btn">Save Event</button>
        </div>
    </div>
</div>

<script>
const API        = '../includes/events.php';
const modal      = document.querySelector('#modal');
const feedbackEl = document.querySelector('#feedback');
const eventsBody = document.querySelector('#events-body');

let currentEditId = null;

function escapeHtml(str) {
    // I use split/join to avoid regex per the no-regex rule
    const s = String(str);
    return s.split('&').join('&amp;').split('<').join('&lt;').split('>').join('&gt;');
}

function formatDate(dateStr) {
    if (!dateStr) {
        return '—';
    }
    const parts  = dateStr.split('-');
    const year   = parts[0];
    const month  = parseInt(parts[1], 10);
    const day    = parseInt(parts[2], 10);
    const months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    return months[month - 1] + ' ' + day + ', ' + year;
}

function showFeedback(msg, isError) {
    feedbackEl.textContent = msg;
    if (isError) {
        feedbackEl.className = 'error';
    } else {
        feedbackEl.className = 'success';
    }
    setTimeout(clearFeedback, 4000);
}

function clearFeedback() {
    feedbackEl.className = '';
}

function buildEventRow(event) {
    let category = '—';
    if (event.category) {
        category = event.category;
    }

    return '<tr>' +
        '<td><strong>' + escapeHtml(event.title) + '</strong></td>' +
        '<td>' + formatDate(event.event_date) + '</td>' +
        '<td>' + escapeHtml(category) + '</td>' +
        '<td><span class="badge badge-' + escapeHtml(event.status) + '">' + escapeHtml(event.status) + '</span></td>' +
        '<td>' +
        '<button class="btn btn-sm btn-primary" data-edit-id="' + event.id + '">Edit</button>' +
        '<button class="btn btn-sm btn-danger" data-delete-id="' + event.id + '" style="margin-left:0.4rem;">Delete</button>' +
        '</td>' +
        '</tr>';
}

function attachTableListeners() {
    const editBtns   = eventsBody.querySelectorAll('[data-edit-id]');
    const deleteBtns = eventsBody.querySelectorAll('[data-delete-id]');

    let i = 0;
    while (i < editBtns.length) {
        editBtns[i].addEventListener('click', handleEditClick);
        i++;
    }

    let j = 0;
    while (j < deleteBtns.length) {
        deleteBtns[j].addEventListener('click', handleDeleteClick);
        j++;
    }
}

async function loadEvents() {
    const res  = await fetch(API + '?all=1');
    const data = await res.json();

    if (data.error) {
        eventsBody.innerHTML = '<tr><td colspan="5" style="opacity:0.5;">Could not load events.</td></tr>';
        return;
    }

    if (!data.length) {
        eventsBody.innerHTML = '<tr><td colspan="5" style="opacity:0.5;">No events yet.</td></tr>';
        return;
    }

    let rowsHtml = '';
    let i = 0;
    while (i < data.length) {
        rowsHtml += buildEventRow(data[i]);
        i++;
    }
    eventsBody.innerHTML = rowsHtml;
    attachTableListeners();
}

function resetModalFields() {
    document.querySelector('#modal-title').textContent = 'New Event';
    document.querySelector('#f-title').value           = '';
    document.querySelector('#f-desc').value            = '';
    document.querySelector('#f-date').value            = '';
    document.querySelector('#f-time').value            = '';
    document.querySelector('#f-location').value        = '';
    document.querySelector('#f-category').value        = '';
    document.querySelector('#f-img').value             = '';
    document.querySelector('#f-status').value          = 'draft';
    currentEditId = null;
}

function showModal() {
    modal.classList.add('active');
}

function openNewEventModal() {
    resetModalFields();
    showModal();
}

function closeModal() {
    modal.classList.remove('active');
}

async function openEditEventModal(id) {
    const res   = await fetch(API + '?id=' + id);
    const event = await res.json();

    document.querySelector('#modal-title').textContent = 'Edit Event';
    document.querySelector('#f-title').value           = event.title;
    document.querySelector('#f-desc').value            = event.description;
    document.querySelector('#f-date').value            = event.event_date;
    document.querySelector('#f-location').value        = event.location || '';
    document.querySelector('#f-category').value        = event.category || '';
    document.querySelector('#f-img').value             = event.featured_image_url || '';
    document.querySelector('#f-status').value          = event.status;

    if (event.event_time) {
        document.querySelector('#f-time').value = event.event_time;
    } else {
        document.querySelector('#f-time').value = '';
    }

    currentEditId = id;
    showModal();
}

async function saveEvent() {
    const requestBody = {
        title:              document.querySelector('#f-title').value,
        description:        document.querySelector('#f-desc').value,
        event_date:         document.querySelector('#f-date').value,
        event_time:         document.querySelector('#f-time').value,
        location:           document.querySelector('#f-location').value,
        category:           document.querySelector('#f-category').value,
        featured_image_url: document.querySelector('#f-img').value,
        status:             document.querySelector('#f-status').value,
    };

    let method;
    let url;
    if (currentEditId) {
        method = 'PUT';
        url    = API + '?id=' + currentEditId;
    } else {
        method = 'POST';
        url    = API;
    }

    const res  = await fetch(url, { method: method, headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(requestBody) });
    const data = await res.json();

    let feedbackMsg;
    if (data.error) {
        feedbackMsg = data.error;
    } else {
        feedbackMsg = data.message;
    }

    let isError;
    if (data.error) {
        isError = true;
    } else {
        isError = false;
    }

    showFeedback(feedbackMsg, isError);

    if (!data.error) {
        closeModal();
        loadEvents();
    }
}

async function deleteEvent(id) {
    if (!confirm('Delete this event? This cannot be undone.')) {
        return;
    }
    const res  = await fetch(API + '?id=' + id, { method: 'DELETE' });
    const data = await res.json();
    showFeedback(data.message, false);
    loadEvents();
}

function handleEditClick(event) {
    const id = event.currentTarget.getAttribute('data-edit-id');
    openEditEventModal(id);
}

function handleDeleteClick(event) {
    const id = event.currentTarget.getAttribute('data-delete-id');
    deleteEvent(id);
}

document.querySelector('#new-event-btn').addEventListener('click', openNewEventModal);
document.querySelector('#cancel-btn').addEventListener('click',    closeModal);
document.querySelector('#save-btn').addEventListener('click',      saveEvent);

loadEvents();
</script>
</body>
</html>