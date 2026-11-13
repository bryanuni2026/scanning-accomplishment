<?php

date_default_timezone_set('Asia/Manila');

session_start();

header("Content-Type: application/json");


// =========================================================
// CHECK LOGIN
// =========================================================

if (!isset($_SESSION["user_id"])) {

    echo json_encode([
        "success" => false,
        "message" => "Not logged in."
    ]);

    exit;
}


// =========================================================
// DATABASE
// =========================================================

require_once "db.php";


// =========================================================
// GET JSON DATA
// =========================================================

$data = json_decode(
    file_get_contents("php://input"),
    true
) ?: [];

$id = (int)($data["id"] ?? 0);

$location = trim(
    (string)($data["location"] ?? "")
);

$taskType = trim(
    (string)($data["taskType"] ?? "")
);

$documents = (int)(
    $data["documents"] ?? 0
);

$taskDetails = trim(
    (string)($data["taskDetails"] ?? "")
);

$fileDate = trim(
    (string)($data["fileDate"] ?? "")
);

$finishedAt = trim(
    (string)($data["finishedAt"] ?? "")
);


// =========================================================
// ALLOWED TASK TYPES
// =========================================================

$allowedTaskTypes = [

    "Document Scanned",

    "Delivery",

    "Computer Troubleshooting",

    "Other Related Task"

];


// =========================================================
// VALIDATE ID
// =========================================================

if ($id < 1) {

    echo json_encode([
        "success" => false,
        "message" => "Invalid record ID."
    ]);

    exit;
}


// =========================================================
// VALIDATE LOCATION
// =========================================================

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


// =========================================================
// VALIDATE TASK TYPE
// =========================================================

if (!in_array(
    $taskType,
    $allowedTaskTypes,
    true
)) {

    echo json_encode([
        "success" => false,
        "message" => "Invalid task type."
    ]);

    exit;
}


// =========================================================
// DOCUMENT SCANNED / DELIVERY
// =========================================================

if (
    $taskType === "Document Scanned" ||
    $taskType === "Delivery"
) {

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

}


// =========================================================
// OTHER TASKS
// =========================================================

else {

    if ($taskDetails === "") {

        echo json_encode([
            "success" => false,
            "message" => "Please enter the task details."
        ]);

        exit;
    }

    $documents = 0;
}


// =========================================================
// VALIDATE FILE DATE
// =========================================================

$date = DateTime::createFromFormat(
    "Y-m-d",
    $fileDate
);

if (
    !$date ||
    $date->format("Y-m-d") !== $fileDate
) {

    echo json_encode([
        "success" => false,
        "message" => "Invalid file date."
    ]);

    exit;
}


// =========================================================
// VALIDATE DATE SCANNED
// =========================================================

if ($finishedAt === "") {

    echo json_encode([
        "success" => false,
        "message" => "Please select the Date Scanned."
    ]);

    exit;
}


// Convert HTML datetime-local format:
//
// 2026-09-16T14:30
//
// into MySQL:
//
// 2026-09-16 14:30:00

$finishedAt = str_replace(
    "T",
    " ",
    $finishedAt
);

if (strlen($finishedAt) === 16) {

    $finishedAt .= ":00";
}


// =========================================================
// VALIDATE DATETIME
// =========================================================

$finishedDateTime = DateTime::createFromFormat(
    "Y-m-d H:i:s",
    $finishedAt
);

if (
    !$finishedDateTime ||
    $finishedDateTime->format("Y-m-d H:i:s") !== $finishedAt
) {

    echo json_encode([
        "success" => false,
        "message" => "Invalid Date Scanned."
    ]);

    exit;
}


// =========================================================
// UPDATE DATABASE
// =========================================================

try {

    // -----------------------------------------------------
    // Check if record exists
    // -----------------------------------------------------

    $check = $pdo->prepare(
        "SELECT id
         FROM accomplishments
         WHERE id = ?
         LIMIT 1"
    );

    $check->execute([
        $id
    ]);

    if (!$check->fetch()) {

        echo json_encode([
            "success" => false,
            "message" => "Record not found."
        ]);

        exit;
    }


    // -----------------------------------------------------
    // Update record
    // -----------------------------------------------------

    $stmt = $pdo->prepare(
        "UPDATE accomplishments
         SET
            location = ?,
            task_type = ?,
            documents = ?,
            task_details = ?,
            file_date = ?,
            finished_at = ?
         WHERE id = ?"
    );

    $stmt->execute([

        $location,

        $taskType,

        $documents,

        $taskDetails,

        $fileDate,

        $finishedAt,

        $id

    ]);


    // -----------------------------------------------------
    // Success
    // -----------------------------------------------------

    echo json_encode([

        "success" => true,

        "message" =>
            "Record updated successfully."

    ]);


} catch (PDOException $e) {

    // -----------------------------------------------------
    // Error
    // -----------------------------------------------------

    echo json_encode([

        "success" => false,

        "message" =>
            "Failed to update record."

    ]);

}

?>