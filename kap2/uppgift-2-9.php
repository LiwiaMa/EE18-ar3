<?php
/**
 * Skapa ett skript som frågar användaren vilket årtal det är.
 *Skriptet ska sedan berätta hur många år det är kvar till år 2100.
* PHP version 7
* @category   
* @author     Liwia Matuszczak <liwiamatuszczak.@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<div class="kontainer">
        <h1>Vad är det för årtal?</h1>
        <form action="#" method="POST">
            <label for="ar">År</label>
            <input id="ar" class="form-control" type="text" name="ar">
            <button type="submit" class="btn btn-primary">Skicka</button>
        </form>
        <?php

        //Ta empt data som skickas
        if (isset($_POST["ar"])) {
            //Ta emot data från formuläret
            $ar = $_POST["ar"];

            $framtidaAr = 2100 - $ar;

            echo "<p>2100 är om $framtidaAr år</p>";
            }
        ?>
    </div>
</body>
</html>