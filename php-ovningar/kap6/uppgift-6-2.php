<?php

/**
 * Bygg på formuläret så att användaren också ska fylla i en epostadress.Kontrollera sedan att epostadressen innehåller ett @, och minst en punkt.Kontrollera också att epostadressen är minst sex tecken lång.

 * PHP version 7
 * @category   
 * @author     Liwia Matuszczak <liwiamatuszczak.@gmail.com>
 * @license    PHP CC
 */
?>
<?php

/**
 * Skriv ett skript som frågar efter två heltal via ett formulär, det första talet ska vara lägre än det andra. Skriv ut alla heltal mellan de två som matats in. Separera med mellanslag. Varna om tal 1 är större än tal 2.
 * 
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
    <title>kontaktformulär</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="container">
        <h1>Två tal</h1> <!-- # är att komma tillbaka till sig själv, istället för att ange hela namnet -->
        <form action="#" method="POST">
            <label for="namn">Ange namn</label>
            <input id="namn" class="form-control" type="text" name="namn" requireds>
            <label for="adress">Ange adress</label>
            <input id="adress" class="form-control" type="text" name="adress" requireds>
            <label for="postnr">Ange postnumer</label>
            <input id="postnr" class="form-control" type="text" name="postnr" requireds>
            <label for="postort">Ange postort</label>
            <input id="postort" class="form-control" type="text" name="postort" requireds>
            <label for="epost">Ange epost</label>
            <input id="epost" class="form-control" type="text" name="epost" requireds>
            <button type="submit" class="btn btn-info">Räkna ut</button>
        </form>

        <?php
        // Läs in från formuläret och rensa från hot
        $namn = filter_input(INPUT_POST, "namn", FILTER_SANITIZE_STRING);
        $adress = filter_input(INPUT_POST, "adress", FILTER_SANITIZE_STRING);
        $postnr = filter_input(INPUT_POST, "postnr", FILTER_SANITIZE_STRING);
        $postort = filter_input(INPUT_POST, "postort", FILTER_SANITIZE_STRING);
        $epost = filter_input(INPUT_POST, "epost", FILTER_SANITIZE_STRING);
        
        // Om vi har data 
        if ($namn && $adress && $postnr && $postort && $epost) {
            
            // Kontrollera att alla fälten innehåller minst 3 tecken; strlen()
            if (strlen($namn) < 3) {
                echo "<p class=\"alert alert-warning\"> Namnet måste vara minst 3 tecken</p>";
            }
            if (strlen($adress) < 3) {
                echo "<p class=\"alert alert-warning\"> Adressen måste vara minst 3 tecken</p>";
            }
            if (strlen($postnr) < 3) {
                echo "<p class=\"alert alert-warning\"> Postnumret måste vara minst 3 tecken</p>";
            }
            if (strlen($postort) < 3) {
                echo "<p class=\"alert alert-warning\"> Postort måste vara minst 3 tecken</p>";
            }

            // Kontrollera att postnumret innehåller 5 tecken: strlen()
            if (strlen($postnr) == 5) {
                
            }else {
                echo "<p class=\"alert alert-warning\"> postnumret ska innehålla 5 tecken</p>";
            }
            
            // Kontrollera att postnumret innehåller endast siffror
            if (!is_numeric($postnr)) {
                echo "<p class=\"alert alert-warning\"> postnumret måste bestå av siffror</p>";
            }

            // Kontrollera sedan att epostadressen innehåller ett @, och minst en punkt.
            if (strpos($epost, "@") === false || strpos($epost, ".") === false ) {
                echo "<p class=\"alert alert-warning\">Epost måste innehålla @ och minst en punkt</p>";
            }

            // Kontrollera också att epostadressen är minst sex tecken lång.
            if (strlen($epost) < 6) {
                echo "<p class=\"alert alert-warning\"> Epostadressen måste vara minst 3 tecken</p>";
            }
        }

        ?>
    </div>
</body>
</html>