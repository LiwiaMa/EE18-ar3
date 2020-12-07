<?php
// Slå på fel meddelanden
error_reporting(E_ALL);

// Inloggningsuppgifter till vårt databas
$host = "localhost";
$db = "blogg";
$user = "blogg";
$pass = "5s1FzyWQzvxfy9Jy";

// Steg 1 - skapa en anslutning
$conn = new mysqli($host, $user, $pass, $db);

// Gick det bra att ansluta?
if ($conn->connect_error) {
    die("Kunde inte ansluta: " . $conn->error);
} else {
    echo "<p>Gick bra att ansluta till vårt databas</p>";
}

/* .htacces tillåter inte webbläsaren att se denna conn fil där det finns all info, dvs lösenord osv. */
/* Denny from All 
r en kort intruktion. Den säkrar och döljer */
