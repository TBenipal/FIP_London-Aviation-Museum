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
    <title>Admin Dashboard — London Aviation Museum</title>
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/grid.css" rel="stylesheet">
</head>
<body>
<div id="dashboard">
    <div class="dash-header">
        <h1>Admin Dashboard</h1>
        <a href="../includes/admin/logout.php" class="logout-btn">Log Out</a>
    </div>
    <p style="opacity:0.6; margin-bottom:2rem;">Welcome, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></p>

    <div class="dash-grid">
        <a href="events.php" class="dash-card">
            <div class="dash-icon">📅</div>
            <h2>Events</h2>
            <p>Create, edit, and publish museum events</p>
        </a>
        <a href="social-posts.php" class="dash-card">
            <div class="dash-icon">📸</div>
            <h2>Social Media Posts</h2>
            <p>Upload and manage social media content</p>
        </a>
        <a href="../contact.php" class="dash-card">
            <div class="dash-icon">✉️</div>
            <h2>Contact Submissions</h2>
            <p>View messages from the contact form</p>
        </a>
    </div>
</div>
</body>
</html>