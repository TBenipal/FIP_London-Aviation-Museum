<?php
session_start();

// Redirect if already logged in
if (isset($_SESSION['admin'])) {
    header("Location: ../../index.php");
    exit();
}

require_once '../database.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

<<<<<<< Updated upstream
    // Demo credentials (change later)
    if ($username === "admin" && $password === "password") {
        $_SESSION["admin"] = true;
        header("Location: ../../index.php");
        exit();
=======
    $username_raw = $_POST["username"] ?? '';
    $password_raw = $_POST["password"] ?? '';

    $username = trim(strip_tags($username_raw));
    $password = trim($password_raw);

    if ($username === '' || $password === '') {
        $error = "Please enter both username and password.";
>>>>>>> Stashed changes
    } else {
        try {
            $db   = getConnection();
            $stmt = $db->prepare('SELECT * FROM admins WHERE username = :username LIMIT 1');
            $stmt->execute([':username' => $username]);
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

           if ($admin && password_verify($password, $admin['password_hash'])) {
            $_SESSION['admin']    = true;
            $_SESSION['admin_id'] = $admin['id'];        // changed from admin_id
            $_SESSION['username'] = $admin['username'];

            $update = $db->prepare('UPDATE admins SET last_login = NOW() WHERE id = :id');  // changed from admin_id
            $update->execute([':id' => $admin['id']]);   // changed from admin_id

            header("Location: ../../index.php");
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
    <link href="../../css/main.css" rel="stylesheet">
    <link href="../../css/grid.css" rel="stylesheet">
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