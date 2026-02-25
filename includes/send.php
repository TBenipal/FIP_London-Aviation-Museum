<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../includes/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $first_raw = $_POST['first_name'] ?? '';
    $last_raw  = $_POST['last_name']  ?? '';
    $email_raw = $_POST['email']      ?? '';
    $msg_raw   = $_POST['message']    ?? '';

    $first   = trim(strip_tags($first_raw));
    $last    = trim(strip_tags($last_raw));
    $message = trim(strip_tags($msg_raw));

    $email_clean = str_replace(["\r", "\n", "%0a", "%0d"], '', trim($email_raw));
    $visitor_email = filter_var($email_clean, FILTER_VALIDATE_EMAIL);

    $fail = [];

    if ($first === '')      $fail[] = 'first_name';
    if ($last === '')       $fail[] = 'last_name';
    if (!$visitor_email)   $fail[] = 'email';
    if ($message === '')   $fail[] = 'message';

    if (!empty($fail)) {
        echo '<p><strong>Validation failed.</strong></p>';
        echo '<p>Please fix: ' . htmlspecialchars(implode(', ', $fail), ENT_QUOTES, 'UTF-8') . '</p>';
        exit;
    }

    // Save to database
    try {
        $db = getConnection();
        $stmt = $db->prepare('
            INSERT INTO contact_submissions (first_name, last_name, email, message)
            VALUES (:first_name, :last_name, :email, :message)
        ');
        $stmt->execute([
            ':first_name' => $first,
            ':last_name'  => $last,
            ':email'      => $visitor_email,
            ':message'    => $message,
        ]);
    } catch (PDOException $e) {
        die('Failed to save submission: ' . $e->getMessage());
    }

    // Optional email notification
    $recipient   = 'museum@427wing.ca';         // ← update to real museum email
    $subject     = 'New Contact Form Submission - London Aviation Museum';
    $fromAddress = 'no-reply@london-aviation.local';
    $visitor_name = $first . ' ' . $last;

    $emailBody  = "New contact form submission:\r\n\r\n";
    $emailBody .= "Name: {$visitor_name}\r\n";
    $emailBody .= "Email: {$visitor_email}\r\n\r\n";
    $emailBody .= "Message:\r\n{$message}\r\n";

    $headers  = "From: London Aviation Museum <{$fromAddress}>\r\n";
    $headers .= "Reply-To: {$visitor_email}\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    mail($recipient, $subject, $emailBody, $headers);

    // Redirect with success message
    $msg = urlencode("Thank you for reaching out, " . htmlspecialchars($visitor_name, ENT_QUOTES, 'UTF-8') . ". We will get back to you soon.");
    header("Location: ../contact.html?msg=$msg");
    exit();

} else {
    echo "<p>Direct access not allowed.</p>";
}