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
$host = '178.249.243.15'; // адрес сервера
$database = 'hack47'; // имя базы данных
$user = 'g_admin'; // имя пользователя
$password = '2314800'; // пароль

// Create connection
$conn = new mysqli($host, $user, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$family = $_POST['family'];
$name = $_POST['name'];
$fathername = $_POST['fathername'];
$borndate = $_POST['born-date'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$pass = $_POST['password'];
$stat = $_POST['status'];
$gender = $_POST['gender'];

$sql = "INSERT INTO User (firstName, lastName, patronymic, phone, sex, data, email, password, category)
VALUES ('$name', '$family', '$fathername', '$phone', '$gender', '$borndate', '$email', '$pass', '$stat')";
$result = $conn->query($sql);
$conn->close();


?>
<h1 align="center">Поздравляю, вы зарегистрированны!</h1>
</body>
</html>
