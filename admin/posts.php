<?php
    require_once("classes/main.php");

    ob_start();
    session_start();
    if(!isset($_SESSION["username"]) || !isset($_SESSION["logged_in"])) {
        header("Location: login.php");
    }

    $main = new Main($db, $config_app);

    if(isset($_GET["action"])) {
        if($_GET["action"] == "create") {
            Main::setPageName("Create new post");
            require("includes/header.php");
            require("includes/posts/create.php");
            require("includes/footer.php");
        } elseif($_GET["action"] == "update" && isset($_GET["id"])) {
            Main::setPageName("Update post");
            require("includes/header.php");
            require("includes/posts/update.php");
            require("includes/footer.php");
        } elseif($_GET["action"] == "delete" && isset($_GET["id"])) {
            require("includes/posts/delete.php");
        }
    } else {
        define("PAGE_NAME", "Posts");
        require("includes/header.php");
        require("includes/posts/read.php");
    }
?>
