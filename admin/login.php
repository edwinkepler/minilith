<?php
    ob_start();
    session_start();
    $_SESSION["csrf"] = md5(time());

    if(isset($_SESSION["username"]) || isset($_SESSION["logged_in"])) {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Minilith</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/page.login.css">
</head>
<body>
    <form action="includes/form_handlers/login_handler.php" method="POST">
        <input type="hidden" name="csrf" value="<?php echo $_SESSION["csrf"] ?>">
        <input type="email" name="email" placeholder="E-mail" required>
        <br>
        <input type="password" name="password" placeholder="Password" required>
        <br>
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>
