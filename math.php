<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Quiz</title>
</head>
<body>
    <h1>Math Quiz</h1>
    <h2>Settings</h2>
    <form action="math.php" method="POST">
        <fieldset>
            <legend>Level</legend>
            <label>
                <input type="radio" name="level" value="1-10" required>
                Level 1 (1-10)
            </label>
            <br>
            <label>
                <input type="radio" name="level" value="11-100">
                Level 2 (11-100)
            </label>
            <br>
            <label>
                <input type="radio" name="level" value="custom">
                Custom Level
                <input type="number" id="num1" name="num1" placeholder="Min">
                -
                <input type="number" id="num2" name="num2" placeholder="Max">
            </label>
        </fieldset>
        <fieldset>
            <legend>Operation</legend>
            <label>
                <input type="radio" name="operator" value="add" required>
                Addition
            </label>
            <br>
            <label>
                <input type="radio" name="operator" value="subtract">
                Subtraction
            </label>
            <br>
            <label>
                <input type="radio" name="operator" value="multiply">
                Multiplication
            </label>
        </fieldset>
        <br>
        <label for="numitem">Number of items:</label>
        <input type="number" id="numitem" name="numitem" required>
        <br><br>
        <label for="max">Max Difference of choices from the correct answer:</label>
        <input type="number" id="max" name="maxnum" required>
        <br><br>
        <button type="submit">Start Quiz</button>
        <button type="button" onclick="window.close();">Close</button>
    </form>
</body>
</html>