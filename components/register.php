<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="header/style.css">
    <link rel="stylesheet" href="register.css">
</head>
<body>
<?php
include ("header/header.php");
?>
<div class="main-container">
    <h3>Добро пожаловать!<br>Приступим к поиску идеального соседа</h3>
    <p>Уже зарегистрированы? <a href="auth.php">Войти</a></p>
    <form action="registerRun.php" name="register-form" id="register-form" method="post">
        <div class="form-block">
            <label for="family">*Фамилия:<input type="text" name="family"></label>
        </div>
        <div class="form-block">
            <label for="name">*Имя:<input type="text" name="name"></label>
        </div>
        <div class="form-block">
            <label for="fathername">Отчество:<input type="text" name="fathername"></label>
        </div>

        <div class="gender-block">
            <input type="radio" name="gender" value="1" id="male">
            <label for="male">М</label>
            <input type="radio" name="gender" value="2" id="female">
            <label for="female">Ж</label>
        </div>
        <div class="form-block">
            <label for="born-date">Дата рождения:<input type="date" name="born-date"></label>
        </div>

        <div class="gender-block">
            <input type="radio" name="status" value="1" id="student">
            <label for="student">Студент</label>
            <input type="radio" name="status" value="2" id="abiturient">
            <label for="abiturient">Абитуриент</label>
        </div>

        <div class="form-block">
            <label for="email">*E-mail:<input type="email" name="email"></label>
        </div>
        <div class="form-block">
            <label for="phone">Номер телефона:<input type="text" name="phone"></label>
        </div>
        <div class="form-block">
            <label for="password">*Пароль:<input type="password" name="password"></label>
        </div>
        <h3><b>* поля для заполнения обязательны</b></h3>
        <input type="submit" value="Далее">


    </form>
</div>
</body>
</html>