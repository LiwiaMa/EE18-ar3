<?php

/**
 * 
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <?php
        // Rensa från mellanslag i början och slutet på en text
        $epost = "liwiamatuszczak@gmail.com";
        $epostTrimmad = trim($epost);
        echo "<p>**$epost**$epostTrimmad</p>";

        // Omvandla till små eller bara stora bokstäver
        $svar = "USA"; //usa, USA, usa
        $svarGemena = strtolower($svar);
        $svarVersaler = strtoupper($svar);
        $svenska = mb_strtoupper("Hej på dig är det bra?");
        echo "<p>$svenska</p>";

        // Hur många tecken innehåller detta stycke?
        $stycke = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus temporibus harum ea dolor possimus blanditiis inventore nulla. Eius consequuntur laborum, dicta distinctio ratione nostrum provident placeat nesciunt alias cumque neque!";
        $antal = strlen($stycke);
        echo "<p>Antal tecken = $antal</p>";

        // Plocka ut en del av en sträng
        $epost = "liwiamatuszczak@gmail.com";
        $förnamn = substr($epost, 0, 5);
        echo "<p>$förnamn ur $epost</p>";
        $efternamn = substr($epost, 5, 10);
        echo "<p>$efternamn ur $epost</p>";

        $domän = substr($epost, 15, 23);
        echo "<p>$domän ur $epost</p>";
        $domän = substr($epost, -10);
        echo "<p>$domän ur $epost</p>";

        // Plocka ut domän ur en epost (strstr = sträng i sträng. Leta efter nål i höstack. i detta fall epost är det stora och nål är @)
        $epost = "liwiamatuszczak@gmail.com";
        $domän = strstr($epost, "@");
        echo "<p>$domän</p>";

        // Hitta positionen på @-tecknet
        $epost = "liwiamatuszczak@gmail.com";
        $position = strpos($epost, "@");
        echo "<p>@ ligger op position $position</p>";

        // Finns "ntig" i inmattad epost -adressen?
        if (strpos($epost, "gmail") !== false) {
            echo "<p>Ja gmail finns i epost-adressen</p>";
        } else {
            echo "<p>Nej</p>";
        }
        
        // Ersätta text i sträng
        $texten = "Domi vilar hemma";
        $nyText = str_replace("Domi", "Pepe", $texten);
        echo "<p>$nyText</p>";

        ?>
    </div>
</body>
</html>