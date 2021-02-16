<?php

/**
 * Utöka programmet i uppgift 3 så att användaren matar in två siffror, lägger ihop dem och presenterar resultatet i bokstavsform. (Ex: fyra plus tre blir sju.)

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
        <h1>Tal till text</h1>
        <form action="#" method="POST">
            <label for="namn">Ange första talet</label>
            <input id="namn" class="form-control" type="text" name="tal1">
            <label for="namn">Ange andra talet</label>
            <input id="namn" class="form-control" type="text" name="tal2">

            <button type="submit" class="btn btn-primary">Räkna</button>
        </form>

        <?php

        // Finns data?
        if (isset($_POST["tal1"], $_POST["tal2"])) {
            //Ta emot data från formuläret
            $tal1 = $_POST["tal1"];
            $tal2 = $_POST["tal2"];

            $resultat = $tal1 + $tal2;

            // Man behver en array
            $siffror = ["Noll", "Ett", "Två", "Tre", "Fyra", "Fem", "Sex", "Sju", "Åtta", "Nio", "Tio", "Elva", "Tolv", "Tretton", "Fjorton", "Femton", "Sexton", "Sjutton", "Årton"];

            // Skriv ut svaret som siffror (10, 11, 12, 13...)
            if ($resultat < 18) {

                // Skriv ut svaret som text (Noll... Nio)
                echo "<p>$siffror[$tal1] plus $siffror[$tal2] blir $siffror[$resultat]</p>";
            } else {

                // Skriv ut svaret som text (Noll... Nio)
                echo "<p>$resultat</p>";
            }
        }


        ?>
    </div>

</body>
</html>