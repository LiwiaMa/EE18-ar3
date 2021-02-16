<?php

/**
 * Skapa en webbapp med ett formulär där användaren kan mata in 5 st namn. Kalla textrutorna för namn[]. Sortera sedan namnen och skriv ut dem i bokstavsordning, ett på varje rad.
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
    <title>Namn</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Array med namn</h1>
        <form action="#" method="POST">
            <label for="namn">Ange namn 1</label>
            <input id="namn" class="form-control" type="text" name="namn[]">

            <label for="epost">Ange namn 2</label>
            <input id="epost" class="form-control" type="text" name="namn[]">

            <label for="epost">Ange namn 3</label>
            <input id="epost" class="form-control" type="text" name="namn[]">

            <label for="epost">Ange namn 4</label>
            <input id="epost" class="form-control" type="text" name="namn[]">

            <label for="epost">Ange namn 5</label>
            <input id="epost" class="form-control" type="text" name="namn[]">

            <button type="submit" class="btn btn-primary">Skicka</button>
        </form>

        <?php

            // Finns data?
            if (isset($_POST["namn"])) {
                //Ta emot data från formuläret
               $namn = $_POST["namn"];

               // För att debugga, är vi vill veta vad det innehåller
               var_dump($namn);

               // Sortera i alfabetisk ordning
               sort($namn);

               // Skriv ut alla namn, en per rad
               foreach ($namn as $namnet) {
                   echo "<p>$namnet</p>";           
               }
            }
        ?>
    </div>

</body>
</html>