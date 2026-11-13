<?php

session_start();
header("Content-Type: application/json");

if (!isset($_SESSION["user_id"])) {
    echo json_encode(["success" => false, "message" => "Not logged in."]);
    exit;
}

require_once "db.php";

$data = json_decode(file_get_contents("php://input"), true);
$id = intval($data["id"] ?? 0);
$hideOnPrint = intval($data["hide_on_print"] ?? 0) ? 1 : 0;

if ($id < 1) {
    echo json_encode(["success" => false, "message" => "Invalid ID."]);
    exit;
}

$check = $pdo->prepare("SELECT id FROM accomplishments WHERE id = ?");
$check->execute([$id]);

if (!$check->fetch()) {
    echo json_encode(["success" => false, "message" => "Record not found."]);
    exit;
}

$stmt = $pdo->prepare(
    "UPDATE accomplishments SET hide_on_print = ? WHERE id = ?"
);
$stmt->execute([$hideOnPrint, $id]);

echo json_encode([
    "success" => true,
    "message" => $hideOnPrint
        ? "Record hidden from printing."
        : "Record restored for printing."
]);

?>
