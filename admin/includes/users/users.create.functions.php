<?php
if (!defined("PAGE")) {
    header("HTTP/1.1 404 File Not Found", 404);
    exit;
}

if (!isset($_SESSION["username"]) || !isset($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit;
}

function validateContent()
{
    if ($_POST["username"] == "") {
        array_push($_SESSION["errors"], "You must enter the username.");
    }

    if ($_POST["email1"] == "") {
        array_push($_SESSION["errors"], "You must enter the email.");
    }

    if ($_POST["email2"] == "") {
        array_push($_SESSION["errors"], "You must confirm the email.");
    }

    if ($_POST["password1"] == "") {
        array_push($_SESSION["errors"], "You must enter the password.");
    }

    if ($_POST["password2"] == "") {
        array_push($_SESSION["errors"], "You must confirm the password.");
    }
}

function validateImage()
{
    global $config_app;
    global $max_file_size;

    if ($_FILES["avatar"]["name"] == "") {
        array_push($_SESSION["errors"], "You must choose the thumbnail.");
    } else {
        $target_file = $_SERVER["DOCUMENT_ROOT"] . $config_app["path"] . "/storage/avatars/" . basename($_FILES["avatar"]["name"]);
        if (file_exists($target_file)) {
            array_push($_SESSION["errors"], "File already exists.");
        }

        if (filesize($_FILES["avatar"]["tmp_name"]) > 0) {
            if (exif_imagetype($_FILES["avatar"]["tmp_name"]) === false) {
                array_push($_SESSION["errors"], "File must be an image");
            }
        } elseif (filesize($_FILES["avatar"]["tmp_name"]) == 0) {
            array_push($_SESSION["errors"], "File must be an image.");
        }

        if ($_FILES["avatar"]["size"] > $max_file_size) {
            array_push($_SESSION["errors"], "File is too big.");
        }

        if (!move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
            array_push($_SESSION["errors"], "Failed to upload the file.");
        }
    }
}

function unsetSession()
{
    unset($_SESSION["name"]);
    unset($_SESSION["email"]);
    unset($_SESSION["avatar"]);
}
