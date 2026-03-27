<?php
session_start();
header('Content-Type: application/json');
require_once __DIR__ . '/database.php';

// Auth guard for write operations
function requireAdmin() {
    if (session_status() === PHP_SESSION_NONE) session_start();
    if (!isset($_SESSION['admin'])) {
        http_response_code(403);
        echo json_encode(['error' => 'Unauthorized']);
        exit;
    }
}

$method = $_SERVER['REQUEST_METHOD'];
$id     = isset($_GET['id']) ? (int)$_GET['id'] : null;

try {
    $db = getConnection();

    // GET /includes/events.php          — all published events
    // GET /includes/events.php?id=X     — single event
    // GET /includes/events.php?all=1    — admin: all events
    if ($method === 'GET') {
        if ($id) {
            $stmt = $db->prepare('SELECT * FROM events WHERE id = :id');
            $stmt->execute([':id' => $id]);
            $event = $stmt->fetch();
            echo json_encode($event ?: ['error' => 'Not found']);
        } elseif (isset($_GET['all'])) {
            requireAdmin();
            $stmt = $db->query('SELECT * FROM events ORDER BY event_date DESC');
            echo json_encode($stmt->fetchAll());
        } else {
            $stmt = $db->query("SELECT * FROM events WHERE status = 'published' ORDER BY event_date ASC");
            echo json_encode($stmt->fetchAll());
        }

    // POST — create event
    } elseif ($method === 'POST') {
        requireAdmin();
        $data = json_decode(file_get_contents('php://input'), true);

        $title    = trim($data['title'] ?? '');
        $desc     = trim($data['description'] ?? '');
        $date     = $data['event_date'] ?? '';
        $time     = $data['event_time'] ?: null;
        $location = trim($data['location'] ?? '');
        $category = trim($data['category'] ?? '');
        $status   = in_array($data['status'] ?? '', ['draft','published','archived']) ? $data['status'] : 'draft';
        $img      = trim($data['featured_image_url'] ?? '');

        if (!$title || !$desc || !$date) {
            echo json_encode(['error' => 'Title, description, and date are required.']);
            exit;
        }

        // Generate unique slug
        $slug = preg_replace('/[^a-z0-9]+/', '-', strtolower($title));
        $slug = trim($slug, '-');
        $check = $db->prepare('SELECT id FROM events WHERE slug = :slug');
        $check->execute([':slug' => $slug]);
        if ($check->fetch()) $slug .= '-' . time();

        $stmt = $db->prepare('
            INSERT INTO events (title, slug, description, event_date, event_time, location, featured_image_url, category, status)
            VALUES (:title, :slug, :desc, :date, :time, :loc, :img, :cat, :status)
        ');
        $stmt->execute([
            ':title'  => $title,
            ':slug'   => $slug,
            ':desc'   => $desc,
            ':date'   => $date,
            ':time'   => $time,
            ':loc'    => $location,
            ':img'    => $img,
            ':cat'    => $category,
            ':status' => $status,
        ]);
        echo json_encode(['message' => 'Event created.', 'id' => $db->lastInsertId()]);

    // PUT — update event
    } elseif ($method === 'PUT') {
        requireAdmin();
        if (!$id) { echo json_encode(['error' => 'ID required']); exit; }

        $data     = json_decode(file_get_contents('php://input'), true);
        $title    = trim($data['title'] ?? '');
        $desc     = trim($data['description'] ?? '');
        $date     = $data['event_date'] ?? '';
        $time     = $data['event_time'] ?: null;
        $location = trim($data['location'] ?? '');
        $category = trim($data['category'] ?? '');
        $status   = in_array($data['status'] ?? '', ['draft','published','archived']) ? $data['status'] : 'draft';
        $img      = trim($data['featured_image_url'] ?? '');

        $stmt = $db->prepare('
            UPDATE events SET title=:title, description=:desc, event_date=:date,
            event_time=:time, location=:loc, featured_image_url=:img,
            category=:cat, status=:status WHERE id=:id
        ');
        $stmt->execute([
            ':title'  => $title,
            ':desc'   => $desc,
            ':date'   => $date,
            ':time'   => $time,
            ':loc'    => $location,
            ':img'    => $img,
            ':cat'    => $category,
            ':status' => $status,
            ':id'     => $id,
        ]);
        echo json_encode(['message' => 'Event updated.']);

    // DELETE
    } elseif ($method === 'DELETE') {
        requireAdmin();
        if (!$id) { echo json_encode(['error' => 'ID required']); exit; }
        $stmt = $db->prepare('DELETE FROM events WHERE id = :id');
        $stmt->execute([':id' => $id]);
        echo json_encode(['message' => 'Event deleted.']);
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}