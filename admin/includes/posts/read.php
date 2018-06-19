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
        <div class="col-1">
            <span>ID</span>
        </div>
        <div class="col-1">
            <span>Thumbnail</span>
        </div>
        <div class="col-2">
            <span>Title</span>
        </div>
        <div class="col-4">
            <span>Date</span>
        </div>
        <div class="col-1">
            <span>Author</span>
        </div>
        <div class="col-3">
            <span>Action</span>
        </div>
    </div>
    <?php
        foreach($main->db()->queryPosts() as $post) {
    ?>
    <div class="row">
        <div class="col-1">
            <span><?php echo $post["id"]; ?></span>
        </div>
        <div class="col-1">
            <span><?php echo $post["image"]; ?></span>
        </div>
        <div class="col-2">
            <span><?php echo $post["title"]; ?></span>
        </div>
        <div class="col-4">
            <span><?php echo $post["date_published"]; ?></span>
        </div>
        <div class="col-1">
            <span><?php echo $post["author"]; ?></span>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-primary">Edit</button>
            <form action="posts.php?action=delete&id=<?php echo $post["id"]; ?>" method="POST">
                <button type="submit" name="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
    <?php
        }
    ?>
</div>
