<?php
session_start();

$numitems = $_SESSION['numitems'];
$correct = $_SESSION['correct'];
$grade = ($correct / $numitems) * 50 + 50;

session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
</head>
<body>
    <h1>Quiz Completed</h1>
    <p>Your Grade: <?php echo $grade; ?></p>
    <form action="math.php">
        <button type="submit">Take Quiz Again</button>
    </form>
</body>
</html>