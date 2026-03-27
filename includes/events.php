<?php
session_start();
header('Content-Type: application/json');
require_once __DIR__ . '/database.php';

// I use 401 here because the user has not provided credentials yet (unauthenticated), not 403 which implies bad credentials
function requireAdmin() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['admin'])) {
        http_response_code(401);
        echo json_encode(['error' => 'Authentication required']);
        exit;
    }
}

function generateSlug($title) {
    $lower = strtolower($title);
    $chars = str_split($lower);
    $slug = '';
    $prevWasDash = false;

    foreach ($chars as $char) {
        if (ctype_alnum($char)) {
            $slug .= $char;
            $prevWasDash = false;
        } elseif (!$prevWasDash) {
            $slug .= '-';
            $prevWasDash = true;
        }
    }

    return trim($slug, '-');
}

$method = $_SERVER['REQUEST_METHOD'];
$id     = isset($_GET['id']) ? (int)$_GET['id'] : null;

try {
    $db = getConnection();

    if ($method === 'GET') {
        if ($id) {
            $stmt = $db->prepare('SELECT * FROM events WHERE id = :id');
            $stmt->execute([':id' => $id]);
            $event = $stmt->fetch();

            if ($event) {
                echo json_encode($event);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Event not found']);
            }

        } elseif (isset($_GET['all'])) {
            requireAdmin();
            $stmt = $db->query('SELECT * FROM events ORDER BY event_date DESC');
            echo json_encode($stmt->fetchAll());

        } else {
            $stmt = $db->query("SELECT * FROM events WHERE status = 'published' ORDER BY event_date ASC");
            echo json_encode($stmt->fetchAll());
        }

    } elseif ($method === 'POST') {
        requireAdmin();

        // I enforce Content-Type so we only accept JSON input on this endpoint
        $contentType = $_SERVER['CONTENT_TYPE'] ?? '';
        if (strpos($contentType, 'application/json') === false) {
            http_response_code(415);
            echo json_encode(['error' => 'Content-Type must be application/json']);
            exit;
        }

        $data = json_decode(file_get_contents('php://input'), true);

        $title    = trim($data['title'] ?? '');
        $desc     = trim($data['description'] ?? '');
        $date     = $data['event_date'] ?? '';
        $location = trim($data['location'] ?? '');
        $category = trim($data['category'] ?? '');
        $img      = trim($data['featured_image_url'] ?? '');

        $eventTime = $data['event_time'] ?? '';
        if ($eventTime !== '') {
            $time = $eventTime;
        } else {
            $time = null;
        }

        if (in_array($data['status'] ?? '', ['draft', 'published', 'archived'])) {
            $status = $data['status'];
        } else {
            $status = 'draft';
        }

        if (!$title || !$desc || !$date) {
            http_response_code(400);
            echo json_encode(['error' => 'Title, description, and date are required.']);
            exit;
        }

        $slug = generateSlug($title);

        $check = $db->prepare('SELECT id FROM events WHERE slug = :slug');
        $check->execute([':slug' => $slug]);
        if ($check->fetch()) {
            $slug = $slug . '-' . time();
        }

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

    } elseif ($method === 'PUT') {
        requireAdmin();

        if (!$id) {
            http_response_code(400);
            echo json_encode(['error' => 'Event ID is required.']);
            exit;
        }

        $contentType = $_SERVER['CONTENT_TYPE'] ?? '';
        if (strpos($contentType, 'application/json') === false) {
            http_response_code(415);
            echo json_encode(['error' => 'Content-Type must be application/json']);
            exit;
        }

        $data     = json_decode(file_get_contents('php://input'), true);
        $title    = trim($data['title'] ?? '');
        $desc     = trim($data['description'] ?? '');
        $date     = $data['event_date'] ?? '';
        $location = trim($data['location'] ?? '');
        $category = trim($data['category'] ?? '');
        $img      = trim($data['featured_image_url'] ?? '');

        $eventTime = $data['event_time'] ?? '';
        if ($eventTime !== '') {
            $time = $eventTime;
        } else {
            $time = null;
        }

        if (in_array($data['status'] ?? '', ['draft', 'published', 'archived'])) {
            $status = $data['status'];
        } else {
            $status = 'draft';
        }

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

    } elseif ($method === 'DELETE') {
        requireAdmin();

        if (!$id) {
            http_response_code(400);
            echo json_encode(['error' => 'Event ID is required.']);
            exit;
        }

        $stmt = $db->prepare('DELETE FROM events WHERE id = :id');
        $stmt->execute([':id' => $id]);
        echo json_encode(['message' => 'Event deleted.']);
    }

} catch (PDOException $e) {

    http_response_code(500);
    echo json_encode(['error' => 'A database error occurred. Please try again later.']);
}