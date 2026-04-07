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
    <title>Contact Messages — Admin</title>
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/grid.css" rel="stylesheet">
</head>
<body id="messages-panel">
    <section id="admin-messages" class="grid-con">
        <div class="col-span-full">
            <div class="page-header">
                <div>
                    <a id="header-dashboard" href="dashboard.php">← Dashboard</a>
                    <h1 id="header-messages">Contact Messages</h1>
                </div>
            </div>

            <div id="table-content">
                <table id="messages-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Received</th>
                        </tr>
                    </thead>
                    <tbody id="messages-body">
                        <tr><td id="loading" colspan="4">Loading...</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

<script>
const API          = '../includes/messages.php';
const messagesBody = document.querySelector('#messages-body');

function escapeHtml(str) {
    const s = String(str);
    return s.split('&').join('&amp;').split('<').join('&lt;').split('>').join('&gt;');
}

function formatDateTime(dateStr) {
    if (!dateStr) {
        return '—';
    }
    const parts    = dateStr.split(' ');
    const datePart = parts[0];
    const timePart = parts[1] || '';
    const dateBits = datePart.split('-');
    const months   = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    const month    = parseInt(dateBits[1], 10);
    const day      = parseInt(dateBits[2], 10);
    return months[month - 1] + ' ' + day + ', ' + dateBits[0] + ' ' + timePart;
}

function buildMessageRow(msg) {
    const name = escapeHtml(msg.first_name) + ' ' + escapeHtml(msg.last_name);
    return '<tr>' +
        '<td>' + name + '</td>' +
        '<td><a href="mailto:' + escapeHtml(msg.email) + '">' + escapeHtml(msg.email) + '</a></td>' +
        '<td style="max-width:400px; white-space:pre-wrap;">' + escapeHtml(msg.message) + '</td>' +
        '<td style="white-space:nowrap;">' + formatDateTime(msg.submitted_at) + '</td>' +
        '</tr>';
}

async function loadMessages() {
    const res  = await fetch(API);
    const data = await res.json();

    if (data.error) {
        messagesBody.innerHTML = '<tr><td colspan="4" style="opacity:0.5;">Could not load messages.</td></tr>';
        return;
    }

    if (!data.length) {
        messagesBody.innerHTML = '<tr><td colspan="4" style="opacity:0.5;">No messages yet.</td></tr>';
        return;
    }

    let rowsHtml = '';
    let i = 0;
    while (i < data.length) {
        rowsHtml += buildMessageRow(data[i]);
        i++;
    }
    messagesBody.innerHTML = rowsHtml;
}

loadMessages();
</script>
</body>
</html>