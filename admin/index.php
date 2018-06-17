<?php
    ob_start();
    session_start();
    if(!isset($_SESSION["username"]) || !isset($_SESSION["logged_in"])) {
        header("Location: login.php");
    }

    require("../config/app.php");
    require($_SERVER["DOCUMENT_ROOT"] . $config_app["path"] . "/admin/classes/db.php");

    echo "index.php";
?>
