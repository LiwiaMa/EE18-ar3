<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arrayer och foreach()</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    // En array som innehåller länder
    $länder = ["Sverige", "Norge", "Finland"];

    // Skriver ut en array (print_r = print array) (En array bärjar alltid på index 0)
    print_r($länder);

    // Skriver ut en del ur en array
    echo "<p>$länder[0]</p>";
    echo "<p>$länder[1]</p>";
    echo "<p>$länder[2]</p>";
    
    // Utöka arrayen
    $länder[] = "Danmark";
    print_r($länder);
    echo "<p></p>";

    // Ta bort ett element ur en array(Finland)
    unset($länder[2]);
    print_r($länder);
    echo "<p></p>";

    // Associativ array
    $elever = []; //tom array
    $elever["Dominika"] = "Lat";
    $elever["Lucas"] = "Keyboard";
    $elever["Olle"] = "munspel";
    print_r($elever);   

    //Skriv ut hela arrayen?
    $länder[2] = "Finland";
    echo "<p>$länder[0]</p>";
    echo "<p>$länder[1]</p>";
    echo "<p>$länder[2]</p>";
    echo "<p>$länder[3]</p>";
    
    // Loopa igenom en array = foreach
    foreach ($länder as $land) {
        echo "<p>$land</p>";
    }

    // Loopa igenom arrayen elver
    foreach ($elever as $instrument) {
        echo "<p>$elev</p>";
    }
    foreach ($elever as $key => $instrument) {
        echo "<p>$key spelar $instrument</p>";
    }

    //Skriv ut som en tabel
    /* 
    <table>
        <tr>
            <td>John</td>
            <td>Doe</td>
        </tr>
        <tr>
            <td>Jane</td>
            <td>Doe</td>
        </tr>
    </table>
    */

    echo "<table>";
    echo "<td>John</td>";
    echo "<td>Doe</td>";
    echo "</tr>";
    echo "</table>";
    
    //Dymaniskt sapad tabell
    echo "<table>";
    foreach ($länder as $land) {
        echo "<tr>";
        echo "<td> $land</td>";
        echo "</tr>";
    }
    echo "</table>";

    //Skriv ut arrayen elever som en tabell
    echo "<table>";
    echo "<tr>
            <th>Namn</th>
            <th>Instrument</th>
        </tr>";
    foreach ($elever as $key => $instrument) {
        echo "<tr>";
        echo "<td> $key</td>";
        echo "<td> $instrument</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Splitta (dela) en sträng 
    $mening = "Vi och våra partners bearbetar personuppgifter såsom IP-adress, unikt ID och browsingdata. Vissa partner begär inte ditt samtycke till att behandla dina data, utan de litar på sitt legitima affärsintresse. Visa vår lista över partners för att se de syften som de tror att de har ett legitimt intresse för och hur du kan göra invändningar mot det.";

    $allaOrd = explode(" ", $mening);

    // Skriv ut alla ord numrerade i en tabell
    echo "<table>";
    echo "<tr>
            <th>Ordning</th>
            <th>Ord</th>
        </tr>";
        foreach ($allaOrd as $key => $ord) {
            $key = $key + 1; //$key++;
            echo "<tr>";
            echo "<td> $key</td>";
            echo "<td> $ord</td>";
            echo "<tr>";
        }

    ?>
</body>
</html>