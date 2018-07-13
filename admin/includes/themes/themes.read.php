<?php
if (!defined('PAGE')) {
    header('HTTP/1.1 404 File Not Found', 404);
    exit;
}

if (!isset($_SESSION['username']) || !isset($_SESSION['logged_in'])) {
    header('Location: login.php');
    exit;
}
?>
<section class="hero is-info">
    <div class="hero-body">
        <div class="container">
            <div class="columns">
                <div class="column is-6">
                    <h1 class="title">
                        <?php echo PAGE_NAME ?>
                    </h1>
                </div>
                <div class="column is-6 has-text-right">
                    <!-- <a href="posts.php?action=create" class="button is-primary">Add new</a> -->
                </div>
            </div>
        </div>
    </div>
</section>
