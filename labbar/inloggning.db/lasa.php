<?php

/**
 * PHP version 7
 * @category   
 * @author     Liwia Matuszczak <liwiamatuszczak.@gmail.com>
 * @license    PHP CC
 */
include "./resurser/conn.php";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blogg</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <nav>
            <ul class="nav nav-tabs">
            <?php if (isset($_SESSION["anamn"])) { ?>
                    <li class="nav-item"><a class="nav-link" href="./logout.php">Logga ut</a></li>
                    <li class="nav-item"><a class="nav-link " href="./lista.php">Lista</a></li>
                    <li class="nav-item"><a class="nav-link active" href="./skriva.php">Skriv</a></li>
                <?php } else { ?>
                    <li class="nav-item"><a class="nav-link" href="./login.php">Logga in</a></li>
                    <li class="nav-item"><a class="nav-link" href="./registrera.php">Registrera</a></li>
                    <li class="nav-item"><a class="nav-link active" href="./lasa.php">Läs</a></li>
                    <li class="nav-item"><a class="nav-link" href="./sok.php">Sök</a></li>

                <?php } ?>
            </ul>
        </nav>
        <?php
        // 2. Ställ en SQL-fråga
        $sql_b = "SELECT * FROM post";
        $result = $conn->query($sql);

        // Gick det bra?
        if (!$result) {
            die("Något blev fel med SQL-satsen." . $conn->error);
        } else {
            echo "<p class=\"alert alert-success\" role=\"alert\">Hämtade " . $result->num_rows . " inlägg</p>";
        }

        // Steg 4: Stäng ned anslutningen till databasen
        $conn->close();

        // Presentera resultatet
        while ($rad = $result->fetch_assoc()) {
            echo "<div class=\"inlägg\">" ;
            echo "<h5>$rad[header] </h5>";
            echo "<h6> $rad[postText] </h6>";
            echo "<p> $rad[postDate]</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>