<?php
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Demo credentials (change later)
    if ($username === "admin" && $password === "password") {
        $_SESSION["admin"] = true;
        header("Location: ../../index.php");
        exit();
    } else {
        $error = "Invalid username or password.";
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
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>

        <div class="input-group">
            <input type="text" name="username" placeholder="Username" required>
        </div>

        <div class="input-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <button type="submit" class="login-btn">Login</button>
    </form>
</div>

</body>
</html>