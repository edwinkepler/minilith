<?php
    ob_start();
    session_start();
    if(!isset($_SESSION["username"]) || !isset($_SESSION["logged_in"])) {
        header("Location: login.php");
    }

    require("../config/app.php");
    require($_SERVER["DOCUMENT_ROOT"] . $config_app["path"] . "/admin/classes/db.php");

    define("PAGE_NAME", "Posts");

    require("includes/header.php"); 

    if(isset($_GET["action"])) {
        if($_GET["action"] == "add") {
            require("includes/posts/create.php");
        } elseif($_GET["action"] == "update" && isset($_GET["id"])) {
            require("includes/posts/update.php");
        }
    } else {
        require("includes/posts/read.php");
    }

    require("includes/footer.php"); 
?>
