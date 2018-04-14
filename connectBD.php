<?php

//$host = '178.249.243.15'; // адрес сервера
//$database = 'hack47'; // имя базы данных
//$user = 'g_admin'; // имя пользователя
//$password = '2g314800'; // пароль

$host = 'localhost'; // адрес сервера
$database = 'optimum_beauty'; // имя базы данных
$user = 'root'; // имя пользователя
$password = ''; // пароль

// Create connection
$conn = new mysqli($host, $user, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>