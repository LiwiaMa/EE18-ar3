<?php

/**
 * Gör en webbapplikation som tar den inmatade texten ur ett formulärs "textarea" och sparar den i en fil.
 * PHP version 7
 * @category   
 * @author     Liwia Matuszczak <liwiamatuszczak.webb@gmail.com>
 * @license    PHP CC
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>webbapplikation</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Från text till fil</h1>
        <form action="#" method="POST">
            <label for="namn">Ange din text</label>
            <textarea name="texten" id="text"></textarea>
            <button type="submit" class="btn btn-primary">Skicka</button>
        </form>

        <?php

        // Finns data?
        if (isset($_POST["texten"])) {

            // Läs in texten från formuläret
            $texten = $_POST["texten"];

            // Spara texten i en textfil
            //Öppna textfilen för att skriva
            $fil = fopen("gastbok.txt", "w");

            // Skriv i filen
            fwrite($fil, $texten);

            // Stäng textfilen
            fclose($fil);

        }
        
     
        ?>
    </div>

</body>
</html>