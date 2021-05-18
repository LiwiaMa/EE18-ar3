<?php
// Slå på fel meddelanden
error_reporting(E_ALL);

// Inloggningsuppgifter till vårt databas
$host = "localhost";
$db = "slutprojekt";
$user = "slutprojekt";
$pass = "ZdAR6afXPY7VXSf8";

// Steg 1 - skapa en anslutning
$conn = new mysqli($host, $user, $pass, $db);

// Gick det bra att ansluta?
if ($conn->connect_error) {
    die("Kunde inte ansluta: " . $conn->error);
} else {
    echo "<p class=\"anslut\">Gick bra att ansluta till vårt databas</p>";
}

