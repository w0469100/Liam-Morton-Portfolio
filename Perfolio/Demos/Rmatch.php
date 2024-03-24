<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<form, initial-scale=1.0">
    <title>Document</title>
    <style>
        label, textarea {
            display: block;
        }
        #winner {
            color: blue;
        }
    </style>
</head>
<body>
    <h1>Strings</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div>
            <label for="tarStrings">Enter comma separated values here:</label>
            <textarea name="tarStrings" id="tarStrings" name="stringsTextarea" cols="30" rows="10">Scooby-Doo,
    Shaggy Rogers,
    Fred Jones,
    Daphne Blake,
    Velma Dinkley,
    Scrappy-Doo</textarea>
        </div>
        <input type="submit" value="Go">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $listStrings = trim($_POST["tarStrings"]);

        $arrStrings = explode(",",$listStrings);
        shuffle($arrStrings);

        echo "<h1>The Winner is...<span id='winner'>".$arrStrings[0]."</span>!</h1>";
        echo "<ol>";
        foreach ($arrStrings as $str ){
            echo "<li>".$str."</li>";
        }
        echo "</ol>";
    }
?>
</body>
</html>