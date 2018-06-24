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
            Main::setPageName("New page");

            $main->setCss("https://unpkg.com/pell/dist/pell.min.css");
            $main->setScript("https://unpkg.com/pell");
            $main->setScript("assets/js/pages.create.js");

            require("includes/header.php");
            require("includes/pages/create.functions.php");
            require("includes/pages/create.php");
            require("includes/footer.php");
        } elseif($_GET["action"] == "update" && isset($_GET["id"])) {
            Main::definePage();
            Main::setPageName("Update page");

            $main->setCss("https://unpkg.com/pell/dist/pell.min.css");
            $main->setScript("https://unpkg.com/pell");
            $main->setScript("assets/js/pages.create.js");

            require("includes/header.php");
            require("includes/pages/create.functions.php");
            require("includes/pages/create.php");
            require("includes/footer.php");
        } elseif($_GET["action"] == "delete" && isset($_GET["id"])) {
            Main::definePage();
            require("includes/pages/delete.php");
        }
    } else {
        Main::definePage();
        Main::setPageName("Pages");

        $main->setScript("assets/js/pages.read.js");

        require("includes/header.php");
        require("includes/pages/read.php");
    }
?>
