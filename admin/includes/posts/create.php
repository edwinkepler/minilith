<?php
    if(!defined("PAGE")) {
        header("HTTP/1.1 404 File Not Found", 404);
        exit;
    }

    if(!isset($_SESSION["username"]) || !isset($_SESSION["logged_in"])) {
        header("Location: login.php");
        exit;
    }

    $_SESSION["errors"] = array();
    $max_file_size = 2500000;
    $excerpt_length = 250;

    if(isset($_POST["submit_post"])) {
        $_SESSION["title"]      = $_POST["title"];
        $_SESSION["content"]    = $_POST["content"];
        $_SESSION["date"]       = $_POST["date"];
        $_SESSION["file"]       = $_FILES["thumbnail"]["name"];

        if($_POST["title"] == "") {
            array_push($_SESSION["errors"], "You must enter the title.");
        }

        if($_POST["content"] == "") {
            array_push($_SESSION["errors"], "You must enter the content.");
        }

        if($_POST["date"] == "") {
            array_push($_SESSION["errors"], "You must enter the date.");
        }

        if($_FILES["thumbnail"] == "") {
            array_push($_SESSION["errors"], "You must choose the thumbnail.");
        }

        $target_file = $_SERVER["DOCUMENT_ROOT"] . $config_app["path"] . "/storage/images/" . basename($_FILES["thumbnail"]["name"]);
        if(file_exists($target_file)) {
            array_push($_SESSION["errors"], "File already exists.");
        }

        if(filesize($_FILES["thumbnail"]["tmp_name"]) > 0) {
            if(exif_imagetype($_FILES["thumbnail"]["tmp_name"]) === false) {
                array_push($_SESSION["errors"], "File must be an image");
            }
        } elseif(filesize($_FILES["thumbnail"]["tmp_name"]) == 0) {
            array_push($_SESSION["errors"], "File must be an image.");
        }

        if($_FILES["thumbnail"]["size"] > $max_file_size) {
            array_push($_SESSION["errors"], "File is too big.");
        }

        if(!move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
            array_push($_SESSION["errors"], "Failed to upload the file.");
        }

        // Add to database
        if($_POST["title"] != "" && $_POST["content"] != "" && $_POST["date"] != "" && $_FILES["thumbnail"] != "" && empty($_SESSION["errors"])) {
            $excerpt = mb_substr(strip_tags($_POST["content"]), 0, $excerpt_length);
            $excerpt .= "...";
            $main->db()->createPost($_POST["title"], $_POST["content"], $excerpt, $_POST["date"], $_SESSION["username"], $_FILES["thumbnail"]["name"]);
            header("Location: posts.php");
            exit();
        }
    } else {
        unset($_SESSION["title"]);
        unset($_SESSION["content"]);
        unset($_SESSION["date"]);
        unset($_SESSION["file"]);
    }

    if(isset($_POST["update_post"])) {
        $_SESSION["title"]      = $_POST["title"];
        $_SESSION["content"]    = $_POST["content"];
        $_SESSION["date"]       = $_POST["date"];
        $_SESSION["file"]       = $_FILES["thumbnail"]["name"];

        if($_POST["title"] == "") {
            array_push($_SESSION["errors"], "You must enter the title.");
        }

        if($_POST["content"] == "") {
            array_push($_SESSION["errors"], "You must enter the content.");
        }

        if($_POST["date"] == "") {
            array_push($_SESSION["errors"], "You must enter the date.");
        }

        if($_FILES["thumbnail"]["name"] != "") {
            $target_file = $_SERVER["DOCUMENT_ROOT"] . $config_app["path"] . "/storage/images/" . basename($_FILES["thumbnail"]["name"]);
            if(file_exists($target_file)) {
                array_push($_SESSION["errors"], "File already exists.");
            }
    
            if(filesize($_FILES["thumbnail"]["tmp_name"]) > 0) {
                if(exif_imagetype($_FILES["thumbnail"]["tmp_name"]) === false) {
                    array_push($_SESSION["errors"], "File must be an image");
                }
            } elseif(filesize($_FILES["thumbnail"]["tmp_name"]) == 0) {
                array_push($_SESSION["errors"], "File must be an image.");
            }
    
            if($_FILES["thumbnail"]["size"] > $max_file_size) {
                array_push($_SESSION["errors"], "File is too big.");
            }

            if(!move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                array_push($_SESSION["errors"], "Failed to upload the file.");
            }
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
        unset($_SESSION["title"]);
        unset($_SESSION["content"]);
        unset($_SESSION["date"]);
        unset($_SESSION["file"]);
    }

    if(isset($_POST["update"])) {
        $post = $main->db()->getPost($_GET["id"]);
        $_SESSION["title"]      = $post["title"];
        $_SESSION["content"]    = $post["content"];
        $_SESSION["date"]       = $post["date_published"];
        $_SESSION["file"]       = $post["image"];
        $_SESSION["post_id"]    = $_GET["id"];
    }
?>
<form class="width-100" action="<?php if(isset($_POST["update"])) { echo "posts.php?action=update&id=" . $_SESSION["post_id"]; } else { echo "posts.php?action=create"; } ?>" method="POST" enctype="multipart/form-data">
    <div class="container bg-light padding-top-15px padding-bottom-15px">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <?php
                    foreach($_SESSION["errors"] as $error) {
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $error; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                    }
                ?>
                <div class="form-group">
                    <input class="form-control" type="text" name="title" value="<?php if(isset($_SESSION["title"])) { echo $_SESSION["title"]; } else { echo "Title"; } ?>" required>
                </div>
                <textarea id="summernote" name="content" required><?php if(isset($_SESSION["content"])) { echo $_SESSION["content"]; } ?></textarea>
            </div>
            <aside class="col-sm-12 col-md-4">
                <?php
                    if(isset($_POST["update"])) {
                ?>
                <div class="form-group">
                    <input class="btn btn-primary width-100" type="submit" name="update_post" value="Update">
                </div>
                <?php
                    } else {
                ?>
                <div class="form-group">
                    <input class="btn btn-primary width-100" type="submit" name="submit_post" value="Publish">
                </div>
                <?php
                    }
                ?>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input class="form-control" type="date" name="date" value="<?php if(isset($_SESSION["title"])) { echo $_SESSION["date"]; } ?>" required>
                </div>
                <div class="form-group">
                    <label for="file">Thumbnail</label>
                    <?php
                        if(isset($_POST["update"])) {
                    ?>
                    <img class="width-100" src="<?php echo "../storage/images/" . $_SESSION["file"]; ?>" alt="Thumbnail">
                    <?php
                        }
                    ?>
                    <input type="file" name="thumbnail" accept="image/*" <?php if(!isset($_POST["update"])) { echo "required"; } ?>>
                </div>
            </aside>
        </div>
    </div>
</form>
