<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Cat</h1>
        <?php
        //Api nyckeln
        $key = "api_key=1506c9ff-fee1-4f84-97f2-06f0223e38ae";

        // URL till tjänsten
        $url = "https://api.thecatapi.com/v1/images/search$key";
        echo $url;
        // Gör ett anrop
        $json = file_get_contents($url);
        // Avkoda json
        $jsonData = json_decode($json);

        $coord = $jsonData->coord;
        $urll = $coord->urll;
    
        echo "<img src=\"$jsonData->urll\" alt=\"cat\">";
        //echo "<img src=\"$jsonData->url\" alt=\"cat\">";
        ?>
    </div>
</body>
</html>