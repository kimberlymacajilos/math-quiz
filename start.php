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

$num1 = rand($min, $max);
$num2 = rand($min, $max);

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Quiz</title>
</head>
<body>
    <h2><?php echo "$num1 $symbol $num2 = ?"; ?></h2>
    <form method="POST">
        <input type="hidden" name="correctanswer" value="<?php echo $correctans; ?>">
        <?php foreach ($choices as $choice): ?>
            <button type="submit" name="answer" value="<?php echo $choice; ?>"><?php echo $choice; ?></button><br><br>
        <?php endforeach; ?>
    </form>
    <fieldset>
        <legend>Score</legend>
        Correct: <?php echo $_SESSION['correct']; ?><br>
        Wrong: <?php echo $_SESSION['wrong']; ?><br>
    </fieldset>
    <br>
    <form method="POST" action="end.php">
        <button type="submit" name="end">End Quiz</button>
    </form>
</body>
</html>