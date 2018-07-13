<?php
if (!defined('PAGE')) {
    header('HTTP/1.1 404 File Not Found', 404);
    exit;
}

if (!isset($_SESSION['username']) || !isset($_SESSION['logged_in'])) {
    header('Location: login.php');
    exit;
}

$_SESSION['errors'] = array();
$max_file_size = 2500000;

if (isset($_POST['submit_user'])) {
    $_SESSION['name']       = $_POST['username'];
    $_SESSION['email']      = $_POST['email1'];
    $_SESSION['avatar']     = $_FILES['avatar']['name'];

    validateContent();
    validateImage();

    // Add to database
    if ($_POST['username'] != '' && $_POST['email1'] != '' && $_POST['password1'] != '' && $_FILES['avatar'] != '' && empty($_SESSION['errors'])) {
        $users->createUser($_POST['username'], $_POST['email1'], $excerpt, $_POST['password1'], $_FILES['avatar']['name']);
        header('Location: users.php');
        exit;
    }
} else {
    unsetSession();
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
                    if($_GET['action'] == 'update') {
                    ?>
                    <button id="update-user-fake" class="button is-primary">Update</button>
                    <?php
                    } else {
                    ?>
                    <button id="submit-user-fake" class="button is-primary">Add</button>
                    <?php
                    } // if
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<main class="has-background-light">
    <form class="width-100" action="<?php if($_GET["action"] == "update") { echo "users.php?action=update&id=" . $_SESSION["post_id"]; } else { echo "users.php?action=create"; } ?>" method="POST" enctype="multipart/form-data">
        <div class="container bg-light padding-top-15px padding-bottom-15px">
            <div class="columns">
                <div class="column is-12">
                    <?php
                    foreach($_SESSION['errors'] as $error) {
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
                <div class="column is-6">
                    <label for="username">Username</label>
                    <input class="input" type="text" name="username" value="<?php if(isset($_SESSION["name"])) { echo $_SESSION["name"]; } ?>">
                    <label for="email1">Email</label>
                    <input class="input" type="email" name="email1" value="<?php if(isset($_SESSION["email"])) { echo $_SESSION["email"]; } ?>">
                    <label for="email2">Confirm email</label>
                    <input class="input" type="email" name="email2">
                </div>
                <div class="column is-6">
                    <?php
                    if($_GET['action'] == 'update') {
                    ?>
                    <div class="form-group">
                        <input id="update-user" type="submit" name="update_user" value="Update" hidden>
                    </div>
                    <?php
                    } else {
                    ?>
                    <div class="form-group">
                        <input id="submit-user" type="submit" name="submit_user" value="Add" hidden>
                    </div>
                    <?php
                    } // if
                    ?>
                    <label for="password1">Password</label>
                    <input class="input" type="password1" name="password1">
                    <label for="password2">Confirm password</label>
                    <input class="input" type="password2" name="password2">
                    <label for="avatar">Thumbnail</label>
                    <?php
                    if($_GET['action'] == 'update') {
                    ?>
                    <img class="width-100" src="<?php echo "../storage/avatars/" . $_SESSION["avatar"]; ?>" alt="Avatar"/>
                    <?php
                    } // if
                    ?>
                    <input type="file" name="avatar" accept="image/*"/>
                </div>
            </div>
        </div>
    </form>
</main>
