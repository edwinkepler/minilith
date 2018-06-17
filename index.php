<?php
    require("config/app.php");
    require("classes/main.php");
    $main = new Main($config_app);

    if(!empty($_GET)) {
        $post   = $_GET['p'];
        $cat    = $_GET['cat'];
    }

    if(empty($post) && empty($cat)) {
        include "themes/" . $main->app()->getThemeName() . "/index.php";
    } elseif(!empty($post)) {
        echo 'single';
    } elseif(!empty($cat)) {
        echo 'category';
    }
?>
