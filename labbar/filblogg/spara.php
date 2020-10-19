<?php

/**
 * En enkel blogg där inlägg lagras/sparas i en textfil
 * PHP version 7
 * @category   Webbapp
 * @author     Liwia Matuszczak <liwiamatuszczak.@gmail.com>
 * @license    PHP CC
 */
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Min enkla blogg</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/solar/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="kontainer">
        <header>
            <h1>Bloggen</h1>
            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link" href="blogg.php">Alla inlägg</a></li>
                    <li class="nav-item"><a class="active nav-link" href="spara.php">Skriva inlägg</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <form action="#" method="post">
                <textarea class="form-control" name="inlagg" id="inlagg" cols="30" rows="10"></textarea>
                <button class="btn btn-success">Spara inlägg</button>
            </form>
            <footer>
                2020
            </footer>

            <?php
            // Ta emot data från formuläret
            if (isset($_POST["inlagg"])) {

                // Skapa intern variabel med datat
                $texten = $_POST["inlagg"];

                // Förbered texten för HTML-utskrift
                $textenMedBr = str_replace("\n", "<br>", $texten);

                // Klockslag och dagens datum
                setlocale(LC_ALL, "sv_SE.utf8");
                $datumstämpel = strftime("%A %y %B kl %H:%M");
                // Vad heter textfilen
                $filnamn = "blogg.txt";

                // Steg 1: Öppna textfilen för att skriva
                $handtag = fopen($filnamn, "a");

                // Skriv texten 
                fwrite($handtag, "<p>$datumstämpel <br>$textenMedBr </p>\n");

                // Steg 3: Sräng ned anslutningen
                fclose($handtag);


                // Skriv ut en bekräftelse
                echo "<p class=\"alert alert-success\" role=\"alert\">Inlägget har sparats</p>";
            } else {

            }
            
            ?>
    </div>

    
</body>
</html>