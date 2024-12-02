<?php
session_start();

$numitems = $_SESSION['numitems'];
$correct = $_SESSION['correct'];
$grade = ($correct / $numitems) * 50 + 50;

session_destroy();
?>