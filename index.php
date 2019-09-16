<?php
error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', '1');
session_start();
require_once './php/json_encode.php';

if (!isset($_SESSION['history']))
    $_SESSION['history'] = array();

$json = json_encode($_SESSION['history']);
$json = str_replace("\"", "'", $json);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width; initial-scale=1">
    <link href="css/main.css" rel="stylesheet">
    <title>Лабораторная работа №1</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/valid.js"></script>
    <script src="js/history.js"></script>
    <script src="js/area.js"></script>
</head>
<body>
<header id="header">
    <div class="header_text">
        Студент: Фролов Артём,
        вариант: 201019,
        группа: P3201<br>
    </div>
</header>
<form action="php/script.php" method="get" id="form" class="flex">
    <main id="main">
        <div class="field_in">
            <div class="message">
                Заполните поля для проверки
            </div>
            <div class="r_field">
                <div class="charR">
                    R=
                </div>
                <input class="r_input" name="R" placeholder="Введите число в интервале от 1 до 4" type="text"
                       title="Введите значение R" id="R" autocomplete="off" onpaste="return false;" maxlength="4">
            </div>
            <div class="y_field">
                <div class="charY">
                    Y=
                </div>
                <input class="y_input" name="Y" placeholder="Введите число в интервале от -3 до 5" type="text"
                       title="Введите значение Y" id="Y" autocomplete="off" onpaste="return false;" maxlength="4">
            </div>
            <div class="help_field">
                <div class="x_field">
                    <div class="charX">
                        X=
                    </div>
                    <select id="X" name="X">
                        <option value="-4" selected>-4</option>
                        <option value="-3">-3</option>
                        <option value="-2">-2</option>
                        <option value="-1">-1</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option id="helpX">Другое</option>
                    </select>
                </div>
                <div class="check">
                    <input type="submit" value="Проверить" class="check_box" id="checkBox">
                </div>
            </div>
        </div>
        <div class="img_field">
            <canvas class="canvasGraph" id="canvasGraph" height="200" width="200"></canvas>
            <canvas class="canvas" id="canvas" height="200" width="200" history="<?php echo $json; ?>"></canvas>
        </div>
        <script></script>
    </main>
</form>
<div class="orehus" id="orehus"></div>
<div class="fruits shake" id="fruits"></div>
<div class="achievement" id="achievement"></div>
</body>
</html>