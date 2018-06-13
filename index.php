<?php
    include("config/app.php");
    include($_SERVER["DOCUMENT_ROOT"] . APP_PATH . "/classes/db.php");

    if(!empty($_GET)) {
        $post   = $_GET['p'];
        $cat    = $_GET['cat'];
    }

    $db = new DB();
    $_APP = $db->app();

    if(empty($post) && empty($cat)) {
        include "themes/{$_APP["theme"]}/index.php";
    } elseif(!empty($post)) {
        echo 'single';
    } elseif(!empty($cat)) {
        echo 'category';
    }
?>
