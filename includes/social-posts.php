<?php
session_start();
header('Content-Type: application/json');
require_once __DIR__ . '/database.php';

// I use 401 because the user is unauthenticated, not just unauthorized
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

$method = $_SERVER['REQUEST_METHOD'];
$id     = isset($_GET['id']) ? (int)$_GET['id'] : null;

try {
    $db = getConnection();

    if ($method === 'GET') {
        if ($id) {
            $stmt = $db->prepare('SELECT * FROM social_posts WHERE id = :id');
            $stmt->execute([':id' => $id]);
            $post = $stmt->fetch();

            if ($post) {
                echo json_encode($post);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Post not found']);
            }

        } elseif (isset($_GET['all'])) {
            requireAdmin();
            $stmt = $db->query('SELECT * FROM social_posts ORDER BY created_at DESC');
            echo json_encode($stmt->fetchAll());

        } else {
            $stmt = $db->query("SELECT * FROM social_posts WHERE status='published' ORDER BY published_at DESC");
            echo json_encode($stmt->fetchAll());
        }

    } elseif ($method === 'POST') {
        requireAdmin();

        $platform = $_POST['platform'] ?? '';
        $caption  = trim($_POST['caption'] ?? '');
        $hashtags = trim($_POST['hashtags'] ?? '');
        $ext_link = trim($_POST['external_link'] ?? '');

        if (in_array($_POST['status'] ?? '', ['draft', 'published'])) {
            $status = $_POST['status'];
        } else {
            $status = 'draft';
        }

        if (!in_array($platform, ['instagram', 'facebook', 'twitter', 'youtube'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid platform.']);
            exit;
        }

        $media_type = 'image';
        $media_url  = '';

        if (isset($_FILES['media']) && $_FILES['media']['error'] === UPLOAD_ERR_OK) {
            $allowed_images = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
            $allowed_videos = ['video/mp4'];
            $mime = mime_content_type($_FILES['media']['tmp_name']);

            if (in_array($mime, $allowed_images)) {
                $media_type = 'image';
            } elseif (in_array($mime, $allowed_videos)) {
                $media_type = 'video';
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'Unsupported file type.']);
                exit;
            }

            $upload_dir = __DIR__ . '/../uploads/social/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            $ext      = pathinfo($_FILES['media']['name'], PATHINFO_EXTENSION);
            $filename = uniqid('post_') . '.' . $ext;
            move_uploaded_file($_FILES['media']['tmp_name'], $upload_dir . $filename);
            $media_url = 'uploads/social/' . $filename;

        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Media file is required.']);
            exit;
        }

        if ($status === 'published') {
            $published_at = date('Y-m-d H:i:s');
        } else {
            $published_at = null;
        }

        $stmt = $db->prepare('
            INSERT INTO social_posts (platform, media_url, media_type, caption, hashtags, external_link, status, published_at)
            VALUES (:platform, :media_url, :media_type, :caption, :hashtags, :ext_link, :status, :published_at)
        ');
        $stmt->execute([
            ':platform'     => $platform,
            ':media_url'    => $media_url,
            ':media_type'   => $media_type,
            ':caption'      => $caption,
            ':hashtags'     => $hashtags,
            ':ext_link'     => $ext_link,
            ':status'       => $status,
            ':published_at' => $published_at,
        ]);
        echo json_encode(['message' => 'Post created.', 'id' => $db->lastInsertId()]);

    } elseif ($method === 'DELETE') {
        requireAdmin();

        if (!$id) {
            http_response_code(400);
            echo json_encode(['error' => 'Post ID is required.']);
            exit;
        }

        $stmt = $db->prepare('DELETE FROM social_posts WHERE id = :id');
        $stmt->execute([':id' => $id]);
        echo json_encode(['message' => 'Post deleted.']);
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'A database error occurred. Please try again later.']);
}