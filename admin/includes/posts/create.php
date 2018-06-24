<?php
    if(!defined("PAGE")) {
        header("HTTP/1.1 404 File Not Found", 404);
        exit();
    }

    if(!isset($_SESSION["username"]) || !isset($_SESSION["logged_in"])) {
        header("Location: login.php");
        exit();
    }

    $_SESSION["errors"] = array();
    $max_file_size = 2500000;
    $excerpt_length = 250;

    if(isset($_POST["submit_post"])) {
        $_SESSION["title"]      = $_POST["title"];
        $_SESSION["content"]    = $_POST["content"];
        $_SESSION["date"]       = $_POST["date"];
        $_SESSION["file"]       = $_FILES["thumbnail"]["name"];

        validateContent();
        validateImage();

        // Add to database
        if($_POST["title"] != "" && $_POST["content"] != "" && $_POST["date"] != "" && $_FILES["thumbnail"] != "" && empty($_SESSION["errors"])) {
            $excerpt = mb_substr(strip_tags($_POST["content"]), 0, $excerpt_length);
            $excerpt .= "...";
            $main->db()->createPost($_POST["title"], $_POST["content"], $excerpt, $_POST["date"], $_SESSION["username"], $_FILES["thumbnail"]["name"]);
            header("Location: posts.php");
            exit();
        }
    } elseif(isset($_POST["update_post"])) {
        $_SESSION["title"]      = $_POST["title"];
        $_SESSION["content"]    = $_POST["content"];
        $_SESSION["date"]       = $_POST["date"];
        if(!empty($_FILES["thumbnail"]["name"])) {
            $_SESSION["file"] = $_FILES["thumbnail"]["name"];
        }

        validateContent();

        if($_FILES["thumbnail"]["name"] != "") {
            validateImage();
        }

        // Update post in database
        if($_POST["title"] != "" && $_POST["content"] != "" && $_POST["date"] != "" && $_FILES["thumbnail"] != "" && empty($_SESSION["errors"])) {
            $excerpt = mb_substr(strip_tags($_POST["content"]), 0, $excerpt_length);
            $excerpt .= "...";
            $main->db()->updatePost($_SESSION["post_id"], $_POST["title"], $_POST["content"], $excerpt, $_POST["date"], $_SESSION["username"], $_SESSION["file"]);
            echo $_SESSION["post_id"];
            header("Location: posts.php");
            exit();
        }
    } else {
        unsetSession();
    }

    if($_GET["action"] == "update") {
        $post = $main->db()->getPost($_GET["id"]);
        $_SESSION["title"]      = $post["title"];
        $_SESSION["content"]    = $post["content"];
        $_SESSION["date"]       = $post["date_published"];
        $_SESSION["file"]       = $post["image"];
        $_SESSION["post_id"]    = $_GET["id"];
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
                        <?php
                            if($_GET["action"] == "update") {
                        ?>
                        <button id="update-post-fake" class="button is-primary">Update</button>
                        <?php
                            } else {
                        ?>
                        <button id="submit-post-fake" class="button is-primary">Publish</button>
                        <?php
                            } // if
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main class="has-background-light">
        <form class="width-100" action="<?php if($_GET["action"] == "update") { echo "posts.php?action=update&id=" . $_SESSION["post_id"]; } else { echo "posts.php?action=create"; } ?>" method="POST" enctype="multipart/form-data">
            <div class="container bg-light padding-top-15px padding-bottom-15px">
                <div class="columns">
                    <div class="column is-12">
                        <?php
                            foreach($_SESSION["errors"] as $error) {
                        ?>
                        <div class="notification is-danger">
                            <div class="delete"></div>
                            <?php echo $error; ?>
                        </div>
                        <?php
                            } // foreach
                        ?>
                    </div>
                </div>
                <div class="columns">
                    <div class="column is-9">
                        <input class="input" type="text" name="title" value="<?php if(isset($_SESSION["title"])) { echo $_SESSION["title"]; } ?>">
                        <div id="pell" class="pell"></div>
                        <textarea id="pell-output" name="content" hidden><?php if(isset($_SESSION["content"])) { echo $_SESSION["content"]; } ?></textarea>
                    </div>
                    <aside class="column is-3">
                        <?php
                            if($_GET["action"] == "update") {
                        ?>
                        <div class="form-group">
                            <input id="update-post" type="submit" name="update_post" value="Update" hidden>
                        </div>
                        <?php
                            } else {
                        ?>
                        <div class="form-group">
                            <input id="submit-post" type="submit" name="submit_post" value="Publish" hidden>
                        </div>
                        <?php
                            } // if
                        ?>
                        <input class="input" type="date" name="date" value="<?php if(isset($_SESSION["title"])) { echo $_SESSION["date"]; } ?>">
                        <label for="file">Thumbnail</label>
                        <?php
                            if($_GET["action"] == "update") {
                        ?>
                        <img class="width-100" src="<?php echo "../storage/images/" . $_SESSION["file"]; ?>" alt="Thumbnail"/>
                        <?php
                            } // if
                        ?>
                        <input type="file" name="thumbnail" accept="image/*"/>
                    </aside>
                </div>
            </div>
        </form>
    </main>
