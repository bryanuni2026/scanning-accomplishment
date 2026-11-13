<?php

date_default_timezone_set('Asia/Manila');

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

$location   = trim((string)($data["location"] ?? ""));
$taskType   = trim((string)($data["taskType"] ?? ""));
$documents  = (int)($data["documents"] ?? 0);
$taskDetails = trim((string)($data["taskDetails"] ?? ""));
$fileDate   = trim((string)($data["fileDate"] ?? ""));

$allowed = [
    "Document Scanned",
    "Delivery",
    "Computer Troubleshooting",
    "Other Related Task"
];

if ($location === "") {
    echo json_encode([
        "success" => false,
        "message" => "Please enter or select a location."
    ]);
    exit;
}

if (strlen($location) > 100) {
    echo json_encode([
        "success" => false,
        "message" => "Location must not exceed 100 characters."
    ]);
    exit;
}

if (!in_array($taskType, $allowed, true)) {
    echo json_encode([
        "success" => false,
        "message" => "Invalid task type."
    ]);
    exit;
}

if ($taskType === "Document Scanned" || $taskType === "Delivery") {

    if ($documents < 1) {
        echo json_encode([
            "success" => false,
            "message" =>
                $taskType === "Delivery"
                    ? "Please enter a valid number of documents delivered."
                    : "Please enter a valid number of documents scanned."
        ]);
        exit;
    }

    $taskDetails = null;

} else {

    if ($taskDetails === "") {
        echo json_encode([
            "success" => false,
            "message" => "Please enter the task details."
        ]);
        exit;
    }

    $documents = 0;
}

$date = DateTime::createFromFormat("Y-m-d", $fileDate);

if (!$date || $date->format("Y-m-d") !== $fileDate) {
    echo json_encode([
        "success" => false,
        "message" => "Invalid file date."
    ]);
    exit;
}

try {

    // Philippine date and time
    $finishedAt = date("Y-m-d H:i:s");

    $stmt = $pdo->prepare(
        "INSERT INTO accomplishments
        (location, task_type, documents, task_details, file_date, finished_at)
        VALUES (?, ?, ?, ?, ?, ?)"
    );

    $stmt->execute([
        $location,
        $taskType,
        $documents,
        $taskDetails,
        $fileDate,
        $finishedAt
    ]);

    echo json_encode([
        "success" => true,
        "message" => "Task saved successfully.",
        "id" => $pdo->lastInsertId()
    ]);

} catch (PDOException $e) {

    echo json_encode([
        "success" => false,
        "message" => "Failed to save task."
    ]);
}

?>