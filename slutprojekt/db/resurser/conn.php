<?php
// Slå på fel meddelanden
//error_reporting(E_ALL);

// Inloggningsuppgifter till vårt databas
$host = "localhost";
$db = "slutprojekt";
$user = "slutprojekt";
$pass = "f089PAGH3PrzP99d";

// Steg 1 - skapa en anslutning
$conn = new mysqli($host, $user, $pass, $db);
//var_dump($host, $db, $user, $pass, $conn);

// Gick det bra att ansluta?
if ($conn->connect_error) {
    die("Kunde inte ansluta: " . $conn->connect_error);
} else {
    /* echo "<p class=\"anslut\">Gick bra att ansluta till vårt databas</p>"; */
}

// Gick det bra?

?>
