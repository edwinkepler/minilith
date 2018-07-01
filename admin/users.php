<?php
require("../config/app.php");
require("../config/db.php");
require("classes/class.main.php");
require("classes/class.db.php");
require("classes/class.users.php");

ob_start();
session_start();
if (!isset($_SESSION["username"]) || !isset($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit;
}

$main = new Main($config_db, $config_app);
$db = new DB($config_db, $config_app);
$users = new Users($db->connection());

if (isset($_GET["action"])) {
    if ($_GET["action"] == "create") {
        Main::definePage();
        Main::setPageName("Add new user");

        $main->setScript("assets/js/users.create.js");

        require("includes/header.php");
        require("includes/users/users.create.functions.php");
        require("includes/users/users.create.php");
        require("includes/footer.php");
    } elseif ($_GET["action"] == "update" && isset($_GET["id"])) {
        Main::definePage();
        Main::setPageName("Update user");

        $main->setScript("assets/js/users.create.js");

        require("includes/header.php");
        require("includes/users/users.create.functions.php");
        require("includes/users/users.create.php");
        require("includes/footer.php");
    } elseif ($_GET["action"] == "delete" && isset($_GET["id"])) {
        Main::definePage();

        require("includes/users/users.delete.php");
    }
} else {
    Main::definePage();
    Main::setPageName("Users");

    $main->setScript("assets/js/users.read.js");

    require("includes/header.php");
    require("includes/users/users.read.php");
    require("includes/footer.php");
}
?>
