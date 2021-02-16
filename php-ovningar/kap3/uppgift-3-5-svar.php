<?php
/**
 * Enkel inloggning
* PHP version 7
* @category   
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php
        //Ta emot data från formuläret
        $belopp = $_POST["belopp"];
        $lånetid = $_POST["lånetid"];
        $ränta = $_POST["ränta"];

        // Start år = 0
        $lånekostnad = $belopp;
       
        // Räkna ut totala lånekostnaden (< $lånetid, det är en variabel som upprepar sig enligt angiven siffra, så man behöver inte skriva in siffror i for loopen)
        for ($i = 0; $i < $lånetid; $i++) { 
           $lånekostnad = $lånekostnad * (1 + $ränta / 100);
        }

        // Skriv ut resultatet
       echo "<p>Den totala lånekostnaden efter $lånetid år blir  $lånekostnad </p>";
        
        ?>
    </div>
</body>
</html>