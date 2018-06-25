<?php
if (!defined("PAGE")) {
    header("HTTP/1.1 404 File Not Found", 404);
    exit;
}

if (!isset($_SESSION["username"]) || !isset($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit;
}

$_SESSION["errors"] = array();

if (isset($_POST["submit_page"])) {
    $_SESSION["title"]      = $_POST["title"];
    $_SESSION["content"]    = $_POST["content"];

    validateContent();

    // Add to database
    if($_POST["title"] != "" && $_POST["content"] != "" && empty($_SESSION["errors"])) {
        $main->db()->createPage($_POST["title"], $_POST["content"], true, $_SESSION["username"]);
        header("Location: pages.php");
        exit;
    }
} elseif (isset($_POST["update_page"])) {
    $_SESSION["title"]      = $_POST["title"];
    $_SESSION["content"]    = $_POST["content"];

    validateContent();

    // Update post in database
    if ($_POST["title"] != "" && $_POST["content"] != "" && empty($_SESSION["errors"])) {
        $main->db()->updatePage($_SESSION["page_id"], $_POST["title"], $_POST["content"], true, $_SESSION["username"]);
        header("Location: pages.php");
        exit;
    }
} else {
    unsetSession();
}

if ($_GET["action"] == "update") {
    $post = $main->db()->getPage($_GET["id"]);
    $_SESSION["title"]      = $post["title"];
    $_SESSION["content"]    = $post["content"];
    $_SESSION["page_id"]    = $_GET["id"];
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
                        <button id="update-page-fake" class="button is-primary">Update</button>
                        <?php
                            } else {
                        ?>
                        <button id="submit-page-fake" class="button is-primary">Publish</button>
                        <?php
                            } // if
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main class="has-background-light">
        <form class="width-100" action="<?php if($_GET["action"] == "update") { echo "pages.php?action=update&id=" . $_SESSION["page_id"]; } else { echo "pages.php?action=create"; } ?>" method="POST">
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
                    <div class="column is-12">
                        <input class="input" type="text" name="title" value="<?php if(isset($_SESSION["title"])) { echo $_SESSION["title"]; } ?>">
                        <div id="pell" class="pell"></div>
                        <textarea id="pell-output" name="content" hidden><?php if(isset($_SESSION["content"])) { echo $_SESSION["content"]; } ?></textarea>
                    </div>
                    <?php
                        if($_GET["action"] == "update") {
                    ?>
                    <div class="form-group">
                        <input id="update-page" type="submit" name="update_page" value="Update" hidden>
                    </div>
                    <?php
                        } else {
                    ?>
                    <div class="form-group">
                        <input id="submit-page" type="submit" name="submit_page" value="Publish" hidden>
                    </div>
                    <?php
                        } // if
                    ?>
                </div>
            </div>
        </form>
    </main>
