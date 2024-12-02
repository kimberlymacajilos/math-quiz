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

?>