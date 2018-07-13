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
<main class="has-background-light">
    <div class="container">
        <?php
        $path = '../storage/images/';
        $files = array_diff(scandir($path), array('.', '..'));
        $i = 0;
        foreach($files as $file) {
        ?>
        <div id="<?php echo $i; ?>" class="storage-img" style="background-image: url('<?php echo $path . $file; ?>')">
                <span><?php echo $file; ?></span>
        </div>
        <div id="modal-for-<?php echo $i; ?>" class="modal">
            <div class="modal-background"></div>
            <div class="modal-content">
                <p class="image is-4by3">
                <img src="<?php echo '../storage/images/' . $file ?>">
                </p>
            </div>
            <button class="modal-close is-large" aria-label="close"></button>
        </div>
        <?php
            $i++;
        } // foreach
        ?>
    </div>
</main>
