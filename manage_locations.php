<?php
session_start();
header("Content-Type: application/json; charset=utf-8");

if (!isset($_SESSION["user_id"])) {
    http_response_code(401);
    echo json_encode(["success" => false, "message" => "Not logged in."]);
    exit;
}

require_once "db.php";
$data = json_decode(file_get_contents("php://input"), true) ?: [];
$action = trim((string)($data["action"] ?? ""));

function respond($success, $message, $status = 200) {
    http_response_code($status);
    echo json_encode(["success" => $success, "message" => $message]);
    exit;
}

function validLocationName($name) {
    return $name !== "" && mb_strlen($name, "UTF-8") <= 100;
}

try {
    if ($action === "add") {
        $name = trim((string)($data["name"] ?? ""));
        if (!validLocationName($name)) {
            respond(false, "Location name is required and must not exceed 100 characters.", 422);
        }

        $stmt = $pdo->prepare("INSERT INTO locations (name) VALUES (?)");
        try {
            $stmt->execute([$name]);
        } catch (PDOException $e) {
            if ($e->getCode() === "23000") {
                respond(false, "That location already exists.", 409);
            }
            throw $e;
        }
        respond(true, "Location added successfully.");
    }

    if ($action === "rename") {
        $oldName = trim((string)($data["old_name"] ?? ""));
        $newName = trim((string)($data["new_name"] ?? ""));
        if (!validLocationName($oldName) || !validLocationName($newName)) {
            respond(false, "Both location names are required and must not exceed 100 characters.", 422);
        }
        if (strcasecmp($oldName, $newName) === 0) {
            respond(true, "No changes were necessary.");
        }

        $pdo->beginTransaction();
        $check = $pdo->prepare("SELECT id FROM locations WHERE name = ? LIMIT 1 FOR UPDATE");
        $check->execute([$oldName]);
        if (!$check->fetch()) {
            $pdo->rollBack();
            respond(false, "Location not found. Refresh the page and try again.", 404);
        }

        $duplicate = $pdo->prepare("SELECT id FROM locations WHERE name = ? LIMIT 1");
        $duplicate->execute([$newName]);
        if ($duplicate->fetch()) {
            $pdo->rollBack();
            respond(false, "The new location name already exists.", 409);
        }

        $updateRecords = $pdo->prepare("UPDATE accomplishments SET location = ? WHERE location = ?");
        $updateRecords->execute([$newName, $oldName]);

        $updateLocation = $pdo->prepare("UPDATE locations SET name = ? WHERE name = ?");
        $updateLocation->execute([$newName, $oldName]);
        $pdo->commit();
        respond(true, "Location renamed. " . $updateRecords->rowCount() . " existing record(s) updated.");
    }

    if ($action === "delete") {
        $name = trim((string)($data["name"] ?? ""));
        if (!validLocationName($name)) {
            respond(false, "Invalid location name.", 422);
        }

        $check = $pdo->prepare("SELECT COUNT(*) FROM accomplishments WHERE location = ?");
        $check->execute([$name]);
        $usedCount = (int)$check->fetchColumn();
        if ($usedCount > 0) {
            respond(false, "Cannot delete this location because it is used by " . $usedCount . " existing record(s). Rename it instead if needed.", 409);
        }

        $delete = $pdo->prepare("DELETE FROM locations WHERE name = ?");
        $delete->execute([$name]);
        if ($delete->rowCount() < 1) {
            respond(false, "Location not found.", 404);
        }
        respond(true, "Location deleted successfully.");
    }

    respond(false, "Invalid location action.", 400);

} catch (PDOException $e) {
    if ($pdo->inTransaction()) $pdo->rollBack();
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "A database error occurred while managing locations."]);
}
?>
