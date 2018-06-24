<?php
    if(!defined("PAGE")) {
        header("HTTP/1.1 404 File Not Found", 404);
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>minilith | <?php echo PAGE_NAME ?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <?php
        foreach($main->getCss() as $css) {
            echo '<link rel="stylesheet" href="' . $css . '">';
        }
    ?>
    <link rel="stylesheet" href="assets/css/main.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <?php
        foreach($main->getScript() as $script) {
            echo '<script src="' . $script . '"></script>';
        }
    ?>
    <script src="assets/js/main.js"></script>
</head>
<body class="has-background-info">
    <div class="container navbar-container">
        <div class="columns">
            <div class="column is-12">
                <nav class="navbar is-info">
                    <div class="navbar-brand">
                        <a class="navbar-item" href="index.php">
                            <img src="assets/images/logo.png" alt="minilith cms" width="112" height="28">
                        </a>
                        <div class="navbar-burger burger" data-target="navbar-items">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div id="navbar-items" class="navbar-menu">
                        <div class="navbar-start">
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link" href="posts.php">
                                    Posts
                                </a>
                                <div class="navbar-dropdown is-boxed">
                                    <a class="navbar-item" href="posts.php">
                                        Show all
                                    </a>
                                    <a class="navbar-item" href="posts.php?action=create">
                                        Add new
                                    </a>
                                </div>
                            </div>
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link" href="posts.php">
                                    Pages
                                </a>
                                <div class="navbar-dropdown is-boxed">
                                    <a class="navbar-item" href="pages.php">
                                        Show all
                                    </a>
                                    <a class="navbar-item" href="pages.php?action=create">
                                        Add new
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-end">
                            <a class="navbar-item" href="includes/index/logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
