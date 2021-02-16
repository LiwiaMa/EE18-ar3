
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

* UPPGIFT 3
*Gör ett formulär där användaren ska fylla i en text. 
*Konstruera ett reguljärt uttryck som ska kontrollera adresser som ska föras in i en databas. Adresserna får endast bestå av små och stora bokstäver, punkt, siffror och mellanslag. Använd preg-match-all().
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
                <textarea name="text" cols="30" rows="10"></textarea>
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

            // preg_match_all hittar alla träffar. + betyder åtminstånne ett tecken
            if (preg_match_all("/[a-zåäö0-9 .]+/i", $text, $träffar)) {
                echo "<p>&#10003; Några träffar</p>";
                var_dump($träffar);

                // Skriv ut arrayen som en punktlista
                echo "<ol>";
                foreach ($träffar[0] as $träff) {
                    echo "<li> $träff</li>";
                }
                echo "</ol>";
            } else {
                echo "<p>&#10005; Inga träffar</p>";
            } 

        }
        ?>
    </div>
</body>
</html>