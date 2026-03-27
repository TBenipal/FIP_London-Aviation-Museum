<?php
session_start();

if (isset($_SESSION['admin'])) {
    header("Location: dashboard.php");
    exit();
}

require_once '../includes/database.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"] ?? '');
    $password = trim($_POST["password"] ?? '');

    // I removed strip_tags — it's unnecessary when using PDO prepared statements
    if ($username === '' || $password === '') {
        $error = "Please enter both username and password.";
    } else {
        try {
            $db   = getConnection();
            $stmt = $db->prepare('SELECT * FROM admins WHERE username = :username LIMIT 1');
            $stmt->execute([':username' => $username]);
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($admin && password_verify($password, $admin['password_hash'])) {
                $_SESSION['admin']    = true;
                $_SESSION['admin_id'] = $admin['id'];
                $_SESSION['username'] = $admin['username'];

                $update = $db->prepare('UPDATE admins SET last_login = NOW() WHERE id = :id');
                $update->execute([':id' => $admin['id']]);

                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Invalid username or password.";
            }

        } catch (PDOException $e) {
            $error = "Login error. Please try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/grid.css" rel="stylesheet">
</head>
<body>

<div id="login-container" class="grid-con">
    <form method="POST" class="login-form col-span-full l-col-start-5 l-col-end-9">
        <h2>Admin Login</h2>

        <?php if (!empty($error)): ?>
            <div class="error-message"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
        <?php endif; ?>

        <div class="input-group">
            <input type="text" name="username" placeholder="Username" required autocomplete="username">
        </div>

        <div class="input-group">
            <input type="password" name="password" placeholder="Password" required autocomplete="current-password">
        </div>

        <button type="submit" class="login-btn">Login</button>
    </form>
</div>

</body>
</html>