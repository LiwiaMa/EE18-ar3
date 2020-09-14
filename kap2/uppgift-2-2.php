/**
Använd formuläret från uppgift 1.2. Skapa ett skript som tar emot data från detta formulär: Skriptet ska skriva ut "Namn:" följt av namnet på personen, "epostadress:" och personens epostadress och till sist "Vi kommer att kontakta dig inom snarast per " följt av antingen epost eller telefon beroende på vad användaren valt.
*/
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Svar från formulär</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $namn = $_POST["namn"];
    $epost = $_POST["epost"];
    $mobil = $_POST["mobil"];
    $kontakt = $_POST["roll"];

    //skriv ut svaret
    echo "<p>Namn: $namn</p>";
    echo "<p>epost: $epost</p>";
    echo "<p>mobil: $mobil</p>";

    //vad innehåller kontakt
    var_dump($kontakt);

    if ($kontakt =="epost" ) {
        echo "<p>Vi kommer kontakta dig senast per epost.</p>";
    } else {
        echo "<p>Vi kommer kontakta dig senast per mobil.</p>";

    }
    
    ?>
</body>
</html>