<?php

session_start();

if (!isset($_SESSION["user_id"])) {

    header("Location: index.php");
    exit;

}

require_once "db.php";

$stmt = $pdo->prepare(
    "SELECT
        username,
        full_name,
        created_at
     FROM users
     WHERE id = ?
     LIMIT 1"
);

$stmt->execute([
    $_SESSION["user_id"]
]);

$user = $stmt->fetch();

if (!$user) {

    session_destroy();

    header("Location: index.php");

    exit;

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>

<title>My Profile</title>

<style>

* {
    box-sizing: border-box;
}

body {

    margin: 0;

    min-height: 100vh;

    padding: 30px;

    font-family: Arial, sans-serif;

    background-image:
        linear-gradient(
            rgba(0,0,0,0.4),
            rgba(0,0,0,0.4)
        ),
        url("bg3.jpg");

    background-size: cover;

    background-position: center;

}

.profile-container {

    max-width: 550px;

    margin: 50px auto;
    

}

.profile-box {

    background: white;

    border-radius: 14px;

    background: rgba(224, 215, 236, 0.65);

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    padding: 28px;

    border-radius: 14px;

    border: 1px solid rgba(255, 255, 255, 0.25);

    box-shadow:
        0 5px 25px rgba(0, 0, 0, 0.2);
}

.profile-icon {

    text-align: center;

    font-size: 55px;

}

h1 {

    text-align: center;

    margin-bottom: 25px;

}

.info {

    background: #f8fafc;

    padding: 15px;

    border-radius: 7px;

    margin-bottom: 10px;

}

.info-label {

    font-size: 12px;

    color: #777;

    margin-bottom: 5px;

}

.info-value {

    font-size: 17px;

    font-weight: bold;

}

.buttons {

    display: grid;

    gap: 10px;

    margin-top: 25px;

}

button,
a {

    text-align: center;

    text-decoration: none;

    border: none;

    padding: 12px;

    border-radius: 7px;

    font-size: 15px;

    cursor: pointer;

}

.change-btn {

    background: #2563eb;

    color: white;

}

.back-btn {

    background: #64748b;

    color: white;

}

.logout-btn {

    background: #dc2626;

    color: white;

}

</style>

</head>

<body>

<div class="profile-container">

    <div class="profile-box">

        <div class="profile-icon">
            👤
        </div>

        <h1>
            My Profile
        </h1>

        <div class="info">

            <div class="info-label">
                Full Name
            </div>

            <div class="info-value">

                <?= htmlspecialchars(
                    $user["full_name"]
                ) ?>

            </div>

        </div>

        <div class="info">

            <div class="info-label">
                Username
            </div>

            <div class="info-value">

                <?= htmlspecialchars(
                    $user["username"]
                ) ?>

            </div>

        </div>

        <div class="info">

            <div class="info-label">
                Account Created
            </div>

            <div class="info-value">

                <?= htmlspecialchars(
                    $user["created_at"]
                ) ?>

            </div>

        </div>

        <div class="buttons">

            <a
                href="change_password.php"
                class="change-btn"
            >
                🔐 Change Password
            </a>

            <a
                href="dashboard.php"
                class="back-btn"
            >
                ← Back to Dashboard
            </a>

            <a
                href="logout.php"
                class="logout-btn"
            >
                🚪 Logout
            </a>

        </div>

    </div>

</div>

</body>
</html>