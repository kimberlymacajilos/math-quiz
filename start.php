<?php
session_start();

if (!isset($_SESSION['level']) || !isset($_SESSION['operator']) || !isset($_SESSION['numitems']) || !isset($_SESSION['maxnums'])) {
    header("Location: math.php");
    exit();
}

?>