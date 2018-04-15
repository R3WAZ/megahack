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
include("header/header.php");
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

$getDown = $_POST['firstTime'];
$getUP = $_POST['secondTime'];
$clearing = $_POST['washing'];
$poryadok = $_POST['accur'];
$cooking = $_POST['eat'];
$racion = $_POST['eat-special'];
$sociality = $_POST['communication'];
$temperament = $_POST['temperement'];
$teaching = $_POST['learning'];
$responsibility = $_POST['respens'];

$sql = "INSERT INTO Personality (firstTime, secondTime, washing, accur, eat, eat-special, communication, temperement, learning, respens)
VALUES ('$getDown', '$getUP', '$clearing', '$poryadok', '$cooking', '$racion', '$sociality', '$temperament', '$teaching', '$responsibility')";
$result = $conn->query($sql);
$conn->close();

?>
<br>
<br>
<br>
<br>
<h1 align="center">Поздравляю, вы зарегистрированны!</h1>
</body>
</html>
