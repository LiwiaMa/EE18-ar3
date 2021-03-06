<?php
/**
 * På det nationella provet i Matematik 1 våren 2018 så fanns följande poänggränser för olika provbetyg.
 * Skapa ett skript som frågar användaren hur många poäng hen fick på detta prov. Skriptet ska säga vilket provbetyg användaren fick.
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
    <title>Nationella provet i matematik</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Får du åka berg-och-dalbana på en nöjespark? </h1>
        <form action="#" method="POST">
            <label for="namn">Ange din längd </label>
            <input id="namn" class="form-control" type="text" name="längd" required>
            
            <button type="submit" class="btn btn-primary">svar </button>
        </form>

        <?php 
       // Finns data?
       if (isset($_POST["längd"])) {
        // Ta emot data från formuläret
        $längd = $_POST["längd"];

        // Spelar ingen roll om USA är skriven med små eller stora bostäver

        if ($längd > 1.4 && $längd < 1.9 ) {
            echo "<p>Din längd $längd är okej. Du får åka berg-och-dalbana på en nöjespark</p>";
        } 
        else {
            echo "<p> Din längd är inte okej. Du får inte åka berg-och-dalbana på en nöjespark</p>";
        }

    }
        ?>
    </div>
</body>
</html>

