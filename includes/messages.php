<?php
session_start();
header('Content-Type: application/json');
require_once __DIR__ . '/database.php';

if (!isset($_SESSION['admin'])) {
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

try {
    $db   = getConnection();
    $stmt = $db->query('SELECT * FROM contact_submissions ORDER BY submitted_at DESC');
    echo json_encode($stmt->fetchAll());
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'A database error occurred. Please try again.']);
}