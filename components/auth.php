<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="header/style.css">
    <link rel="stylesheet" href="auth.css">
</head>
<body>
<?php
include ("header/header.php");
?>

<div class="main-container">
    <h3>Авторизация</h3>
    <p>Перейти к <a href="register.php">регистрации</a></p>
    <form action="login.php" name="authForm" id="authForm" method="post">
        <div class="form-block">
            <label for="e-mail">E-mail:<input type="email" name="e-mail"></label>
        </div>
        <div class="form-block">
            <label for="password">Пароль:<input type="password" name="name"></label>
        </div>
        <input type="submit" value="Войти">
    </form>
</div>

</body>
</html>