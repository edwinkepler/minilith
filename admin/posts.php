<?php
    require_once("classes/main.php");

    ob_start();
    session_start();
    if(!isset($_SESSION["username"]) || !isset($_SESSION["logged_in"])) {
        header("Location: login.php");
        exit;
    }

    $main = new Main($db, $config_app);

    if(isset($_GET["action"])) {
        if($_GET["action"] == "create") {
            Main::definePage();
            Main::setPageName("Create new post");

            $main->setCss("https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css");
            $main->setScript("https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js");

            require("includes/header.php");
            require("includes/posts/create.php");
            require("includes/footer.php");
        } elseif($_GET["action"] == "update" && isset($_GET["id"])) {
            Main::definePage();
            Main::setPageName("Update post");

            $main->setCss("https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css");
            $main->setScript("https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js");

            require("includes/header.php");
            require("includes/posts/create.php");
            require("includes/footer.php");
        } elseif($_GET["action"] == "delete" && isset($_GET["id"])) {
            Main::definePage();
            require("includes/posts/delete.php");
        }
    } else {
        Main::definePage();
        Main::setPageName("Posts");
        require("includes/header.php");
        require("includes/posts/read.php");
    }
?>
