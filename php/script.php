<?php
$time_start = microtime();
$R = round($_GET['R'], 3);
$Y = round($_GET['Y'], 3);
$X = round($_GET['X'], 3);

$R = checkDot($R);
$Y = checkDot($Y);
$X = checkDot($X);

if ((!checkNum($R)) || ($R < 1) || ($R > 4)) {
    header("Location: ../wrong.html");
    exit();
}
if ((!checkNum($Y)) || ($Y < -3) || ($Y > 5)) {
    header("Location: ../wrong.html");
    exit();
}
if ((!checkNum($X)) || ($X < -4) || ($X > 4)) {
    header("Location: ../wrong.html");
    exit();
}
session_start();
if (!isset($_SESSION['history']))
    $_SESSION['history'] = array();
$bool = "Мимо";
if (($X * $X + $Y * $Y <= $R * $R / 4) && ($Y >= 0) && ($X <= 0))
    $bool = "Есть пробитие!!!";
if ((-$R/2 <= $Y) && ($Y <= 0) && (-$R<=$X) && ($X <= 0))
    $bool = "Есть пробитие!!!";
if (($Y >= (2*$X - $R)) && ($Y<=0) && ($X >= 0))
    $bool = "Есть пробитие!!!";
$time_execute = number_format((float)(microtime() - $time_start), 6);
array_push($_SESSION['history'], array('X' => $X, 'Y' => $Y, 'R' => $R, 'time' => date('H:i:s'), 'time_execute' => ($time_execute * 1000), 'check' => $bool));

function checkNum($num)
{
    return (is_numeric(str_replace(",", ".", $num)));
}

/*function checkInt($float)
{
    return (checkNum($float) && substr_count($float, ',') === 0);
}*/

function checkDot($string) {
    if ((substr($string, -1) === '.') || (substr($string, -1) === ','))
        $string = substr($string, 0, -1);
    return $string;
}
header("Location: ./table.php");
?>
