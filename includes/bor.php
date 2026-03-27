<?php
session_start();
header('Content-Type: application/json');
require_once __DIR__ . '/database.php';

try {
    $db = getConnection();
    $stmt = $db->query('SELECT id, last_name, initials, full_name, in_book, photo_path FROM bor_pilots ORDER BY last_name ASC');
    echo json_encode($stmt->fetchAll());
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}