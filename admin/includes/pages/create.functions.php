<?php
    if(!defined("PAGE")) {
        header("HTTP/1.1 404 File Not Found", 404);
        exit();
    }

    if(!isset($_SESSION["username"]) || !isset($_SESSION["logged_in"])) {
        header("Location: login.php");
        exit();
    }

    function validateContent() {
        if($_POST["title"] == "") {
            array_push($_SESSION["errors"], "You must enter the title.");
        }

        if($_POST["content"] == "") {
            array_push($_SESSION["errors"], "You must enter the content.");
        }
    }

    function unsetSession() {
        unset($_SESSION["title"]);
        unset($_SESSION["content"]);
    }
?>
