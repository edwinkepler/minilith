<?php
if (!defined("PAGE")) {
    header("HTTP/1.1 404 File Not Found", 404);
    exit;
}

if (!isset($_SESSION["username"]) || !isset($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit;
}

$main->db()->deletePost($_GET["id"]);

header("Location: posts.php");
exit;
?>
