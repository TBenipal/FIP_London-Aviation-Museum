<?php
session_start();
require_once 'includes/database.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if (!$id) {
    header('Location: book-of-remembrance.php');
    exit;
}

try {
    $db   = getConnection();
    $stmt = $db->prepare('SELECT * FROM bor_pilots WHERE id = :id');
    $stmt->execute([':id' => $id]);
    $pilot = $stmt->fetch();
} catch (PDOException $e) {
    $pilot = null;
}

if (!$pilot) {
    header('Location: book-of-remembrance.php');
    exit;
}

$displayName = $pilot['full_name'] ?: ($pilot['last_name'] . ($pilot['initials'] ? ', ' . $pilot['initials'] : ''));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/grid.css" rel="stylesheet">
    <title><?php echo htmlspecialchars($displayName); ?> — Book of Remembrance</title>
    <style>
        #profile-section { max-width: 860px; margin: 4rem auto; padding: 0 1.5rem; }
        .back-link { font-size: 0.85rem; opacity: 0.6; text-decoration: none; display: inline-block; margin-bottom: 2rem; }
        .back-link:hover { opacity: 1; }
        .profile-grid { display: grid; grid-template-columns: 260px 1fr; gap: 3rem; align-items: start; }
        @media (max-width: 640px) { .profile-grid { grid-template-columns: 1fr; } }
        .profile-photo { width: 100%; aspect-ratio: 3/4; object-fit: cover; border-radius: 8px; background: #222; }
        .profile-placeholder { width: 100%; aspect-ratio: 3/4; background: #1a1a1a; border: 1px solid #333; border-radius: 8px; display: flex; align-items: center; justify-content: center; opacity: 0.2; font-size: 5rem; }
        .profile-name { font-size: clamp(1.5rem, 4vw, 2.2rem); margin: 0 0 0.5rem; }
        .profile-label { font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; opacity: 0.5; margin: 1.5rem 0 0.3rem; }
        .profile-value { font-size: 0.95rem; margin: 0; }
        .profile-notes { font-size: 0.9rem; line-height: 1.7; opacity: 0.75; margin-top: 0.3rem; }
        .status-badge { display: inline-block; padding: 0.2rem 0.7rem; border-radius: 20px; font-size: 0.8rem; margin-top: 0.5rem; }
        .status-Yes      { background: #1a4a1a; color: #6fcf6f; }
        .status-No       { background: #2a2a2a; color: #888; }
        .status-KindOf   { background: #2a2a3a; color: #8888cf; }
        .status-Maybe    { background: #3a3a1a; color: #cfcf6f; }
        .status-Additional { background: #1a3a4a; color: #6fcfcf; }
    </style>
</head>
<body data-page="bor-profile">

    <header id="header-section" class="grid-con">
        <h1 class="hidden">Navbar</h1>
        <div id="menu" class="col-span-full">
            <div id="mobile-header">
                <div id="header-logo">
                    <a href="index.php"><img src="images/logo_horizontal.png" alt="London Aviation Museum Logo"></a>
                </div>
                <button class="hamburger" aria-label="Open menu">
                    <span></span><span></span><span></span>
                </button>
            </div>
            <nav id="sidebar">
                <ul>
                    <li class="nav-item"><a href="index.php">Home</a></li>
                    <li class="nav-item"><a href="battle-of-britain.php">Battle of Britain</a></li>
                    <li class="nav-item"><a href="wartime.php">Wartime</a></li>
                    <li class="nav-item"><a href="exhibition.php">Exhibition</a></li>
                    <li class="nav-item"><a href="events.php">Events</a></li>
                    <li class="nav-item"><a href="contact.php">Contact</a></li>
                    <li class="nav-item">
                        <?php if (isset($_SESSION["admin"])): ?>
                            <a class="icon-link" href="includes/admin/logout.php">
                                <svg class="admin-icon" xmlns="http://www.w3.org/2000/svg" id="Layer_2" data-name="Layer 2" viewBox="0 0 73.2 90.1">
                                    <g data-name="Layer 2">
                                        <path class="cls-2" d="M61.9,33.8h-2.8v-10.8C59.1,10.1,49.8,0,36.5,0S14.1,10.3,14.1,23v10.7h0q0,.1,0,0h-2.8c-6.2,0-11.2,5-11.3,11.3v33.8c0,6.2,5,11.2,11.3,11.3h50.6c6.2,0,11.2-5,11.3-11.3v-33.8c0-6.2-5.1-11.2-11.3-11.2ZM19.7,33.8v-10.8c0-9.6,6.6-17.4,16.8-17.4s17,7.6,17,17.4v10.7h0q0,.1,0,0H19.7v.1h0ZM67.5,78.8c0,3.1-2.5,5.6-5.6,5.6H11.3c-3.1,0-5.6-2.5-5.6-5.6v-33.8c0-3.1,2.5-5.6,5.6-5.6h50.6c3.1,0,5.6,2.5,5.6,5.6v33.8ZM42.2,56.3c0,2.1-1.1,3.9-2.8,4.9h-.1.1v9.2c0,1.6-1.3,2.8-2.8,2.8-1.6,0-2.8-1.3-2.8-2.8v-9.2h.1-.1c-1.7-1-2.8-2.8-2.8-4.9,0-3.1,2.5-5.6,5.6-5.6,3.1-.1,5.6,2.4,5.6,5.6Z"/>
                                    </g>
                                </svg>
                            </a>
                        <?php else: ?>
                            <a class="icon-link" href="/admin/login.php">
                                <svg class="admin-icon" xmlns="http://www.w3.org/2000/svg" id="Layer_2" data-name="Layer 2" viewBox="0 0 600 700">
                                    <g data-name="Layer 1">
                                        <g>
                                            <path class="cls-1" d="M300,300c82.84,0,150-67.16,150-150S382.84,0,300,0s-150,67.16-150,150,67.16,150,150,150Z"/>
                                            <path class="cls-1" d="M600,550c0-82.85-67.15-150-150-150H150C67.16,400,0,467.15,0,550v150h600v-150Z"/>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div id="profile-section">
        <a href="book-of-remembrance.php" class="back-link">← Back to Book of Remembrance</a>

        <div class="profile-grid">
            <div>
                <?php if ($pilot['photo_path']): ?>
                    <img class="profile-photo" src="<?php echo htmlspecialchars($pilot['photo_path']); ?>" alt="<?php echo htmlspecialchars($displayName); ?>">
                <?php else: ?>
                    <div class="profile-placeholder">✦</div>
                <?php endif; ?>
            </div>

            <div>
                <h1 class="profile-name"><?php echo htmlspecialchars($displayName); ?></h1>

                <?php
                $statusClass = 'status-' . str_replace(' ', '', $pilot['in_book']);
                ?>
                <span class="status-badge <?php echo $statusClass; ?>">
                    <?php echo htmlspecialchars($pilot['in_book']); ?>
                </span>

                <?php if ($pilot['initials']): ?>
                    <p class="profile-label">Initials</p>
                    <p class="profile-value"><?php echo htmlspecialchars($pilot['initials']); ?></p>
                <?php endif; ?>

                <?php if ($pilot['full_name']): ?>
                    <p class="profile-label">Full Name</p>
                    <p class="profile-value"><?php echo htmlspecialchars($pilot['full_name']); ?></p>
                <?php endif; ?>

                <?php if ($pilot['notes']): ?>
                    <p class="profile-label">Notes</p>
                    <p class="profile-notes"><?php echo htmlspecialchars($pilot['notes']); ?></p>
                <?php endif; ?>

                <p class="profile-label">Record Added</p>
                <p class="profile-value"><?php echo date('F j, Y', strtotime($pilot['created_at'])); ?></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
    <script type="module" src="js/main.js"></script>
</body>
</html>