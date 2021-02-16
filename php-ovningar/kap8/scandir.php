<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Skanna katalog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
      <h1>Skanna katalog</h1>
        <?php
        // Välj katalog
        $katalog = "/var/www";

        // Skriv ut vilken är katalogen som skannas
        echo "<p>Katlalogen: '$katalog'</p>";

        // Skanna av katalogen
        $resultat = scandir($katalog);

        // Vad innehåller resultat?
       // var_dump($resultat);

       // Lopa igenom arrayen resultat. Continue är skippa/hoppa över
       foreach ($resultat as $objekt) {

           // Skippa '.' och '..'
           if ($objekt == "." || $objekt == "..") {
               continue;
           }

           // Skippa under katalogen
           if (is_dir("$katalog/$objekt")) {
               continue;
           }

           // Skaffa frman lite info om filen
           $info = pathinfo($objekt);
           var_dump($info);
           echo "<p>$objekt</p>";
       }

        ?>
    </div>
</body>
</html>