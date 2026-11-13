<?php

session_start();

if (isset($_SESSION["user_id"])) {

    header("Location: dashboard.php");
    exit;

}

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    require_once "db.php";

    $username = trim(
        $_POST["username"] ?? ""
    );

    $password = $_POST["password"] ?? "";

    if (
        $username === "" ||
        $password === ""
    ) {

        $error =
            "Please enter your username and password.";

    } else {

        $stmt = $pdo->prepare(
            "SELECT *
             FROM users
             WHERE username = ?
             LIMIT 1"
        );

        $stmt->execute([
            $username
        ]);

        $user = $stmt->fetch();

        if (
            $user &&
            password_verify(
                $password,
                $user["password"]
            )
        ) {

            session_regenerate_id(true);

            $_SESSION["user_id"] =
                $user["id"];

            $_SESSION["username"] =
                $user["username"];

            $_SESSION["full_name"] =
                $user["full_name"];

            header(
                "Location: dashboard.php"
            );

            exit;

        } else {

            $error =
                "Invalid username or password.";

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

<title>Scanning System - Login</title>

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

    font-family: Arial, sans-serif;

    background-image:
        linear-gradient(
            rgba(0,0,0,0.45),
            rgba(0,0,0,0.45)
        ),
        url("bg3.jpg");

    background-size: cover;

    background-position: center;

}

.login-container {

    width: 100%;

    max-width: 420px;

    padding: 20px;

}

.login-box {

    background: rgba(255,255,255,0.97);

    padding: 35px;

    border-radius: 15px;

    box-shadow:
        0 10px 40px
        rgba(0,0,0,0.3);

}

.logo {

    text-align: center;

    font-size: 48px;

    margin-bottom: 10px;

}

h1 {

    text-align: center;

    margin: 0;

    font-size: 25px;

}

.subtitle {

    text-align: center;

    color: #777;

    margin-top: 8px;

    margin-bottom: 25px;

}

.form-group {

    margin-bottom: 18px;

}

label {

    display: block;

    font-weight: bold;

    margin-bottom: 7px;

}

input {

    width: 100%;

    padding: 13px;

    border: 1px solid #ccc;

    border-radius: 7px;

    font-size: 15px;

}

input:focus {

    outline: none;

    border-color: #2563eb;

}

.login-btn {

    width: 100%;

    padding: 13px;

    background: #2563eb;

    color: white;

    border: none;

    border-radius: 7px;

    font-size: 16px;

    font-weight: bold;

    cursor: pointer;

}

.login-btn:hover {

    background: #1d4ed8;

}

.forgot {

    display: block;

    text-align: center;

    margin-top: 18px;

    color: #2563eb;

    text-decoration: none;

    font-size: 14px;

}

.forgot:hover {

    text-decoration: underline;

}

.error {

    background: #fee2e2;

    color: #991b1b;

    padding: 12px;

    border-radius: 6px;

    margin-bottom: 20px;

    text-align: center;

}

.footer {

    text-align: center;

    color: #888;

    font-size: 12px;

    margin-top: 25px;

}

</style>

</head>

<body>

<div class="login-container">

    <div class="login-box">

        <div class="logo">
            📁
        </div>

        <h1>
            AMS
        </h1>

        <div class="subtitle">
            Accomplishment Management System
        </div>

        <?php if ($error !== ""): ?>

            <div class="error">

                <?= htmlspecialchars($error) ?>

            </div>

        <?php endif; ?>

        <form
            method="POST"
            autocomplete="off"
        >

            <div class="form-group">

                <label>
                    Username
                </label>

                <input
                    type="text"
                    name="username"
                    placeholder="Enter username"
                    required
                    autofocus
                >

            </div>

            <div class="form-group">

                <label>
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    placeholder="Enter password"
                    required
                >

            </div>

            <button
                type="submit"
                class="login-btn"
            >
                🔐 Login
            </button>

        </form>

        <a
            href="reset_password.php"
            class="forgot"
        >
            🔑 Forgot Password?
        </a>

        <div class="footer">
            Scanning Accomplishment System
        </div>

    </div>

</div>

</body>
</html>