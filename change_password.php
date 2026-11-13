<?php

session_start();

if (!isset($_SESSION["user_id"])) {

    header("Location: index.php");
    exit;

}

require_once "db.php";

$message = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $currentPassword =
        $_POST["current_password"] ?? "";

    $newPassword =
        $_POST["new_password"] ?? "";

    $confirmPassword =
        $_POST["confirm_password"] ?? "";


    if (
        $currentPassword === "" ||
        $newPassword === "" ||
        $confirmPassword === ""
    ) {

        $error =
            "Please fill in all fields.";

    }

    elseif (
        strlen($newPassword) < 6
    ) {

        $error =
            "New password must be at least 6 characters.";

    }

    elseif (
        $newPassword !== $confirmPassword
    ) {

        $error =
            "New passwords do not match.";

    }

    else {

        $stmt = $pdo->prepare(
            "SELECT password
             FROM users
             WHERE id = ?
             LIMIT 1"
        );

        $stmt->execute([
            $_SESSION["user_id"]
        ]);

        $user = $stmt->fetch();


        if (
            !$user ||
            !password_verify(
                $currentPassword,
                $user["password"]
            )
        ) {

            $error =
                "Current password is incorrect.";

        } else {

            $newHash =
                password_hash(
                    $newPassword,
                    PASSWORD_DEFAULT
                );


            $stmt = $pdo->prepare(
                "UPDATE users
                 SET password = ?
                 WHERE id = ?"
            );


            $stmt->execute([

                $newHash,

                $_SESSION["user_id"]

            ]);


            $message =
                "Password changed successfully.";

        }

    }

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

<title>Change Password</title>

<style>

* {
    box-sizing: border-box;
}

body {

    margin: 0;

    min-height: 100vh;

    display: flex;

    justify-content: center;

    align-items: center;

    padding: 20px;

    font-family: Arial, sans-serif;

    background-image:
        linear-gradient(
            rgba(0,0,0,0.4),
            rgba(0,0,0,0.4)
        ),
        url("background.jpg");

    background-size: cover;

}

.box {

    width: 100%;

    max-width: 480px;

    background: white;

    padding: 30px;

    border-radius: 14px;

    box-shadow:
        0 10px 35px
        rgba(0,0,0,0.25);

}

h1 {

    text-align: center;

    margin-top: 0;

}

.form-group {

    margin-bottom: 17px;

}

label {

    display: block;

    font-weight: bold;

    margin-bottom: 7px;

}

input {

    width: 100%;

    padding: 12px;

    border: 1px solid #ccc;

    border-radius: 6px;

    font-size: 15px;

}

.message {

    background: #dcfce7;

    color: #166534;

    padding: 12px;

    border-radius: 6px;

    margin-bottom: 15px;

}

.error {

    background: #fee2e2;

    color: #991b1b;

    padding: 12px;

    border-radius: 6px;

    margin-bottom: 15px;

}

.buttons {

    display: grid;

    gap: 10px;

}

button,
a {

    width: 100%;

    padding: 12px;

    border: none;

    border-radius: 6px;

    text-align: center;

    text-decoration: none;

    cursor: pointer;

    font-size: 15px;

}

.save {

    background: #16a34a;

    color: white;

}

.back {

    background: #64748b;

    color: white;

}

</style>

</head>

<body>

<div class="box">

    <h1>
        🔐 Change Password
    </h1>

    <?php if ($message): ?>

        <div class="message">

            <?= htmlspecialchars($message) ?>

        </div>

    <?php endif; ?>

    <?php if ($error): ?>

        <div class="error">

            <?= htmlspecialchars($error) ?>

        </div>

    <?php endif; ?>

    <form method="POST">

        <div class="form-group">

            <label>
                Current Password
            </label>

            <input
                type="password"
                name="current_password"
                required
            >

        </div>

        <div class="form-group">

            <label>
                New Password
            </label>

            <input
                type="password"
                name="new_password"
                minlength="6"
                required
            >

        </div>

        <div class="form-group">

            <label>
                Confirm New Password
            </label>

            <input
                type="password"
                name="confirm_password"
                minlength="6"
                required
            >

        </div>

        <div class="buttons">

            <button
                type="submit"
                class="save"
            >
                ✓ Change Password
            </button>

            <a
                href="profile.php"
                class="back"
            >
                ← Back to Profile
            </a>

        </div>

    </form>

</div>

</body>
</html>