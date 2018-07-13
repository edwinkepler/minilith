<?php
ob_start();
session_start();

$_SESSION['csrf'] = md5(time());

if (isset($_SESSION['username']) && isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    exit;
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
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"/>
    <link rel="stylesheet" href="assets/css/login.css"/>
</head>
<body>
    <div class="background"></div>
    <div class="columns is-mobile">
        <div class="column is-4 is-offset-4">
            <form class="login-form" action="includes/login/login.read.php" method="POST">
                <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf'] ?>">
                <div class="field">
                    <label class="label">E-mail</label>
                    <div class="control">
                        <input class="input" type="email" name="email" placeholder="E-mail" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Password</label>
                    <div class="control">
                        <input class="input" type="password" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="control">
                    <input class="button is-primary" type="submit" name="submit" value="Login">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
