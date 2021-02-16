<?php
/**
 * Skapa ett skript som frågar användaren vilket hur långt hen kan hoppa mätt i meter. 
*Skriptet ska sen berätta hur mycket längre världsrekordet är (8,90 meter): "Bob Beamon hopar ... m längre än dig!".
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
        <h1>Hur långt kan du hoppa? svara i meter</h1>
        <form action="#" method="POST">
            <label for="meter">Ange längden</label>
            <input id="meter" class="form-control" type="text" name="meter">
            <button type="submit" class="btn btn-primary">Skicka</button>
        </form>
        <?php

        //Ta empt data som skickas
        if (isset($_POST["meter"])) {
            //Ta emot data från formuläret
            $meter = $_POST["meter"];
            

            if ($meter > 8.90 ) {
                $svar = $meter - 8.90;
                echo "<p>Bob hoppar $svar längre än dig</p>";
            } 
            else {
                $svar = 8.90 - $meter;
                echo "<p>Bob hoppar $svar mindre än dig</p>";
            }
            

         }
        ?>
    </div>
</body>
</html>