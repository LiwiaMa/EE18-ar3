<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Skolans salar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Skolans salar</h1>
        <?php

        // Textfilen som skall läsas in
        $tsvfil = "salar.tsv";
        
        // Är filens läsbar?
        if (is_readable($tsvfil)) {
            echo "<p>Filen är läsbar</p>";
        
            // Läs in filens alla rader
            $rader = file($tsvfil);
            
            // Loopa igenom alla rader
            foreach ($rader as $rad ) {
                // Skippa första raden som innehåller om de två första tecknen är 'id'
                if (substr($rad, 0, 2) == "id") {
                    /* kommandon för att hoppa till nästa rad, efter id*/
                    continue;
                }
            
                // Plocka ut det som vi behöver (\t --> tecken för tab)
                $delar = explode($rad, "\t");

                
                // Dela upp raden i dess delar
                $salNrNamn = $delar[1];
                $bokbar = $delar[3];
              
        
                // Visa salar i en tabell med kolumnrubriker: nr/namn, bokbar
            }
           
            
                
               
            }
            else {
                echo "<p>Filen är inte läsbar</p>";
            }
        
        ?>
    </div>
</body>
</html>