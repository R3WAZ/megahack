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
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM Personality WHERE idPersonality=30";
$result = mysqli_query($conn, $query);
$personality = mysqli_fetch_array($result);

$query2 = "SELECT * FROM User WHERE idUser=30";
$result2 = mysqli_query($conn, $query2);
$userinfo = mysqli_fetch_array($result2);


?>

<div class="main-container">

    <div class="head-row">
    <img class="avatar" src="../img/ava.svg" alt="">
    <div class="profile-info">
        <b><?php
            echo $userinfo['lastName'];
            echo " ";
            echo $userinfo['firstName'];
            echo " ";
            echo $userinfo['patronymic'];
            ?></b>
        <i>ред.</i>
        <p><?php  echo $userinfo['data'] ?></p>
        <p>Юго-западный государственный университет</p>
        <p>Общежитие №9</p>
        <p>Студент, 5 курс</p>
        <p>Телефон: <?php  echo $userinfo['phone'] ?></p>
    </div>
    </div>
    <h3>Мои качества</h3>
    <form action="profileRUN.php" name="characteristic" method="post">
        <div class="form-block">
            <b>1. Время сна:</b>  ложусь в
            <input type="time" name="firstTime"
                   value="<?php echo $personality['getDown'] ?>">
            , встаю в
            <input type="time" name="secondTime"
            value="<?php echo $personality['getUP'] ?>"> ;
        </div>
        <div class="form-block">
            <b>2. Чистоплотность (количество принятий душа в неделю): </b>
            <input type="range" name="washing" min="1" max="14"
                   onchange="document.getElementById('washingRangeValue').innerHTML = this.value;"
            value="<?php echo $personality['clearing'] ?>">
            <span id="washingRangeValue"><?php echo $personality['clearing'] ?></span>
        </div>
        <div class="form-block">
            <b>3. Общая аккуратность: </b>
            <input type="range" name="accur" min="1" max="10"
                   onchange="document.getElementById('accurRangeValue').innerHTML = this.value;"
                    value="<?php echo $personality['poryadok'] ?>">
            <span id="accurRangeValue"><?php echo $personality['poryadok'] ?></span>
        </div>
        <div class="form-block">
            <b>4. Готовность к совместному приготовлению пищи: </b>
            <input type="range" name="eat" min="1" max="10"
                   onchange="document.getElementById('eatRangeValue').innerHTML = this.value;"
            value="<?php echo $personality['cooking'] ?>">
            <span id="eatRangeValue"><?php echo $personality['cooking'] ?></span>
        </div>
        <div class="form-block">
            <b>5. Особенности питания:  </b>
            <div class="styled-select">
                <select name="eat-special" id="eat-special">
                    <option value="1" <?php if($personality['racion']==1) echo "selected"?> >Отсутствуют</option>
                    <option value="2" <?php if($personality['racion']==2) echo "selected"?> >Вегетарианец</option>
                    <option value="3" <?php if($personality['racion']==3) echo "selected"?> >Веган</option>
                    <option value="4" <?php if($personality['racion']==4) echo "selected"?> >Сыроед</option>
                </select>
            </div>
        </div>
        <div class="form-block">
            <b>6. Уровень общительности: </b>
            <input type="range" name="communication" min="1" max="10"
                   onchange="document.getElementById('communicationRangeValue').innerHTML = this.value;"
            value="<?php echo $personality['sociality'] ?>">
            <span id="communicationRangeValue"><?php echo $personality['sociality'] ?></span>
        </div>
        <div class="form-block">
            <b>7. Темперамент:  </b>
            <div class="styled-select">
                <select name="temperement" id="temperement">
                    <option value="1" <?php if($personality['temperament']==1) echo "selected"?>>Сангвиник</option>
                    <option value="2" <?php if($personality['temperament']==2) echo "selected"?>>Флегматик</option>
                    <option value="3" <?php if($personality['temperament']==3) echo "selected"?>>Меланхолик</option>
                    <option value="4" <?php if($personality['temperament']==4) echo "selected"?>>Холерик</option>
                </select>
            </div>
        </div>
        <div class="form-block">
            <b>8. Отношение к учебе: </b>
            <input type="range" name="learning" min="1" max="10"
                   onchange="document.getElementById('learningRangeValue').innerHTML = this.value;"
            value="<?php echo $personality['teaching'] ?>">
            <span id="learningRangeValue"><?php echo $personality['teaching'] ?></span>
        </div>
        <div class="form-block">
            <b>9. Ответственность: </b>
            <input type="range" name="respens" min="1" max="10"
                   onchange="document.getElementById('respensRangeValue').innerHTML = this.value;"
            value="<?php echo $personality['responsibility'] ?>">
            <span id="respensRangeValue"><?php echo $personality['responsibility'] ?></span>
        </div>
        <div class="form-block">
            <input type="submit" value="Изменить">
        </div>
    </form>
</div>

</body>
</html>