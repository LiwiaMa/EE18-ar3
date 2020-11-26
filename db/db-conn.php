<?php
/**
* PHP version 7
* @category   
* @author     Liwia Matuszczak <liwiamatuszczak.@gmail.com>
* @license    PHP CC
*/

$user = "liwia";
$db = "liwia";
$host = "localhost";
$pass = "Qx9LCr6KTnQZljy4";

// Logga in på mysql-server och välj databas (conn = connection/handtag)
$conn = new mysqli($host, $user, $pass, $db);

// Gick det ansluta?
if ($conn->connect_error) {
    die("Kunde inte ansluta: " . $conn->connect_error);
} else {
    echo "<p>Hurrah! Det gick bra att ansluta</p>";
}

// Ställ en sql-fråga
$sql = "SELECT * FROM bilar";
$result = $conn->query($sql);

// Gick sql satsen att köra?
if (!$result) {
    die("Något blev fel ,ed sql-satsen")
} else {
    echo "<p> Lista på alla bilar kunde hämtas</p>";
}

// loopa igenom listan på bilar
while ($rad = $result->fetch_assoc()){
    echo "<p>$rad</p>";
}

// Stäng ned anslutningen 
$conn->close();

?>