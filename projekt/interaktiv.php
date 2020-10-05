<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Interaktiv berättelse</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Interaktiv berättelse</h1>
        <?php
        $chatt = "";
        $fråga = 0;

        // Finns data?
        if (isset($_POST["input"], $_POST["chatt"], $_POST["fråga"])) {

            // Ta emot data från formuläret
            $input = $_POST["input"];
            $chatt = $_POST["chatt"];
            $fråga = $_POST["fråga"];

            // Frågor och svar
            $chatt .= "Du> $input\n";

            switch ($fråga) {
                    // Första fråga och svaren
                case 1:
                    if ($input == "vänster") {
                        $chatt .= "Bott> Come on mate, du öppnade dörren för hårt. Din väns mamma stod bakom den. Hon ligger nu på golvet. Hon svimmade. Vad gör du nu? Ritar du på henne en mustage? Eller hjälper du henne? \n";
                        $fråga = 2;
                    } elseif ($input == "höger") {
                        $chatt .= "Bott> Bakom dörren hörs hög musik, När du går igenom den märker du att du har kommit till en fest för clowns. De ber dig att byta om för att bli en av dem. Vad gör du? \n";
                        $fråga = 3;
                    } else {
                        $chatt .= "Bott> Jag förstod inte vad du skrev. Försök en gång till?\n";
                        $fråga = 4;
                    }
                    break;

                    // Andra frågan och svaren
                case 2:
                    if ($input == "ritar mustage") {
                        $chatt .= "Bott> Rly bro? Okay, men tbh den där mustage blev faktiskt bra... \n";
                        $fråga = 5;
                    } elseif ($input == "hjälper") {
                        $chatt .= "Bott> Bra där, du är en samvetsgrann person\n";
                        $fråga = 6;
                    }
                    break;

                case 3:
                    if ($input == "byter om") {
                        $chatt .= "Bott> Du byter om och med det identifieras du som en clown. Grattis, ditt liv har ingen menig. \n";
                        $fråga = 7;
                    } elseif ($input == "byter inte om") {
                        $chatt .= "Bott> Du vill inte byta om för att inte vara fjantig. Grattis, du är en tråkig person.\n";
                        $fråga = 8;
                    }
                    break;
            }
        } else {
            $fråga = 1;
            $chatt = "Bott> Du står framför två dörrar. Vänster och höger. Vilken väljer du?\n";
        }
        ?>
        <form action="#" method="POST">
            <textarea name="chatt" id="" cols="30" rows="10" readonly><?php echo $chatt; ?></textarea>
            <input id="input" class="form-control" type="text" name="input">
            <input type="hidden" name="fråga" value="<?php echo $fråga; ?>">
            <button type="submit" class="btn btn-primary">Skicka</button>
        </form>
    </div>
</body>
</html>