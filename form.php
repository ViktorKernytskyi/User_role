<?php

require_once('User.php');


if (!empty($_POST)) {

    if (empty($_POST['login'])) {
        $errors[] = 'поле login пустое';
    }
    if (empty($_POST['password'])) {
        $errors[] = 'поле password пустое';
   } //elseif (!is_numeric($_POST['password'])) {
//        $errors[] = 'поле password содержит не цифры';
//    }
    if (!empty($errors)) {
        foreach ($errors as $err) {
            echo '<strong>' . $err . '</strong><br>';
        }
    }
}
if(isset($_POST['submit'])){
    $user= User::auth($_POST['password'],$_POST['login']);
}
if(isset($_GET['action']) && $_GET['action'] === 'logout'){
    $user= new User($_SESSION['id']);
    $user->logOut();
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Авторизация</title>
    </head>
    <body>
    <div class="container">
        <div class="col-md-auto">
            <?php if(empty($_SESSION['id'])){?>
                <form action="/form.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">login</label>

                        <input placeholder="Введите свой login" name="login"<?php echo $_POST['login']; ?> type="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Пароль</label>
                        <input type="password" class="form-control" name="password" placeholder="Введите password" >

                    </div>
                    <button type="submit" class="btn btn-primary" name="submit" value="Отправь меня!">Login</button>
                </form>
            <?php } else {?>
                <form action="/form.php" method="GET">
                    <button type="submit" class="btn btn-primary" name="action" value="logout">Logout</button>
                </form>
            <?php } ?>
    </body>
    </html>


<?php include('header.php');
?>