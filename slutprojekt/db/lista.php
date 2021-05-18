<?php

/**
 * PHP version 7
 * @category   Inloggning
 * @author     Liwia Matuszczak <liwiamatuszczak.@gmail.com>
 * @license    PHP CC
 */
include "./db/conn.php";
session_start();
// Om inte inloggad klickad till login.php
if (!isset($_SESSION["mail"])) {
    header("Location: ./log-in.php");
}
?>
<?php

echo "<p class=\"alert alert-success\">Du är inloggad</p>";

// Hämta användare i tabellen
$sql = "SELECT * FROM 'logIn'";
$result = $conn->query($sql);

// Gick det bra?
if (!$result) {
    die("Något blev fel med SQL-satsen." . $conn->error);
} else {
    echo "<p class=\"alert alert-success\" role=\"alert\">Hämtade " . $result->num_rows . " användare</p>";
}

// Steg 4: Stäng ned anslutningen till databasen
$conn->close();

// Presentera resultatet

echo "<table>";
echo    "<tr>
            <th> Förnamn</th> 
            <th> Efternamn</th>
            <th> Användarnamn</th> 
            <th> Skapad</th> 
            <th></th>
            <th></th>
        </tr>";

while ($rad = $result->fetch_assoc()) {
    echo "<tr>";

    echo "<td>$rad[fnamn] </td>";
    echo "<td> $rad[enamn] </td>";
    echo "<td> $rad[mail]</td>";
    echo "<td> $rad[skapad]</td>";
    echo "<td><a style=\"width=10px\" class=\"btn btn-outline-danger\" href=\"radera-verifera-db.php?id={$rad['id']}\"> Radera</a></td>";
    echo "<td><a class=\"btn btn-outline-warning\" href=\"redigera-db.php?id={$rad['id']}\"> Redigera</a></td>";
    echo "</tr>";
}

echo "</table>";
?>