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
    <style>
        #dashboard { max-width: 960px; margin: 4rem auto; padding: 0 1.5rem; }
        .dash-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2.5rem; }
        .dash-header h1 { font-size: 1.6rem; margin: 0; }
        .dash-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.5rem; }
        .dash-card { background: var(--color-surface, #1a1a1a); border: 1px solid var(--color-border, #333); border-radius: 8px; padding: 2rem; text-align: center; text-decoration: none; color: inherit; transition: border-color 0.2s; }
        .dash-card:hover { border-color: var(--color-accent, #c8a96e); }
        .dash-card h2 { font-size: 1.1rem; margin: 0.75rem 0 0.4rem; }
        .dash-card p { font-size: 0.85rem; opacity: 0.65; margin: 0; }
        .dash-icon { font-size: 2.5rem; }
        .logout-btn { font-size: 0.85rem; opacity: 0.7; text-decoration: none; }
        .logout-btn:hover { opacity: 1; }
    </style>
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