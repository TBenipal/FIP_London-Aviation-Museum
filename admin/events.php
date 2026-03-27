<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ../includes/admin/login.php');
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
<body id="event-panel">
<div id="admin-events">
    <div class="page-header">
        <div>
            <a href="dashboard.php" style="font-size:0.85rem; opacity:0.6; text-decoration:none;">← Dashboard</a>
            <h1 style="margin:0.25rem 0 0;">Events</h1>
        </div>
        <button class="btn btn-primary" onclick="openModal()">+ New Event</button>
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
            <tr><td colspan="5" style="opacity:0.5;">Loading...</td></tr>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal-overlay" id="modal">
    <div class="modal">
        <h2 id="modal-title">New Event</h2>
        <input type="hidden" id="edit-id">

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
            <button class="btn" onclick="closeModal()" style="background:transparent; border:1px solid #555;">Cancel</button>
            <button class="btn btn-primary" onclick="saveEvent()">Save Event</button>
        </div>
    </div>
</div>

<script>
(function () {
    const API = '../includes/events.php';

    async function loadEvents() {
        const res  = await fetch(API + '?all=1');
        const data = await res.json();
        const body = document.getElementById('events-body');

        if (!data.length) {
            body.innerHTML = '<tr><td colspan="5" style="opacity:0.5;">No events yet.</td></tr>';
            return;
        }

        body.innerHTML = data.map(e => `
            <tr>
                <td><strong>${esc(e.title)}</strong></td>
                <td>${formatDate(e.event_date)}</td>
                <td>${esc(e.category || '—')}</td>
                <td><span class="badge badge-${e.status}">${e.status}</span></td>
                <td>
                    <button class="btn btn-sm btn-primary" onclick="editEvent(${e.id})">Edit</button>
                    <button class="btn btn-sm btn-danger" onclick="deleteEvent(${e.id})" style="margin-left:0.4rem;">Delete</button>
                </td>
            </tr>
        `).join('');
    }

    window.openModal = function (reset = true) {
        if (reset) {
            document.getElementById('modal-title').textContent = 'New Event';
            document.getElementById('edit-id').value = '';
            ['title','desc','date','time','location','img'].forEach(f => document.getElementById('f-' + f).value = '');
            document.getElementById('f-category').value = '';
            document.getElementById('f-status').value = 'draft';
        }
        document.getElementById('modal').classList.add('active');
    };

    window.closeModal = function () {
        document.getElementById('modal').classList.remove('active');
    };

    window.editEvent = async function (id) {
        const res  = await fetch(API + '?id=' + id);
        const e    = await res.json();

        document.getElementById('modal-title').textContent = 'Edit Event';
        document.getElementById('edit-id').value  = e.id;
        document.getElementById('f-title').value  = e.title;
        document.getElementById('f-desc').value   = e.description;
        document.getElementById('f-date').value   = e.event_date;
        document.getElementById('f-time').value   = e.event_time || '';
        document.getElementById('f-location').value = e.location || '';
        document.getElementById('f-category').value = e.category || '';
        document.getElementById('f-img').value    = e.featured_image_url || '';
        document.getElementById('f-status').value = e.status;
        openModal(false);
    };

    window.saveEvent = async function () {
        const id = document.getElementById('edit-id').value;
        const body = {
            title:              document.getElementById('f-title').value,
            description:        document.getElementById('f-desc').value,
            event_date:         document.getElementById('f-date').value,
            event_time:         document.getElementById('f-time').value,
            location:           document.getElementById('f-location').value,
            category:           document.getElementById('f-category').value,
            featured_image_url: document.getElementById('f-img').value,
            status:             document.getElementById('f-status').value,
        };

        const method = id ? 'PUT' : 'POST';
        const url    = id ? API + '?id=' + id : API;

        const res  = await fetch(url, { method, headers: {'Content-Type':'application/json'}, body: JSON.stringify(body) });
        const data = await res.json();

        showFeedback(data.error || data.message, !!data.error);
        if (!data.error) { closeModal(); loadEvents(); }
    };

    window.deleteEvent = async function (id) {
        if (!confirm('Delete this event? This cannot be undone.')) return;
        const res  = await fetch(API + '?id=' + id, { method: 'DELETE' });
        const data = await res.json();
        showFeedback(data.message, false);
        loadEvents();
    };

    function showFeedback(msg, isError) {
        const el = document.getElementById('feedback');
        el.textContent = msg;
        el.className   = isError ? 'error' : 'success';
        setTimeout(() => el.className = '', 4000);
    }

    function formatDate(d) {
        if (!d) return '—';
        const [y, m, day] = d.split('-');
        const months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        return `${months[+m - 1]} ${+day}, ${y}`;
    }

    function esc(s) {
        return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
    }

    loadEvents();
})();
</script>
</body>
</html>