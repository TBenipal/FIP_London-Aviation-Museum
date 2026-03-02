<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

require_once '../includes/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name_raw  = $_POST['nl_name']  ?? '';
    $email_raw = $_POST['nl_email'] ?? '';

    $name        = trim(strip_tags($name_raw));
    $email_clean = str_replace(["\r", "\n", "%0a", "%0d"], '', trim($email_raw));
    $email       = filter_var($email_clean, FILTER_VALIDATE_EMAIL);

    $fail = [];

    if ($name === '') $fail[] = 'Name is required.';
    if (!$email)      $fail[] = 'A valid email is required.';


    if (!empty($fail)) {
        echo json_encode(['errors' => $fail]);
        exit;
    }

    try {
        $db   = getConnection();
        $stmt = $db->prepare('
            INSERT INTO newsletter_subscribers (name, email)
            VALUES (:name, :email)
        ');
        $stmt->execute([
            ':name'  => $name,
            ':email' => $email,
        ]);

        echo json_encode([
            'message' => "You're subscribed! Thanks for joining our newsletter."
        ]);
        exit;

    } catch (PDOException $e) {
        // Duplicate email
        if ($e->getCode() == 23000) {
            echo json_encode([
                'message' => "This email is already subscribed."
            ]);
            exit;
        }
        echo json_encode([
            'errors' => ['Subscription failed. Please try again.']
        ]);
        exit;
    }

} else {
    echo json_encode(['errors' => ['Direct access not allowed.']]);
}