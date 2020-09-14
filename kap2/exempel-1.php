<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kapitel 2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    //skriver dagens dag
    echo "Idag är det \"";
    echo date(" l");
    echo "\".<\p>";

    //Ett smartare att skriva det
    echo "<p>Idag är det \"" . date("l") . "\".<\p>";

   //Med en variabel 
   $idag = date("l");
   echo "<p>Idag är det \"$idag\" . </p>";

   //dagens datum
   //Ite $dDatum säger ingenting
   //undvik $d
   //Undvik $dat
    $dagensDatum = date("d"); //14
    $månad = date("F"); //September
    //idag är det monday 14 september
    echo "<p>Idag är \"$idag\" \"$dagensDatum $månad <\p> ";
  
    // Hämta ut några server variabler
    echo "<p>$_SERVER[SERVER_ADDR] <\p>";

    
    ?>
</body>
</html>