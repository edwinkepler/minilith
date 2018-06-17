<?php include "header.php"; ?>

<div class="background"></div>
<main class="container">
    <div class="columns">
        <div class="column">
            <?php
                if($main->posts()->count() == 0) {
                    echo "<h1>No posts found</h1>";
                } else {
                    foreach($main->posts()->all() as $post) {
            ?>
            <a href="index.php?post=<?php echo $post["id"] ?>">
                <div class="card">
                    <div class="card-img" style="background-image: url('<?php echo $main->storage()->images() . $post["image"] ?>')">
                        <div class="card-title-shader"></div>
                        <h5 class="card-title"><?php echo $post["title"] ?></h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo $post["excerpt"] ?></p>
                    </div>
                </div>
            </a>
            <?php
                    }
                }
            ?>
        </div>
    </div>
</main>


<?php include "footer.php"; ?>
