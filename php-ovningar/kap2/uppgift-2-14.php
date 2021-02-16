<?php
/**
 * Skapa ett skript för beräkna kostnaden för att hyra bil hos en biluthyrningsfirma. 
*Startavgiften för att hyra bilen är 500:-, därefter kostar det ytterligare 5:-/km och 400:- för varje extra dag förutom den första. 
*Skriptet ska fråga hur många dagar man vill hyra bilen och hur många kilometer man vill köra.
*Skriptet ska sedan presentera den totala hyran.
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
        <h1>Beräkna kostnaden</h1>
        <form action="#" method="POST">
            <label for="lon">Ange lön 1</label>
            <input id="lon" class="form-control" type="text" name="ett">
            <label for="lon">Ange lön 2</label>
            <input id="lon" class="form-control" type="text" name="tva">
            <label for="lon">Ange lön 3</label>
            <input id="lon" class="form-control" type="text" name="tre">
            <button type="submit" class="btn btn-primary">Skicka</button>
        </form>
        <?php

        //Ta empt data som skickas
        if (isset($_POST["ett"], $_POST["tva"],  $_POST["tre"])) {
            //Ta emot data från formuläret
            $lonEtt = $_POST["ett"];
            $lonTva = $_POST["tva"];
            $lonTre = $_POST["tre"];

            $summa = $lonEtt + $lonTva + $lonTre / 3;
            
            

            echo "<p>Den totala hyran är" . round($summa) . "kr</p>";
           
         }
        ?>
    </div>
</body>
</html>