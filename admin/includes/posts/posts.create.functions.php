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
    if ($_POST["title"] == "") {
        array_push($_SESSION["errors"], "You must enter the title.");
    }

    if ($_POST["content"] == "") {
        array_push($_SESSION["errors"], "You must enter the content.");
    }

    if ($_POST["date"] == "") {
        array_push($_SESSION["errors"], "You must enter the date.");
    }
}

function validateImage()
{
    global $config_app;
    global $max_file_size;

    if ($_FILES["thumbnail"]["name"] == "") {
        array_push($_SESSION["errors"], "You must choose the thumbnail.");
    } else {
        $target_file = $_SERVER["DOCUMENT_ROOT"] . $config_app["path"] . "/storage/images/" . basename($_FILES["thumbnail"]["name"]);
        if (file_exists($target_file)) {
            array_push($_SESSION["errors"], "File already exists.");
        }

        if (filesize($_FILES["thumbnail"]["tmp_name"]) > 0) {
            if(exif_imagetype($_FILES["thumbnail"]["tmp_name"]) === false) {
                array_push($_SESSION["errors"], "File must be an image");
            }
        } elseif (filesize($_FILES["thumbnail"]["tmp_name"]) == 0) {
            array_push($_SESSION["errors"], "File must be an image.");
        }

        if ($_FILES["thumbnail"]["size"] > $max_file_size) {
            array_push($_SESSION["errors"], "File is too big.");
        }

        if (!move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
            array_push($_SESSION["errors"], "Failed to upload the file.");
        }
    }
}

function unsetSession()
{
    unset($_SESSION["title"]);
    unset($_SESSION["content"]);
    unset($_SESSION["date"]);
    unset($_SESSION["file"]);
}
