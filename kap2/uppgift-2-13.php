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
            <label for="dagar">Ange hur många dagar du vill hyra bilen</label>
            <input id="dagar" class="form-control" type="text" name="dagar">
            <label for="kilometer">Ange hur många kilometer man vill köra</label>
            <input id="kilometer" class="form-control" type="text" name="kilometer">
            <button type="submit" class="btn btn-primary">Skicka</button>
        </form>
        <?php

        //Ta empt data som skickas
        if (isset($_POST["dagar"], $_POST["kilometer"])) {
            //Ta emot data från formuläret
            $dagar = $_POST["dagar"];
            $kilometer = $_POST["kilometer"];
            
            $merDagar = $dagar * 400;
            $merKilometer = $kilometer * 5;
            $totalt = $merDagar + $merKilometer;

            echo "<p>Den totala hyran är $totalt kr</p>";
           
            

         }
        ?>
    </div>
</body>
</html>