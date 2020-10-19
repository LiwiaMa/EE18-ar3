<?php

/**
 * Skapa ett skript som frågar användaren vad hen heter. Om användaren heter Stig ska programmet säga att användaren har namnsdag idag. Om användaren istället heter Abraham ska användaren få veta att hen har namnsdag imorgon, men om användaren varken heter Stig eller Abraham ska hen få veta att hen inte har namnsdag vare sig idag eller imorgon.
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
            <label for="namn">Vad heter du?</label>
            <input id="namn" class="form-control" type="text" name="namn" required>
            <button type="submit" class="btn btn-primary">Skicka </button>
        </form>

        <?php

        // Finns data?
        if (isset($_POST["namn"])) {
            // Ta emot data från formuläret
            $namn = $_POST["namn"];
            $namn = strtolower($namn);

            if ($namn == "stig") {
                echo "<p>Grattis, du har namnsdag idag</p>";
            } elseif ($namn == "abraham") {
                echo "<p>Grattis, du har namnsdag imorgon </p>";
            } else {
                echo "<p>Du har inte namnsdag. Varken idag elle imorgon</p>";
            }
        }

        ?>
    </div>
</body>
</html>