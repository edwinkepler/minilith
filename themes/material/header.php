<!doctype html>
<html class="no-js" lang="<?php echo $main->site()->language(); ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $main->site()->title(); ?></title>
    <meta name="description" content="<?php echo $main->site()->description(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php
    if ($main->isPost()) {
    ?>
    <meta property="og:title" content="<?php echo $main->post()->title(); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php echo $main->appUrl(); ?>" />
    <meta property="og:image" content="<?php echo $main->storage()->imagesUrl() . $main->post()->image(); ?>" />
    <meta property="og:description" content="<?php echo strip_tags(implode(' ', array_slice(explode(' ', $main->post()->content()), 0, 20))) . '...'; ?>" />
    <meta property="og:locale" content="<?php echo $main->site()->language(); ?>" />
    <meta property="og:site_name" content="<?php echo $main->site()->title(); ?>" />
    <?php
    }
    ?>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <?php
    foreach($main->getCss() as $css) {
        echo '<link rel="stylesheet" href="' . $css . '">';
    }
    ?>
    <link rel="stylesheet" href="<?php echo $main->theme()->url(); ?>/assets/css/main.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <?php
    foreach($main->getScript() as $script) {
        echo '<script src="' . $script . '"></script>';
    }
    ?>
</head>

<body>
