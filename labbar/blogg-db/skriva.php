<?php
/**
 * 
 * En enkel blogg som använder en databas
* PHP version 7
* @category Webbaplikation med databas  
* @author     Liwia Matuszczak <liwiamatuszczak.@gmail.com>
* @license    PHP CC
*/
// Update = ändra
// Select, Insert (lägga in), 
// Include är att klistrar in det. Ungefär som css
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
        <li class="nav-item"><a class="nav-link" href="./lasa.php">Läsa</a></li>
        <li class="nav-item"><a class="nav-link active" href="./skriva.php">Skriva</a></li>
        <li class="nav-item"><a class="nav-link" href="./lista.php">Admin</a></li>
    </ul>
</nav>
    <h1>Min blogg</h1>
    <form action="#" method="POST">
        <label>Ange rubrik <input type="text" name="header"></label>
        <label>Ange text <textarea name="postText"></textarea></label>
        <button>Spara</button>
    </form>
    <?php

    // Ta emot det som skickas
    $header = filter_input(INPUT_POST, 'header', FILTER_SANITIZE_STRING);
    $postText = filter_input(INPUT_POST, 'postText', FILTER_SANITIZE_STRING);
    // Om data finns...
    if ($header && $postText) {
        // mysql -> insert -> runrik och text -> copy php code
        // Sql satsen
        $sql = "INSERT INTO post (header, postText) VALUES ('$header', '$postText')";
        
        // Steg 2: nu kör vi sql-saten
        $result = $conn->query($sql);

        // Gick det bra att köra sql-satsen
        if (!$result) {
            die("Något blev fel med SQL-satsen");
        } else {
            echo "<p>Inlägget har registrerats</p>";
        }
        
        // Steg 3: Stänga ned anslutningen
        $conn->close();
    }  
    ?>
    </div>
</body>
</html>