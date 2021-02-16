<?php
/**
 * Datum på svenska
* PHP version 7
* @category   
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Datum</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        // Dagens datum
        $datum = date("l y F");
        echo "<p>Dagens datum är $datum</p>";
       // echo "<p>Dagens datum är " . $datum . "</p>";/* man kan göra så, det är också rätt, men det är bättre med den där uppe */

       /* ändra språk till svenska  */
       setlocale(LC_ALL, "sv_SE.utf8");
       //översätt datumet till svenska
       $svensktDatum = strftime("%A %y %B");
       echo "<p>Dagens datum på svenska är $svensktDatum</p>";
        ?>
    </div>
</body>
</html>