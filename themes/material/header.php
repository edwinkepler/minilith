<?php

?>
<!doctype html>
<html class="no-js" lang="<?php echo $main->app()->getLanguage(); ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $main->app()->getTitle(); ?></title>
    <meta name="description" content="<?php echo $main->app()->getDescryption(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://yarn.pm/normalize.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <link rel="stylesheet" href="<?php echo $main->theme()->getThemeUrl(); ?>/css/main.css">

    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</head>

<body>
    <div class="layout-transparent mdl-layout mdl-js-layout">
        <header class="mdl-layout__header mdl-layout__header--transparent">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title"><?php echo $main->app()->getTitle(); ?></span>
                <!-- Add spacer, to align navigation to the right -->
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation -->
                <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="">Link</a>
                    <a class="mdl-navigation__link" href="">Link</a>
                    <a class="mdl-navigation__link" href="">Link</a>
                    <a class="mdl-navigation__link" href="">Link</a>
                </nav>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title"><?php echo $main->app()->getTitle(); ?></span>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="">Link</a>
            </nav>
        </div>
        <main class="mdl-layout__content">
        </main>
    </div>
