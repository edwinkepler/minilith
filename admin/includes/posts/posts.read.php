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
                        <a href="posts.php?action=create" class="button is-primary">Add new</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main class="has-background-light">
        <div class="container">
            <div class="list-header">
                <div class="columns">
                    <div class="column is-1 has-text-centered">
                        <span class="has-text-grey-light ">ID</span>
                    </div>
                    <div class="column is-2 has-text-centered">
                        <span class="has-text-grey-light">Thumbnail</span>
                    </div>
                    <div class="column is-4 has-text-centered">
                        <span class="has-text-grey-light">Content</span>
                    </div>
                    <div class="column is-1 has-text-centered">
                        <span class="has-text-grey-light">Status</span>
                    </div>
                    <div class="column is-1 has-text-centered">
                        <span class="has-text-grey-light">Author</span>
                    </div>
                    <div class="column is-3 has-text-centered">
                        <span class="has-text-grey-light">Action</span>
                    </div>
                </div>
            </div>
            <?php
            foreach($posts->queryPosts() as $post) {
            ?>
            <a href="posts.php?action=update&id=<?php echo $post['id']; ?>">
                <div class="list-item">
                    <div class="columns is-desktop is-vcentered">
                        <div class="column is-1 has-text-centered">
                            <span class="has-text-dark"><?php echo $post['id']; ?></span>
                        </div>
                        <div class="column is-2 padding-top-bottom-075rem">
                            <div class="list-item-img" style="background-image: url('<?php echo "../storage/images/" . $post["image"]; ?>')"></div>
                        </div>
                        <div class="column is-4">
                            <span class="has-text-dark"><?php echo $post['title']; ?></span>
                            <p class="has-text-grey"><?php echo $post['excerpt']; ?></p>
                        </div>
                        <div class="column is-1">

                        </div>
                        <div class="column is-1">
                            <span class="has-text-dark"><?php echo $post["author"]; ?></span>
                        </div>
                        <div class="column is-3">
                            <button id="<?php echo $post['id']; ?>" class="modal-trigger button is-danger">
                                <span class="icon is-small">
                                    <i class="fas fa-times"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <div id="delete-<?php echo $post['id']; ?>" class="modal">
                <div class="modal-background"></div>
                <div class="modal-content">
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                Delete item
                            </p>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <p>Are you sure you want to delete post <?php echo $post['title']; ?></p>
                            </div>
                        </div>
                        <footer class="card-footer">
                            <a href="posts.php?action=delete&id=<?php echo $post['id']; ?>" class="card-footer-item modal-button-yes">Yes</a>
                            <a href="#" class="card-footer-item modal-button-no">No</a>
                        </footer>
                    </div>
                </div>
            </div>
            <?php
            } // end foreach
            ?>
        </div>
    </main>
