<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../includes/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name_raw  = $_POST['nl_name']  ?? '';
    $email_raw = $_POST['nl_email'] ?? '';

    $name  = trim(strip_tags($name_raw));
    $email_clean = str_replace(["\r", "\n", "%0a", "%0d"], '', trim($email_raw));
    $email = filter_var($email_clean, FILTER_VALIDATE_EMAIL);

    $fail = [];

    if ($name === '')  $fail[] = 'name';
    if (!$email)       $fail[] = 'email';

    if (!empty($fail)) {
        echo '<p>Please fix: ' . htmlspecialchars(implode(', ', $fail), ENT_QUOTES, 'UTF-8') . '</p>';
        exit;
    }

    try {
        $db = getConnection();
        $stmt = $db->prepare('
            INSERT INTO newsletter_subscribers (name, email)
            VALUES (:name, :email)
        ');
        $stmt->execute([
            ':name'  => $name,
            ':email' => $email,
        ]);

        $msg = urlencode("You're subscribed! Thanks for joining our newsletter.");
        header("Location: ../index.php?msg=$msg");
        exit();

    } catch (PDOException $e) {
        // Duplicate email
        if ($e->getCode() == 23000) {
            $msg = urlencode("This email is already subscribed.");
            header("Location: ../index.php?msg=$msg");
            exit();
        }
        die('Subscription failed: ' . $e->getMessage());
    }

} else {
    echo "<p>Direct access not allowed.</p>";
    
}