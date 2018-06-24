<?php
    require_once("classes/main.php");

    ob_start();
    session_start();
    if(!isset($_SESSION["username"]) || !isset($_SESSION["logged_in"])) {
        header("Location: login.php");
        exit();
    }

    $main = new Main($db, $config_app);

    if(isset($_GET["action"])) {
        if($_GET["action"] == "create") {
            Main::definePage();
            Main::setPageName("New post");

            $main->setCss("https://unpkg.com/pell/dist/pell.min.css");
            $main->setScript("https://unpkg.com/pell");
            $main->setScript("assets/js/posts.create.js");

            require("includes/header.php");
            require("includes/posts/posts.create.functions.php");
            require("includes/posts/posts.create.php");
            require("includes/footer.php");
        } elseif($_GET["action"] == "update" && isset($_GET["id"])) {
            Main::definePage();
            Main::setPageName("Update post");

            $main->setCss("https://unpkg.com/pell/dist/pell.min.css");
            $main->setScript("https://unpkg.com/pell");
            $main->setScript("assets/js/posts.create.js");

            require("includes/header.php");
            require("includes/posts/posts.create.functions.php");
            require("includes/posts/posts.create.php");
            require("includes/footer.php");
        } elseif($_GET["action"] == "delete" && isset($_GET["id"])) {
            Main::definePage();
            require("includes/posts/posts.delete.php");
        }
    } else {
        Main::definePage();
        Main::setPageName("Posts");

        $main->setScript("assets/js/posts.read.js");

        require("includes/header.php");
        require("includes/posts/posts.read.php");
    }
?>
