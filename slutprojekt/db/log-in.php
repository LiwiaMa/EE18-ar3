<?php

/**
 * PHP version 7
 * @category   Inloggning
 * @author     Liwia Matuszczak <liwiamatuszczak.@gmail.com>
 * @license    PHP CC
 */
include "./db/conn.php";
session_start();
?>

<?php
// Ta emot data och skydda från hot
$mail = filter_input(INPUT_POST, "mail", FILTER_SANITIZE_STRING);
$pass = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_STRING);

// Kontrollera om data finns
if ($mail && $pass) {
    // Finns användaren i tabellen?
    $sql = "SELECT * FROM 'logIn' WHERE mail = '$mail'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        echo "<p class=\"alert alert-warning\">Användaren finns redan</p>";
    } else {

        // Plocka ut hashet för användaren
        $rad = $result->fetch_assoc();
        $hash = $rad['hash'];
        /* var_dump($rad);
                exit; */
        // Kontrollera lösenordet
        if (password_verify($pass, $hash)) {
            // Inloggad
            echo "<p class=\"alert alert-success\">Du är inloggad</p>";

            // Skapa en sessionsvariabel
            $_SESSION["mail"] = $mail;

            // Räkna antal
            $antal = $rad['antal'] + 1;
            //Registrera ny inloggning
            $sql = "UPDATE user SET antal = '$antal' WHERE id = $rad[id]";
            $conn->query($sql);
            // Skapa en sessionsvariabel
            $_SESSION["antal"] = $antal;
            $_SESSION["user_id"] = $rad["id"];

            // Hoppa till sidan lista
            header("Location: ./lista.php");
        } else {
            //Fel
            echo "<p class=\"alert alert-warning\">Lösenordet stämmer inte</p>";
        }
    }
}
?>
</body>
</html>