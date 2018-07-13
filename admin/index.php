<?php
require('../config/app.php');
require('../config/db.php');
require('classes/class.main.php');
require('classes/class.db.php');

ob_start();
session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['logged_in'])) {
    header('Location: login.php');
}

$main = new Main($config_db, $config_app);
Main::definePage();
Main::setPageName('Dashboard');
?>
<?php require('includes/header.php'); ?>

<section class="hero is-info">
    <div class="hero-body">
        <div class="container">
        <h1 class="title">
            <?php echo PAGE_NAME ?>
        </h1>
        <h2 class="subtitle">
            Welcome, <?php echo $_SESSION['username']; ?>
        </h2>
        </div>
    </div>
</section>
<main class="has-background-light">

</main>

<?php require('includes/footer.php'); ?>
