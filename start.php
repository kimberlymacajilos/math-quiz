<?php
session_start();

if (!isset($_SESSION['level']) || !isset($_SESSION['operator']) || !isset($_SESSION['numitems']) || !isset($_SESSION['maxnums'])) {
    header("Location: math.php");
    exit();
}

if (!isset($_SESSION['currentquestion'])) {
    $_SESSION['currentquestion'] = 1;
    $_SESSION['correct'] = 0;
    $_SESSION['wrong'] = 0;
}

$level = $_SESSION['level'];
$operator = $_SESSION['operator'];
$numitems = $_SESSION['numitems'];
$maxnum = $_SESSION['maxnums'];

if ($level === "1-10") {
    $min = 1;
    $max = 10;
} 
elseif ($level === "11-100") {
    $min = 11;
    $max = 100;
} 
else {
    $min = $_SESSION['customin'];
    $max = $_SESSION['customax'];
}

switch ($operator) {
    case 'add':
        $correctans = $num1 + $num2;
        $symbol = '+';
        break;
    case 'subtract':
        $correctans = $num1 - $num2;
        $symbol = '-';
        break;
    case 'multiply':
        $correctans = $num1 * $num2;
        $symbol = '*';
        break;
    default:
        $correctans = 0;
        $symbol = '?';
}

$choices = [$correctans];
while (count($choices) < 4) {
    $choice = $correctans + rand(-$maxnum, $maxnum);
    if (!in_array($choice, $choices) && $choice >= 0) {
        $choices[] = $choice;
    }
}
shuffle($choices);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['answer']) && isset($_POST['correctanswer'])) {
        if (intval($_POST['answer']) === intval($_POST['correctanswer'])) {
            $_SESSION['correct']++;
        } 
        else {
            $_SESSION['wrong']++;
        }
    }

    $_SESSION['currentquestion']++;
    if ($_SESSION['currentquestion'] > $numitems) {
        header("Location: end.php");
        exit();
    }
}

?>