<?php

session_start();

require_once "db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username =
        trim(
            $_POST["username"] ?? ""
        );

    if ($username === "") {

        $error =
            "Please enter your username.";

    } else {

        $stmt = $pdo->prepare(
            "SELECT id
             FROM users
             WHERE username = ?
             LIMIT 1"
        );

        $stmt->execute([
            $username
        ]);

        $user = $stmt->fetch();

        if (!$user) {

            $error =
                "Account not found.";

        } else {

            $error =
                "Please contact the system administrator to reset your password.";

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

<title>Forgot Password</title>

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

    max-width: 500px;

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

.info {

    background: #eff6ff;

    color: #1e40af;

    padding: 15px;

    border-radius: 7px;

    line-height: 1.5;

    margin-bottom: 20px;

}

.error {

    background: #fee2e2;

    color: #991b1b;

    padding: 12px;

    border-radius: 6px;

    margin-bottom: 15px;

}

.form-group {

    margin-bottom: 15px;

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

}

button,
a {

    display: block;

    width: 100%;

    padding: 12px;

    border-radius: 6px;

    border: none;

    text-align: center;

    text-decoration: none;

    margin-top: 10px;

}

button {

    background: #2563eb;

    color: white;

    cursor: pointer;

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
        🔑 Forgot Password
    </h1>

    <div class="info">

        If you forgot your password,
        please contact the system administrator
        to reset your account.

        <br><br>

        For security, password resets are
        handled by the administrator.

    </div>

    <?php if ($error): ?>

        <div class="error">

            <?= htmlspecialchars($error) ?>

        </div>

    <?php endif; ?>

    <form method="POST">

        <div class="form-group">

            <label>
                Username
            </label>

            <input
                type="text"
                name="username"
                placeholder="Enter your username"
                required
            >

        </div>

        <button type="submit">
            Submit Reset Request
        </button>

        <a
            href="index.php"
            class="back"
        >
            ← Back to Login
        </a>

    </form>

</div>

</body>
</html>