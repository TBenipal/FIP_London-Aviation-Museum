<?php
header('Content-Type: application/json');
require_once __DIR__ . '/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $first_raw = $_POST['first_name'] ?? '';
    $last_raw  = $_POST['last_name']  ?? '';
    $email_raw = $_POST['email']      ?? '';
    $msg_raw   = $_POST['message']    ?? '';

    $first         = trim(strip_tags($first_raw));
    $last          = trim(strip_tags($last_raw));
    $visitor_name  = trim($first . ' ' . $last);
    $email_clean   = str_replace(["\r", "\n", "%0a", "%0d"], '', trim($email_raw));
    $visitor_email = filter_var($email_clean, FILTER_VALIDATE_EMAIL);
    $message       = trim(strip_tags($msg_raw));

    $fail = [];

    if ($first === '')    $fail[] = 'First name is required.';
    if ($last === '')     $fail[] = 'Last name is required.';
    if (!$visitor_email) $fail[] = 'A valid email is required.';
    if ($message === '')  $fail[] = 'Message cannot be empty.';

    if (!empty($fail)) {
        echo json_encode(['errors' => $fail]);
        exit;
    }

    // I save to the database so the admin messages page can display it
    try {
        $db   = getConnection();
        $stmt = $db->prepare('
            INSERT INTO contact_submissions (first_name, last_name, email, message)
            VALUES (:first, :last, :email, :message)
        ');
        $stmt->execute([
            ':first'   => $first,
            ':last'    => $last,
            ':email'   => $visitor_email,
            ':message' => $message,
        ]);
    } catch (PDOException $e) {
        echo json_encode(['errors' => ['Could not save your message. Please try again.']]);
        exit;
    }

    $recipient   = 'no-reply@londonaviation.com';
    $subject     = 'Inquiry from London Aviation Museum';
    $fromAddress = 'no-reply@londonaviation.com';

    $emailBody  = "You received a new inquiry:\r\n\r\n";
    $emailBody .= "Name: {$visitor_name}\r\n";
    $emailBody .= "Email: {$visitor_email}\r\n\r\n";
    $emailBody .= "Message:\r\n{$message}\r\n";

    $headers  = "From: London Aviation <{$fromAddress}>\r\n";
    $headers .= "Reply-To: {$visitor_email}\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $sent = true; // wire up mail() before launch

    if ($sent) {
        echo json_encode([
            'message' => 'Thank you ' . htmlspecialchars($visitor_name, ENT_QUOTES, 'UTF-8') . ', we will get back to you soon!'
        ]);
    } else {
        echo json_encode(['errors' => ['Sorry, your message could not be sent. Please try again.']]);
    }

} else {
    echo json_encode(['errors' => ['Direct access not allowed.']]);
}