<?php

/**
 * Skriv ett skript som tar en siffra (från formuläret i uppgift 1.4) som innehåller dagens temperatur i Celsius. Programmet ska sedan skriva ut hur många grader Fahrenheit det motsvarar enligt följande mall: "100 grader Celsius motsvarar 212 grader Fahrenheit". Formeln för omvandlingen är F = (9/5)*C + 32 där F står för grader Fahrenheit och C för grader Celsius.
 * PHP version 7
 * @category   
 * @author     Karim Ryde <karye.webb@gmail.com>
 * @license    PHP CC
 */
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Från Celsius till Farenheit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Resultat</h1>


        <?php
        // Ta emot data från formuläret
        $celsius = $_POST["temperatur"]; //Innehåller temperaturen
        $omvandla = $_POST["omvandla"]; //FC eller CF
        //Ett val måste göras
        if ($omvandla == "CF") {
            //Omvandla till Farenheit
            $farenheit = $temperatur * 9 / 5 + 32;

            // Skriv ut svaret
            echo "<p>$temperatur&deg; Celsius motsvarar $farenheit&deg; Farenheit </p>";
        } else {
            //Omvandla till Celsius
            $celsius = ($temperatur - 32) * 5 / 9;

            //Skriv ut svaret
            echo "<p>$temperatur&deg; Farenheit motsvarar $celsius&deg; Celsius</p>";
        }
        ?>
    </div>
</body>
</html>