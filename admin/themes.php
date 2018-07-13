<?php
require('../config/app.php');
require('../config/db.php');
require('classes/class.main.php');
require('classes/class.db.php');

ob_start();
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['logged_in'])) {
    header('Location: login.php');
    exit;
}

$main = new Main($db, $config_app);

Main::definePage();
Main::setPageName('Themes');

require('includes/header.php');
require('includes/themes/themes.read.php');
require('includes/footer.php');
