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
    <div class="head-row">
    <img class="avatar" src="../img/ava.svg" alt="">
    <div class="profile-info">
        <b>Иванов Иван Иванович</b>
        <i>ред.</i>
        <p>19.02.1994</p>
        <p>Юго-западный государственный университет</p>
        <p>Общежитие №9</p>
        <p>Студент, 5 курс</p>
        <p>Телефон: +79207179644</p>
    </div>
    </div>
    <h3>Мои качества</h3>
    <form action="updateCharacterisric.php" name="characteristic" method="post">
        <div class="form-block">
            <b>1. Время сна:</b>  ложусь в
            <input type="time" name="firstTime">
            , встаю в
            <input type="time" name="secondTime"> ;
        </div>
        <div class="form-block">
            <b>2. Чистоплотность (количество принятий душа в неделю): </b>
            <input type="range" name="washing" min="1" max="14"
                   onchange="document.getElementById('washingRangeValue').innerHTML = this.value;">
            <span id="washingRangeValue">10</span>
        </div>
        <div class="form-block">
            <b>3. Общая аккуратность: </b>
            <input type="range" name="accur" min="1" max="14"
                   onchange="document.getElementById('accurRangeValue').innerHTML = this.value;">
            <span id="accurRangeValue">10</span>
        </div>
        <div class="form-block">
            <b>4. Готовность к совместному приготовлению пищи: </b>
            <input type="range" name="eat" min="1" max="10"
                   onchange="document.getElementById('eatRangeValue').innerHTML = this.value;">
            <span id="eatRangeValue">10</span>
        </div>
        <div class="form-block">
            <b>5. Особенности питания:  </b>
            <div class="styled-select">
                <select name="eat-special" id="eat-special">
                    <option value="1">Отсутствуют</option>
                    <option value="2">Вегетарианец</option>
                    <option value="3">Веган</option>
                    <option value="4">Сыроед</option>
                </select>
            </div>
        </div>
        <div class="form-block">
            <b>6. Уровень общительности: </b>
            <input type="range" name="communication" min="1" max="10"
                   onchange="document.getElementById('communicationRangeValue').innerHTML = this.value;">
            <span id="communicationRangeValue">10</span>
        </div>
        <div class="form-block">
            <b>7. Темперамент:  </b>
            <div class="styled-select">
                <select name="temperement" id="temperement">
                    <option value="1">Сангвиник</option>
                    <option value="2">Флегматик</option>
                    <option value="3">Меланхолик</option>
                    <option value="4">Холерик</option>
                </select>
            </div>
        </div>
        <div class="form-block">
            <b>8. Отношение к учебе: </b>
            <input type="range" name="learning" min="1" max="10"
                   onchange="document.getElementById('learningRangeValue').innerHTML = this.value;">
            <span id="learningRangeValue">10</span>
        </div>
        <div class="form-block">
            <b>9. Ответственность: </b>
            <input type="range" name="respens" min="1" max="10"
                   onchange="document.getElementById('respensRangeValue').innerHTML = this.value;">
            <span id="respensRangeValue">10</span>
        </div>
        <div class="form-block">
            <input type="submit" value="Изменить">
        </div>
    </form>
</div>

</body>
</html>