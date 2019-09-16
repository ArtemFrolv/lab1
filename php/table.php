<?php
session_start();
require_once './json_encode.php';
$json = json_encode($_SESSION['history']);
$json = str_replace("\"", "'", $json);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="../css/table.css" rel="stylesheet">
    <title>Таблица с результатами</title>
    <meta name="viewport" content="width=device-width; initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="../js/area.js"></script>
    <script src="../js/history.js"></script>
</head>
<body>
<header>
    <div class="header_text">
        Студент: Фролов Артём,
        вариант: 201019,
        группа: P3201<br>
    </div>
    <div>
        <a class="pic" href="../index.php">
            <img class="homeImg" src="../img/home.png">
        </a>
    </div>
</header>
<div class="flex">
    <main>
        <div class="canvasField">
            <canvas class="canvasGraph" id="canvasGraph" height="200" width="200"></canvas>
            <canvas class="canvas" id="canvas" height="200" width="200" history="<?php echo $json;?>"></canvas>
        </div>
        <ul class="table">
            <li class="line">
                <div class="item one">X</div>
                <div class="item two">Y</div>
                <div class="item three">R</div>
                <div class="item four">Lead<br>time<br>(ms)</div>
                <div class="item five">Current<br>time</div>
                <div class="item six">Result</div>
            </li>
            <?php
            for ($i = 0; $i < count($_SESSION['history']); $i++) {
                ?>
                <li class="line">
                <div class="item one"><?php echo($_SESSION['history'][$i]['X']) ?></div>
                <div class="item two"><?php echo($_SESSION['history'][$i]['Y']) ?></div>
                <div class="item three"><?php echo($_SESSION['history'][$i]['R']) ?></div>
                <div class="item four"><?php echo($_SESSION['history'][$i]['time_execute']) ?></div>
                <div class="item five"><?php echo($_SESSION['history'][$i]['time']) ?></div>
                <div class="item six"><?php echo($_SESSION['history'][$i]['check']) ?></div>
                </li><?php
            }
            ?>
        </ul>
    </main>
</div>
<div class="fruits shake" id="fruits">
</div>
</body>
</html>
