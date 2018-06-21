<?php
    ob_start();
    session_start();
    $_SESSION["csrf"] = md5(time());

    if(isset($_SESSION["username"]) && isset($_SESSION["logged_in"])) {
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Minilith</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.css"/>
    <link rel="stylesheet" href="https://unpkg.com/flexboxgrid2@7.1.0/flexboxgrid2.css"/>
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-purple.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"/>
    <link rel="stylesheet" href="assets/css/login.css"/>

    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</head>
<body>
    <div class="background"></div>
    <div class="container">
        <div class="row center-xs middle-xs">
            <div class="col-xs-12 col-md-4">
                <form class="login-form" action="includes/login/read.php" method="POST">
                    <input type="hidden" name="csrf" value="<?php echo $_SESSION["csrf"] ?>">
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" type="email" name="email" placeholder="E-mail" required>
                        <label class="mdl-textfield__label" for="email">Email</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" type="password" name="password" placeholder="Password" required>
                        <label class="mdl-textfield__label" for="password">Password</label>
                    </div>
                    <input class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit" name="submit" value="Login">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
