<?php
ob_start();
session_start();

if (isset($_POST)) {
    if ($_SESSION['csrf'] != $_POST['csrf'] || !isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['submit'])) {
        header('Location: ../../login.php');
        exit;
    }
} else {
    header('Location: ../../login.php');
    exit;
}

require('../../../config/db.php');
$connection = mysqli_connect($config_db['host'], $config_db['user'], $config_db['pass'], $config_db['name']);

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$email = $connection->real_escape_string($email);
$password = $connection->real_escape_string($_POST['password']);

$query = mysqli_query($connection, "SELECT * FROM users WHERE email='$email'");

if (mysqli_num_rows($query) == 0) {
    header('Location: ../../login.php');
    exit;
} else {
    $user = mysqli_fetch_assoc($query);
    if (password_verify($password, $user['password'])) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $user['username'];
        header('Location: ../../index.php');
        exit;
    } else {
        header('Location: ../../login.php');
        exit;
    }
}
