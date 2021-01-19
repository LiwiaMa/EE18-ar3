<?php

/**
 * PHP version 7
 * @category   Inloggning
 * @author     Liwia Matuszczak <liwiamatuszczak.@gmail.com>
 * @license    PHP CC
 */
include "./resurser/conn.php";
session_start();
// Om inte inloggad klickad till login.php
if (!isset($_SESSION["anamn"])) {
    header("Location: ./login.php");
}
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inloggning</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <nav>
        <ul class="nav nav-tabs">
        <?php if (isset($_SESSION["anamn"])) { ?>
                <li class="nav-item"><a class="nav-link active" href="./lista.php">Lista</a></li>
                <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
                <li class="nav-item"><a class="nav-link" href="./logout.php">Logga ut</a></li>
                <li class="nav-item anamn"> <?php echo $_SESSION["anamn"] . " (". $_SESSION["antal"].")" ;?> </li>
            <?php } else { ?>
                <li class="nav-item"><a class="nav-link" href="./login.php">Logga in</a></li>
                <li class="nav-item"><a class="nav-link" href="./registrera.php">Registrera</a></li>
                <li class="nav-item"><a class="nav-link" href="./lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="./sok.php">Sök</a></li>
            <?php } ?>
               
               
            </ul>
        </nav>
        <header>
            <h1>Lista på användare</h1>
        </header>
        <main>
            <?php
          /*   if (isset($GET["id"])) {
                $id = $GET["id"];
                $result = $conn->query($sql);

                // Gick det bra? Kunde SQL -satsen köras?
                if (!$result) {
                    die("Något blev fel med SQL-satsen");
                } else {
                    $rad = $result->fetch_assoc();
                    echo "<p class=\"alert alert-dismissible alert-warning\">Vill du verkligen radera<strong>{$rad['fnamn']} {$rad['enamn']}</strong> från databasen? <a class=\"btn btn-danger\" href\"radera-db.php?={$rad['id']}\"> Bekräfta</a></p>";
                }
                
            } else {
                # code...
            } */
            
                echo "<p class=\"alert alert-success\">Du är inloggad</p>"; 
                
                // Hämta användare i tabellen
                $id = $_GET["id"];
                $sql = "SELECT * FROM user WHERE id = '$id'";
                $result = $conn->query($sql);
                $rad = $result->fetch_assoc();

                // Gick det bra?
                if (!$result) {
                    die("Något blev fel med SQL-satsen." . $conn->error);
                } else {
                    echo "<p class=\"alert alert-success\" role=\"alert\">Hämtade " . $result->num_rows . " användare</p>";
                }


                echo "<table>";
                echo    "<tr>
                        <th></th>
                        <th> Förnamn</th> 
                        <th> Efternamn</th> 
                        <th> Skapad</th> 
                        <th></th>
                        <th></th>   
                    </tr>";
                    
                    // Visa användare och fråga om man verkligen vill radera ett konto
                    echo "<tr>";
                    echo "<td> Är du säker på att du vill radera ";
                    echo  "<td> {$rad['fnamn']}</td>";
                    echo  "<td> {$rad['anamn']}</td>";
                    echo  "<td> {$rad['skapad']}</td>";
                    echo "<form method=\"post\" action=\"#\">";
                    echo "<td> <button type=\"submit\" name=\"deletebtn\" class=\"btn btn-outline-danger\"> Bekräfta </button></td>";
                    echo "</form>";
                    
                    // if-sats för att radera användare
                    if (isset($_POST['deletebtn'])) {
                        $sql = "DELETE FROM user WHERE id = '$id'";
                        $conn->query($sql);

                        if (!$result) {
                            die("Något blev fel med SQL-satsen." . $conn->error);
                        } else {
                            echo "<p class=\"alert alert-success\" role=\"alert\">Användaren har raderats </p>";
                        }

                    }
                // Steg 4: Stäng ned anslutningen till databasen

                    $conn->close();
                    echo "<td></td>";

                  echo "</tr>";

                echo "</table>";
            ?>
            
        </main>
    </div>
</body>
</html>