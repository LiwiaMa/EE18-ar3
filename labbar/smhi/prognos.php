<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Testar chartjs.org</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="./smhi.css">
</head>
<body>
    <div class="kontainer">
        <h1>SMHI tiodagars prognos</h1>
        <canvas id="myChart"></canvas>
    <?php
    // URL till smhi api
    $url = "https://opendata-download-metfcst.smhi.se/api/category/pmp3g/version/2/geotype/point/lon/18/lat/59/data.json";

    // Gör ett anrop
    $json = file_get_contents($url);

    // Avkoda json
    $jsonData = json_decode($json);

    // Plocka ut publiseringsdatum
    $approvedTime = $jsonData->approvedTime;
    echo "<p>Prognosen publicerad $approvedTime</p>";

   // Plocka ut tidsserien
    $timeSeries = $jsonData->timeSeries;

    // Skapa variabler för att samla ihop
    // Alla tidpunkter och alla temperaturer


    $tidpunkter ="";
    $temperaturer = "";
    // Loopa igenom arrayen (.= är att sätta ihop)
    foreach ($timeSeries as $timeData) {
        // Plocka ut tidpunkt
        $validTime = $timeData->validTime;
        // echo "$validTime";
        $tidpunkter.= "'$validTime', ";

        // plocka ut temperaturerna
        $parameters = $timeData->parameters;
        $temperaturen = $parameters[10]->values[0];
        // echo "$temperaturen";
        $temperaturer .= "'$temperaturen', ";
    }

    // Skriv ut Javascript
    echo " <script>";
    echo "const labels = [$tidpunkter];
    const data = {
        labels: labels,
        datasets: [{
            label: 'Mood prognos',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [$temperaturer],
            tension: 0.4, // mjukare, / rundare
        }]
    };
    const config = {
        type: 'line',
        data,
        options: {}
    };
    var myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
    ";
    echo " </script>";


    echo "</div>";

    ?>
</body>
</html>