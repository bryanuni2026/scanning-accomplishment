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

$data = json_decode(file_get_contents("php://input"), true) ?: [];
$password = (string)($data["password"] ?? "");

if ($password === "") {
    echo json_encode([
        "success" => false,
        "message" => "Password is required."
    ]);
    exit;
}

$stmt = $pdo->prepare(
    "SELECT password FROM users WHERE id = ? LIMIT 1"
);
$stmt->execute([$_SESSION["user_id"]]);
$user = $stmt->fetch();

if (!$user) {
    echo json_encode([
        "success" => false,
        "message" => "User account not found."
    ]);
    exit;
}

if (!password_verify($password, $user["password"])) {
    echo json_encode([
        "success" => false,
        "message" => "Incorrect password. Records were NOT deleted."
    ]);
    exit;
}

try {
    $pdo->exec("DELETE FROM accomplishments");

    echo json_encode([
        "success" => true,
        "message" => "All accomplishment records have been deleted."
    ]);
} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "message" => "Failed to clear records."
    ]);
}
?>