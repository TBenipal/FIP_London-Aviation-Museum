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
<body id="admin-dashboard">

    <div id="dashboard" class="grid-con">
        
        <div class="dash-header col-span-full">
            <h1>Admin Dashboard</h1>
            <a href="../includes/admin/logout.php" class="logout-btn">
                <svg class="admin-icon" xmlns="http://www.w3.org/2000/svg" id="Layer_2" data-name="Layer 2" viewBox="0 0 73.2 90.1">
                    <g data-name="Layer 2">
                        <path class="cls-2" d="M61.9,33.8h-2.8v-10.8C59.1,10.1,49.8,0,36.5,0S14.1,10.3,14.1,23v10.7h0q0,.1,0,0h-2.8c-6.2,0-11.2,5-11.3,11.3v33.8c0,6.2,5,11.2,11.3,11.3h50.6c6.2,0,11.2-5,11.3-11.3v-33.8c0-6.2-5.1-11.2-11.3-11.2ZM19.7,33.8v-10.8c0-9.6,6.6-17.4,16.8-17.4s17,7.6,17,17.4v10.7h0q0,.1,0,0H19.7v.1h0ZM67.5,78.8c0,3.1-2.5,5.6-5.6,5.6H11.3c-3.1,0-5.6-2.5-5.6-5.6v-33.8c0-3.1,2.5-5.6,5.6-5.6h50.6c3.1,0,5.6,2.5,5.6,5.6v33.8ZM42.2,56.3c0,2.1-1.1,3.9-2.8,4.9h-.1.1v9.2c0,1.6-1.3,2.8-2.8,2.8-1.6,0-2.8-1.3-2.8-2.8v-9.2h.1-.1c-1.7-1-2.8-2.8-2.8-4.9,0-3.1,2.5-5.6,5.6-5.6,3.1-.1,5.6,2.4,5.6,5.6Z"/>
                    </g>
                </svg>
            </a>
        </div>

        <p class="admin-info col-span-full">Welcome, <strong class="username"><?php echo htmlspecialchars($_SESSION['username']); ?></strong></p>

        <div class="dash-grid col-span-full">
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