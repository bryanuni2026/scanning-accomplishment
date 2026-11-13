<?php

session_start();

header(
    "Content-Type: application/json"
);

if (!isset($_SESSION["user_id"])) {

    echo json_encode([
        "success" => false,
        "message" => "Not logged in."
    ]);

    exit;

}

require_once "db.php";

$data = json_decode(
    file_get_contents("php://input"),
    true
);

$id =
    intval(
        $data["id"] ?? 0
    );

if ($id < 1) {

    echo json_encode([
        "success" => false,
        "message" => "Invalid record ID."
    ]);

    exit;

}

$stmt = $pdo->prepare(
    "DELETE FROM accomplishments
     WHERE id = ?"
);

$stmt->execute([
    $id
]);

echo json_encode([

    "success" => true,

    "message" =>
        "Record deleted."

]);

?>