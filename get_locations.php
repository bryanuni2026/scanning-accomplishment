<?php
session_start();
header("Content-Type: application/json; charset=utf-8");

if (!isset($_SESSION["user_id"])) {
    http_response_code(401);
    echo json_encode(["success" => false, "message" => "Not logged in."]);
    exit;
}

require_once "db.php";

try {
    $stmt = $pdo->query("SELECT id, name FROM locations ORDER BY id ASC");
    echo json_encode([
        "success" => true,
        "locations" => $stmt->fetchAll()
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Failed to load locations."]);
}
?>
