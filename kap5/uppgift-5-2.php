<?php

/**
 * Gör en webbapp  som i en textruta frågar efter ett filnamn på servern. Öppna filen och skriv ut filinnehållet på skärmen. 
 *(Om du kan, kontrollera före filnamnet så att det endast innehåller bokstäver, siffror och punkt.)
 * PHP version 7
 * @category   
 * @author     Liwia Matuszczak <liwiamatuszczak.@gmail.com>
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
            <label for="namn">Ange din filnamn</label>
            <input type="text" name="filnamn">
            <button type="submit" class="btn btn-primary">Läs</button>
        </form>
        <?php

        // Finns data?
        if (isset($_POST["filnamn"])) {

            // Läs in texten från formuläret
            $filnamn = $_POST["filnamn"];

            // Läs av från filen
            $handtag = fopen($filnamn, "r");
            $text = fread($handtag, filesize($filnamn));
            
            // Skriv ut på skärmen
            echo "<p>$text</p>";
            fclose($handtag);
        }


        ?>
    </div>

</body>
</html>