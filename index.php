<?php
require('config/app.php');

if ($config_app['is_debug'] == true) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

require('classes/class.main.php');
$main = new Main($config_app);

if (!empty($_GET)) {
    if (isset($_GET['post'])) {
        $post = $_GET['post'];
    } elseif (isset($_GET['page'])) {
        $page = $_GET['page'];
    } elseif (isset($_GET['category'])) {
        $category = $_GET['category'];
    } elseif (isset($_GET['search'])) {
        $search = $_GET['search'];
    } elseif (isset($_GET['archive'])) {
        $archive = $_GET['archive'];
    }
}

if (empty($post) && empty($category) && empty($search) && empty($archive)) {
    $main->itsIndex();
    include 'themes/' . $main->site()->themeName() . '/index.php';
} elseif (!empty($post)) {
    $main->post()->setId($post);

    $main->itsPost();

    $main->setCss('https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/vs.min.css');
    $main->setScript('https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js');
    $main->setScript($main->theme()->url() . '/assets/js/post.js');
    include 'themes/' . $main->site()->themeName() . '/post.php';
} elseif (!empty($page)) {
    include 'themes/' . $main->site()->themeName() . '/page.php';
} elseif (!empty($category)) {
    include 'themes/' . $main->site()->themeName() . '/category.php';
} elseif (!empty($search)) {
    include 'themes/' . $main->site()->themeName() . '/search.php';
} elseif (!empty($archive)) {
    include 'themes/' . $main->site()->themeName() . '/archive.php';
}
