<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $recipient = 'no-reply@londonaviation.com';
        $subject   = 'Inquiry from London Aviation Museum';

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

        if ($first === '')   $fail[] = 'First name is required.';
        if ($last === '')    $fail[] = 'Last name is required.';
        if (!$visitor_email) $fail[] = 'A valid email is required.';
        if ($message === '') $fail[] = 'Message cannot be empty.';

        if (!empty($fail)) {
            echo json_encode(['errors' => $fail]);
            exit;
        }

        $emailBody  = "You received a new inquiry:\r\n\r\n";
        $emailBody .= "Name: {$visitor_name}\r\n";
        $emailBody .= "Email: {$visitor_email}\r\n\r\n";
        $emailBody .= "Message:\r\n{$message}\r\n";

        $fromAddress = "no-reply@londonaviation.com";

        $headers  = "From: London Aviation <{$fromAddress}>\r\n";
        $headers .= "Reply-To: {$visitor_email}\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

        // $sent = mail($recipient, $subject, $emailBody, $headers);
        $sent = true; // remove before launch

        if ($sent) {
            echo json_encode([
                'message' => "Thank you " . htmlspecialchars($visitor_name, ENT_QUOTES, 'UTF-8') . ", we will get back to you soon!"
            ]);
        } else {
            echo json_encode([
                'errors' => ['Sorry, your message could not be sent. Please try again.']
            ]);
        }

    } else {
        echo json_encode(['errors' => ['Direct access not allowed.']]);
    }
?>