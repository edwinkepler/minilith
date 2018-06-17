<?php
    ob_start();
    session_start();
    if(isset($_POST)) {
        if($_SESSION["csrf"] != $_POST["csrf"] || !isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["submit"])) {
            header("Location: ../../index.php");
        }
    } else {
        header("Location: ../../index.php");
    }

    require("../../../config/db.php");
    $connection = mysqli_connect($db["host"], $db["user"], $db["pass"], $db["name"]);

    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL); // Sanitize email
    $email = $connection->real_escape_string($email);
    $password = $connection->real_escape_string($_POST["password"]);

    $query = mysqli_query($connection, "SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($query) == 0) {
        header("Location: ../../login.php");
    } else {
        $user = mysqli_fetch_assoc($query);
        if(password_verify($password, $user['password'])) {
            $_SESSION["logged_in"] = true;
            $_SESSION["username"] = $user["username"];
            header("Location: ../../index.php");
        } else {
            header("Location: ../../login.php");
        }
    }
?>
