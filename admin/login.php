<?php
    ob_start();
    session_start();
    $_SESSION["csrf"] = md5(time());

    if(isset($_SESSION["username"]) && isset($_SESSION["logged_in"])) {
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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="background"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4 offset-md-4">
                <form class="login-form" action="includes/login/read.php" method="POST">
                    <input type="hidden" name="csrf" value="<?php echo $_SESSION["csrf"] ?>">
                    <div class="form-group">
                        <label for="email">Name</label>
                        <input class="form-control" type="email" name="email" placeholder="E-mail" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Name</label>
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <input class="btn btn-primary" type="submit" name="submit" value="Login">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
