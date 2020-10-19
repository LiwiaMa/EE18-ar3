<?php

/**
 * Skapa ett skript som frågar användaren vilket land som vann fotbolls-VM för damer år 2015. Om användaren svarar USA ska programmet skriva ut att svaret var rätt, annars ska programmet skriva ut att svaret var fel. Det ska inte spela någon roll om användaren skriver svaret med stora eller små bokstäver.
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
        <form action="#" method="POST">
            <label for="namn">Vilket land som vann fotbolls-VM för damer år 2015?</label>
            <input id="namn" class="form-control" type="text" name="land" required>
            <button type="submit" class="btn btn-primary">Skicka </button>
        </form>

        <?php

        // Finns data?
        if (isset($_POST["land"])) {
            // Ta emot data från formuläret
            $land = $_POST["land"];

            // Spelar ingen roll om USA är skriven med små eller stora bostäver
            $land = strtolower($land);

            if ($land == "usa") {
                echo "<p>Rätt $land var landet som vann!</p>";
            } else {
                echo "<pDet var inte landet som vann</p>";
            }
        }

        ?>
    </div>
</body>
</html>