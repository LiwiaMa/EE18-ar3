<?php

/**
 * PHP version 7
 * @category   Inloggning
 * @author     Liwia Matuszczak <liwiamatuszczak.@gmail.com>
 * @license    PHP CC
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../db/resurser/conn.php";
session_start();
?>

<?php
// Ta emot data och skydda från hot
$mail = filter_input(INPUT_POST, "mail", FILTER_SANITIZE_STRING);
$pass = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_STRING);

//var_dump($mail, $pass);

// Kontrollera om data finns
if ($mail && $pass) {
    // Finns användaren i tabellen?
    $sql = "SELECT * FROM logIn WHERE mail = '$mail'";
    //var_dump($sql);
    $result = $conn->query($sql);

    if (!$result) {
        die("Något blev fel med SQL-satsen." . $conn->error);
    } else {

        // Plocka ut hashet för användaren
        $rad = $result->fetch_assoc();
        $hash = $rad['hash'];
        //var_dump($rad);
         
        // Kontrollera lösenordet
        if (password_verify($pass, $hash)) {
            // Inloggad
            echo "<p class=\"alert alert-success\">Du är inloggad</p>";

            // Skapa en sessionsvariabel
            $_SESSION["mail"] = $mail;

            // Räkna antal
            $antal = $rad['antal'] + 1;
            //Registrera ny inloggning
            $sql = "UPDATE logIn SET antal = '$antal' WHERE id = $rad[id]";
            $conn->query($sql);
           // var_dump($sql);
            //  sessionsvariabel
            $_SESSION["antal"] = $antal;
            $_SESSION["user_id"] = $rad["id"];

            $conn->close();

            // Hoppa till menu
            header("Location: ../menu.html");
        } else {
            //Fel
            echo "<p class=\"alert alert-warning\">Lösenordet stämmer ej</p>";
        }
    }
}
?>
