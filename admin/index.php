<?php
    ob_start();
    session_start();
    if(!isset($_SESSION["username"]) || !isset($_SESSION["logged_in"])) {
        header("Location: login.php");
    }

    require("../config/app.php");
    require($_SERVER["DOCUMENT_ROOT"] . $config_app["path"] . "/admin/classes/db.php");

    define("PAGE_NAME", "Index");
?>
<?php require("includes/header.php"); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            hello world
        </div>
    </div>
</div>

<?php require("includes/footer.php"); ?>
