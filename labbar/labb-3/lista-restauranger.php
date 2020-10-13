<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Skriv ut csv-fil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>NTI lunchrestauranger</h1>
        <form class="bg-light" action="#" method="POST">
            <label>Ange filnamn</label>
            <input class="form-control" type="text" name="filnamn">
            <button type="submit" class="btn btn-primary">Läs in</button>
        </form>
        <?php
        // Finns data?
        if (isset($_POST["filnamn"])) {

            // Läs in texten från formuläret
            $filnamn = $_POST["filnamn"];

            // Kollar om filen finns
            if (is_readable($filnamn)) {

                // Läs in hela filen i en sträng: file()
                $rader = file($filnamn);

                // Räknar antal rader 
                $antalRader = count($rader);

                // Skriv ut som en tabell
                echo "<p class=\"alert alert-info\" role=\"alert\">Filen $filnamn har läst in</p>";
                echo "<table class=\"table table-striped\">";
                echo "<thead>";
                echo "<tr>";
                echo "<th scope=\"col\">Namn</th>";
                echo "<th scope=\"col\">Gata</th>";
                echo "<th scope=\"col\">Postnr</th>";
                echo "<th scope=\"col\">Postort</th>";
                echo "</tr>";
                echo "</thead>";


                // Loopa igenom alla rader
                foreach ($rader as $rad) {
                    $delar = explode(", ", $rad);

                    // Skriv ut raden
                    echo "<tr>";
                    echo "<td>$delar[0]</td>";
                    echo "<td>$delar[1]</td>";
                    echo "<td>$delar[2]</td>";
                    echo "<td>$delar[3]</td>";
                    echo "</tr>";
                }
                echo "</table>";

                echo "<p class=\"alert alert-info\" role=\"alert\">Hittat $antalRader</p>";
            } else {
                echo "<p class=\"alert alert-warning\" role=\"alert\">Kan ej läsa $filnamn</p>";
            }
        }









        ?>
    </div>
</body>
</html>