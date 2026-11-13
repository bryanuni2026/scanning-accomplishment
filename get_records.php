<?php
session_start();
header("Content-Type: application/json");

if (!isset($_SESSION["user_id"])) {
    echo json_encode([
        "success" => false,
        "message" => "Not logged in."
    ]);
    exit;
}

require_once "db.php";

try {
    $stmt = $pdo->query(
        "SELECT
            id,
            location,
            task_type,
            documents,
            task_details,
            file_date,
            finished_at,
            created_at
         FROM accomplishments
         ORDER BY finished_at DESC, id DESC"
    );

    echo json_encode([
        "success" => true,
        "records" => $stmt->fetchAll()
    ]);
} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "message" => "Failed to load records."
    ]);
}
?>