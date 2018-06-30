<?php
require("../config/app.php");
require("../config/db.php");
require("classes/class.main.php");
require("classes/class.db.php");

ob_start();
session_start();

if (!isset($_SESSION["username"]) || !isset($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit;
}

$main = new Main($config_db, $config_app);

Main::definePage();
Main::setPageName("Storage");

$main->setScript("assets/js/storage.read.js");

require("includes/header.php");
require("includes/storage/storage.read.php");
require("includes/footer.php");
?>
