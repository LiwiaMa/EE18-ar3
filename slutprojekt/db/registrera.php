<?php

/**
 * PHP version 7
 * @category   Inloggning
 * @author     Liwia Matuszczak <liwiamatuszczak.@gmail.com>
 * @license    PHP CC
 */
include "./db/conn.php";
?>

        <?php
        // Ta emot data och skydda från hot
        $fnamn = filter_input(INPUT_POST, "fnamn", FILTER_SANITIZE_STRING);
        $enamn = filter_input(INPUT_POST, "enamn", FILTER_SANITIZE_STRING);
        $mail = filter_input(INPUT_POST, "mail", FILTER_SANITIZE_STRING);
        $pass1 = filter_input(INPUT_POST, "pass1", FILTER_SANITIZE_STRING);
        $pass2 = filter_input(INPUT_POST, "pass2", FILTER_SANITIZE_STRING);

        // Kontrollera om data finns
        if ($fnamn && $enamn && $mail && $pass1 && $pass2) {

            // @TODO kontrollera att användarnamnet inte redan finns!
            $sql = "SELECT * FROM 'logIn' WHERE mail = '$mail'";
            $result = $conn->query($sql);

            // Om användarnamnet  finns går vidare skriv ut en varning
            if ($result->num_rows != 0) {
                echo "<p class=\"alert alert-warning\">Användarnamnet finns redan, försök igen</p>";
            } else {
                // Kontrollera om lösenordet matchar
                if ($pass1 == $pass2) {

                    //Räkna ut hash på lösenordet
                    $hash = password_hash($pass1, PASSWORD_DEFAULT);

                    $sql = "INSERT INTO user ( fnamn, enamn, mail, hash) VALUES ('$fnamn', '$enamn', '$mail', '$hash')";

                    // Kör sql satsen
                    $conn->query($sql);
                    echo "<p class=\"alert alert-success\">Användaren registrerad</p>";

                    // Stäng ned anslutningen
                    $conn->close();
                } else {
                    echo "<p class=\"alert alert-warning\">Lösenorden matchar inte, försök igen</p>";
                }
            }
        }
        ?>
</body>
</html>