<?php 
    ob_start();
    session_start();
    if(!isset($_SESSION["user"])) {
        header("Location: login.php");
    }

    require("includes/header.php");
?>

<form action="post.php" action="POST">
    <input type="text" name="title">
    <br>
    <input type="text" name="content">
    <br>
    <input type="text" name="image">
    <br>

</form>

<?php require("includes/footer.php") ?>
