<?php
    if(!defined("PAGE")) {
        header("HTTP/1.1 404 File Not Found", 404);
        exit;
    }

    if(!isset($_SESSION["username"]) || !isset($_SESSION["logged_in"])) {
        header("Location: login.php");
        exit;
    }
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            show
        </div>
    </div>
</div>
