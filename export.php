<?php

// =========================================================
// TIMEZONE
// =========================================================

date_default_timezone_set('Asia/Manila');


// =========================================================
// SESSION
// =========================================================

session_start();

if (!isset($_SESSION["user_id"])) {

    die("Not logged in.");

}


// =========================================================
// DATABASE
// =========================================================

require_once "db.php";


// =========================================================
// CSV HEADERS
// =========================================================

header(
    "Content-Type: text/csv; charset=utf-8"
);

header(
    "Content-Disposition: attachment; filename=accomplishments_"
    . date("Y-m-d_H-i-s")
    . ".csv"
);


// =========================================================
// OPEN CSV OUTPUT
// =========================================================

$output = fopen(
    "php://output",
    "w"
);


// =========================================================
// CSV COLUMN HEADERS
// =========================================================

fputcsv(
    $output,
    [
        "No.",
        "Location",
        "Task Type",
        "Details / Documents",
        "File Date",
        "Date Scanned"
    ]
);


// =========================================================
// GET RECORDS
// =========================================================

$stmt = $pdo->query(
    "SELECT
        location,
        task_type,
        documents,
        task_details,
        file_date,
        finished_at
     FROM accomplishments
     WHERE hide_on_print = 0
     ORDER BY finished_at DESC, id DESC"
);


// =========================================================
// WRITE RECORDS
// =========================================================

$no = 1;

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $type = $row["task_type"]
        ?? "Document Scanned";

    $count = (int)(
        $row["documents"] ?? 0
    );


    // -----------------------------------------------------
    // DOCUMENT SCANNED
    // -----------------------------------------------------

    if ($type === "Document Scanned") {

        $details =
            $count .
            " document(s) scanned";

    }


    // -----------------------------------------------------
    // DELIVERY
    // -----------------------------------------------------

    elseif ($type === "Delivery") {

        $details =
            $count .
            " document(s) delivered";

    }


    // -----------------------------------------------------
    // OTHER TASKS
    // -----------------------------------------------------

    else {

        $details =
            $row["task_details"] ?? "";

    }


    // -----------------------------------------------------
    // WRITE CSV ROW
    // -----------------------------------------------------

    fputcsv(
        $output,
        [
            $no++,
            $row["location"],
            $type,
            $details,
            $row["file_date"],
            $row["finished_at"]
        ]
    );

}


// =========================================================
// CLOSE OUTPUT
// =========================================================

fclose($output);

exit;

?>