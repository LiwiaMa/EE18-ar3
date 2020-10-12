<?php

/**
 * Utveckla webbappen i uppgift 1 till ett enkelt gästboksskript. Skapa en sida kallad "Lägg till gästbok", där användaren får fylla i namn, e-post-adress och meddelande. När användaren skickar i väg formuläret ska informationen sparas snyggt formaterad i en fil. Snyggt formaterad innebär att du har mellanrum mellan namnet och e-post-adressen, och ny rad (<br>) innan du skriver meddelandet, och dessutom ny rad (<br>) efter själva meddelandet. Obs! Använd append (a) som filöppningsmetod, ej write (w), eftersom du då skriver över tidigare innehåll! Längst ned på varje sida ska en rubrik med texten "Skrivet i gästboken" samt filinnehållet visas.
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
        <h1>Spara i gästboken</h1>
        <form action="#" method="POST">
            <label for="namn">Ange ditt namn</label>
            <input type="namn" name="namn">
            <label for="email">Ange din mail</label>
            <input type="email" name="email">
            <label for="meddelande">Ange ditt meddelande</label>
            <textarea name="meddelande" id="meddelande" cols="30" rows="10"></textarea>
            <button type="submit" class="btn btn-primary">Skicka</button>
        </form>

        <?php

        // Finns data?
        if (isset($_POST["namn"], $_POST["email"], $_POST["meddelande"])) {

            // Läs in texten från formuläret
            $namn = $_POST["namn"];
            $email = $_POST["email"];
            $meddelande = $_POST["meddelande"];

            // Spara texten i en textfil
            //Öppna textfilen för att skriva
            $handtag = fopen("gastbok.txt", "a"); // a = append

            // Skriv i filen
            fwrite($handtag, "$namn $email <br>\n");
            
            //Spara meddelande + <br> pen en rad till
            fwrite($handtag, "$meddelande <br>\n");

            // Stäng textfilen
            fclose($handtag);

        }
        
     
        ?>
    </div>

</body>
</html>