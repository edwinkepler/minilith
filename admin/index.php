<?php
    require("classes/main.php");

    ob_start();
    session_start();
    if(!isset($_SESSION["username"]) || !isset($_SESSION["logged_in"])) {
        header("Location: login.php");
    }

    Main::setPageName("Dashboard");
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
