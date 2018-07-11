<?php include "header.php"; ?>

<div class="background"></div>
<main class="container">
    <div class="columns">
        <div class="column margin-top-15rem">
            <?php
            if ($main->posts()->count() == 0) {
                echo "<h1>No posts found</h1>";
            } else {
                foreach ($main->posts()->all() as $post) {
            ?>
            <a href="index.php?post=<?php echo $post["id"] ?>">
                <div class="card">
                    <div class="card-img" style="background-image: url('<?php echo $main->storage()->imagesUrl() . $post["image"] ?>')">
                        <div class="card-title-shader"></div>
                        <h5 class="card-title"><?php echo $post["title"] ?></h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo $post["excerpt"] ?></p>
                    </div>
                    <div class="meta">
                        <div class="avatar"><img src="<?php echo $main->storage()->avatarsUrl() . $main->users()->avatar($post['author']); ?>" alt="<?php echo $post['author'] ?>"></div>
                        <div class="author-date">
                            <div class="author"><?php echo $post['author']; ?></div>
                            <div class="date"><?php echo $post['date_published']; ?></div>
                        </div>
                    </div>
                </div>
            </a>
            <?php
                } // foreach($main->posts()->all() as $post)
            } // if($main->posts()->count() == 0)
            ?>
        </div>
    </div>
</main>

<?php include "footer.php"; ?>
