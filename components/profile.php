<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="header/style.css">
    <link rel="stylesheet" href="profile.css">
</head>
<body>
<?php
include ("header/header.php");
?>
<div class="main-container">
    <h3>Добро пожаловать!<br>Приступим к поиску идеального соседа</h3>
    <form action="registerRun.php" name="register-form" id="register-form">
        <div class="form-block">
            <label for="family">Фамилия:<input type="text" name="family"></label>
        </div>
        <div class="form-block">
            <label for="name">Имя:<input type="text" name="name"></label>
        </div>
        <div class="form-block">
            <label for="fathername">Отчество:<input type="text" name="fathername"></label>
        </div>

        <div class="gender-block">
            <input type="radio" name="gender" value="1" id="1">
            <label for="1">М</label>
            <input type="radio" name="gender" value="2" id="2">
            <label for="2">М</label>
        </div>
        <div class="date-block">
            <label for="born-date">Дата рождения:<input type="date" name="born-date"></label>
        </div>

        <div class="gender-block">
            <input type="radio" name="status" value="1" id="1">
            <label for="1">Студент</label>
            <input type="radio" name="status" value="2" id="2">
            <label for="2">Абитуриент</label>
        </div>

        <div class="form-block">
            <label for="email">E-mail:<input type="email" name="email"></label>
        </div>
        <div class="form-block">
            <label for="phone">Номер телефона:<input type="text" name="phone"></label>
        </div>

        <input type="submit">


    </form>
</div>
</body>
</html>