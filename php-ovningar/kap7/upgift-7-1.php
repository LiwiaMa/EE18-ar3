
<?php
/** \ generellt escape-tecken 
 * \n matchar ny rad-tecken – newline 
 * \t matchar tabb-tecken 
 * \d siffra - samma sak som [0-9] 
 * \D inte siffra - samma sak som [^0-9] 
 * \s matchar mellanrumstecken - mellanslag, ny rad, tabb, formfeed, return 
 * \S matchar allt utom mellanrumstecken 
 * ^ matchar från början av sträng (eller början av rad med växeln /m ) 
 * \A matchar från början av sträng (oberoende av växeln /m ) 
 * $ matchar till slutet av sträng (eller slutet av rad med växeln /m ) 
 * \Z matchar till slutet av sträng (oberoende av växeln /m ) 
 * . matchar vilket tecken som helst för utom ny rad-tecken ( \n ) 
 * [a-z] teckenföljd 
 * | logiskt "eller" 
 * (x) delmönster 
 * ? matchar 0 eller 1 av föregående mönster
* matchar 0 eller fler av föregående mönster  
* matchar 1 eller fler av föregående mönster 
*{x,y} matchar mellan x och y gånger av föregående mönster

* UPPGIFT 1
*Gör ett formulär där användaren ska fylla i en text. 
*Kontrollera med ett reguljärt uttryck att texten innehåller ett "t" följt av ett eller två "o", dvs "to" eller "too". Endast små bokstäver ska matchas.
*Prova med Unicode tecknet '✓' och '✕'.
* PHP version 7
* @category   
* @author     Liwia Matuszczak <liwiamatuszczak.@gmail.com>
* @license    PHP CC
*/
?><!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Regex</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Hitta match med regex</h1>
        <form action="#" method="POST">
            <label>Ange text
                <input type="text" name="text" required>
            </label>
            <button>Skicka</button>
        </form>
        <?php
        /* Ta emot data som skickas */
        $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING);

        if ($text) {
            echo "<h3>Inmattat</h3>";
            echo "<p>Text: <em>'$text'</em></p>";

            echo "<h3>Resultat</h3>";

            // Matcha to eller too
            if (preg_match("/to|too/", $text)) {
                echo "<p>&#10003; Innehåller antingen to eller too.</p>";
            } else {
                echo "<p>&#10005; Innehåller INTE to eller too.</p>";
            } 

        }
        ?>
    </div>
</body>
</html>