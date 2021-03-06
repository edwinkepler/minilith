<?php include 'header.php'; ?>

<div class="background"></div>
<div class="arrow-back">
    <a href="index.php"><i class="fas fa-arrow-left"></i></a>
</div>
<main class="container">
    <div class="columns">
        <div class="column margin-top-15rem">
            <div class="card">
                <div class="card-img" style="background-image: url('<?php echo $main->storage()->imagesUrl() . $main->post()->image(); ?>')">
                    <div class="card-title-shader"></div>
                    <h5 class="card-title"><?php echo $main->post()->title(); ?></h5>
                </div>
                <div class="meta">
                    <div class="avatar"><img src="<?php echo $main->storage()->avatarsUrl() . $main->users()->avatar($main->post()->author()); ?>" alt="<?php echo $main->post()->author() ?>"></div>
                    <div class="author-date">
                        <div class="author"><?php echo $main->post()->author(); ?></div>
                        <div class="date"><?php echo $main->post()->date(); ?></div>
                    </div>
                </div>
                <div class="card-body-post">
                    <article>
                        <?php echo $main->post()->content(); ?>
                    </article>
                </div>
                <div class="card-comments">
                <?php include 'comments.php'; ?>
                </div>
            </div>
            <div class="post-navigation">
                <?php
                $prevPostId = $main->posts()->prevId($main->post()->id());
                $prevPost = $main->db()->queryPost($prevPostId);

                $nextPostId = $main->posts()->nextId($main->post()->id());
                $nextPost = $main->db()->queryPost($nextPostId);
                ?>
                <div class="post-prev">
                    <a href="index.php?post=<?php echo $prevPostId; ?>"><i class="fas fa-arrow-left"></i></a>
                    <span class="tooltiptext"><?php echo $prevPost['title']; ?></span>
                </div>
                <div class="post-next">
                    <a href="index.php?post=<?php echo $nextPostId; ?>"><i class="fas fa-arrow-right"></i></a>
                    <span class="tooltiptext"><?php echo $nextPost['title']; ?></span>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
