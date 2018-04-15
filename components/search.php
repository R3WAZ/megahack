<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="header/style.css">
    <link rel="stylesheet" href="search.css">
    <!--<link rel="stylesheet" href="../css/bootstrap.min.css">-->
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
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM Personality WHERE idPersonality=30";
$result = mysqli_query($conn, $query);
$myPersonality = mysqli_fetch_array($result);
$firstStudent=-1;
$firstPoints=999;
$secondStudent=-1;
$secondPoints=999;
$threeStudent=-1;
$threePoints=999;

$query = "SELECT * FROM Personality";
$result = mysqli_query($conn, $query);

?>

<div class="main-container">
    <?php
    while($friendRow = mysqli_fetch_array($result))
    {
        $id = $friendRow['idPersonality'];
        $query2 = "SELECT * FROM User WHERE iduser=$id";
        $res2 = mysqli_query($conn, $query2);
        $row = mysqli_fetch_array($res2);

        if ($friendRow['idPersonality']!=30&&$row['sex']==1) {
            $currentPoints = 0;
            $currentPoints += abs($myPersonality['clearing'] - $friendRow['clearing']);
            $currentPoints += abs($myPersonality['poryadok'] - $friendRow['poryadok']);
            $currentPoints += abs($myPersonality['cooking'] - $friendRow['cooking']);
            $currentPoints += abs($myPersonality['sociality'] - $friendRow['sociality']);
            $currentPoints += abs($myPersonality['teaching'] - $friendRow['teaching']);
            $currentPoints += abs($myPersonality['responsibility'] - $friendRow['responsibility']);

            if ($myPersonality['racion'] == 1) {
                if ($friendRow['racion'] == 2 || $friendRow['racion'] == 3)
                    $currentPoints += 10;
            }
            if ($myPersonality['racion'] == 2) {
                if ($friendRow['racion'] == 1)
                    $currentPoints += 10;
                if ($friendRow['racion'] == 3)
                    $currentPoints += 5;
                if ($friendRow['racion'] == 4)
                    $currentPoints += 5;
            }
            if ($myPersonality['racion'] == 3) {
                if ($friendRow['racion'] == 2 || $friendRow['racion'] == 4)
                    $currentPoints += 5;
                if ($friendRow['racion'] == 1)
                    $currentPoints += 10;
            }
            if ($myPersonality['racion'] == 4) {
                if ($friendRow['racion'] == 2 || $friendRow['racion'] == 3)
                    $currentPoints += 5;
            }

            if ($myPersonality['temperament'] == 1) {
                if ($friendRow['temperament'] == 3 || $friendRow['temperament'] == 4)
                    $currentPoints += 10;
                if ($friendRow['temperament'] == 4)
                    $currentPoints += 20;
            }
            if ($myPersonality['temperament'] == 2) {
                if ($friendRow['temperament'] == 4)
                    $currentPoints += 10;
                if ($friendRow['temperament'] == 1)
                    $currentPoints += 20;
            }
            if ($myPersonality['temperament'] == 3) {
                if ($friendRow['temperament'] == 2 || $friendRow['temperament'] == 4)
                    $currentPoints += 10;
                if ($friendRow['temperament'] == 3)
                    $currentPoints += 20;
            }
            if ($myPersonality['temperament'] == 4) {
                if ($friendRow['temperament'] == 1 || $friendRow['temperament'] == 3)
                    $currentPoints += 10;
                if ($friendRow['temperament'] == 2)
                    $currentPoints += 20;
            }
            /*echo $currentPoints;*/
            if ($currentPoints < $threePoints) {
                if ($currentPoints < $secondPoints) {
                    if ($currentPoints < $firstPoints) {
                        $threePoints = $secondPoints;
                        $threeStudent = $secondStudent;
                        $secondPoints = $firstPoints;
                        $secondStudent = $firstStudent;
                        $firstPoints = $currentPoints;
                        $firstStudent = $friendRow['idPersonality'];
                    } else {
                        $threePoints = $secondPoints;
                        $threeStudent = $secondStudent;
                        $secondPoints = $currentPoints;
                        $secondStudent = $friendRow['idPersonality'];

                    }
                } else {
                    $threePoints = $currentPoints;
                    $threeStudent = $friendRow['idPersonality'];
                }
            }
        }
    }/*
    echo $firstPoints;
    echo $secondPoints;
    echo $threePoints;*/

    $query = "SELECT * FROM User WHERE iduser=$firstStudent";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    ?>
    <h2>Поиск завершен!<br>Ваши потенциальные соседи:</h2>
    <div class="pre-card" >
        <?php
            $query = "SELECT * FROM User WHERE iduser=$firstStudent";
            $result = mysqli_query($conn, $query);
            $userinfo = mysqli_fetch_array($result);
        ?>
        <div class="user-card">
            <img src="../img/ava.svg" alt="">
            <h3><?php
                echo $userinfo['lastName'];
                echo " ";
                echo $userinfo['firstName'];
                echo " ";
                echo $userinfo['patronymic'];
                ?></h3>
            <p>E-mail: <?php echo $userinfo['email'] ?></p>
            <p>Телефон: <?php echo $userinfo['phone'] ?> </p>
        </div>
    </div>
    <div class="pre-card" >
        <?php
        $query = "SELECT * FROM User WHERE iduser=$secondStudent";
        $result = mysqli_query($conn, $query);
        $userinfo = mysqli_fetch_array($result);
        ?>
        <div class="user-card">
            <img src="../img/ava.svg" alt="">
            <h3><?php
                echo $userinfo['lastName'];
                echo " ";
                echo $userinfo['firstName'];
                echo " ";
                echo $userinfo['patronymic'];
                ?></h3>
            <p>E-mail: <?php echo $userinfo['email'] ?></p>
            <p>Телефон: <?php echo $userinfo['phone'] ?> </p>
        </div>
    </div>
    <div class="pre-card" >
        <?php
        $query = "SELECT * FROM User WHERE iduser=$threeStudent";
        $result = mysqli_query($conn, $query);
        $userinfo = mysqli_fetch_array($result);
        ?>
        <div class="user-card">
            <img src="../img/ava.svg" alt="">
            <h3><?php
                echo $userinfo['lastName'];
                echo " ";
                echo $userinfo['firstName'];
                echo " ";
                echo $userinfo['patronymic'];
                ?></h3>
            <p>E-mail: <?php echo $userinfo['email'] ?></p>
            <p>Телефон: <?php echo $userinfo['phone'] ?> </p>
        </div>
    </div>
    <button onclick="window.location='../index.php'">Вернуться на главную</button>
</div>

</body>
</html>