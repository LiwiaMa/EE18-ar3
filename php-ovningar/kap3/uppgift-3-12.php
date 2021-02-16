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
        <h1> Vad får du för medalj?</h1>
        <form action="#" method="POST">
            <label for="namn">Ange din plats </label>
            <input id="namn" class="form-control" type="text" name="plats" required>
            
            <button type="submit" class="btn btn-primary">svar </button>
        </form>

        <?php 
if (isset($_POST["plats"])) {

    $plats = $_POST["plats"];
    # code...
       switch ($plats) {
        case "1":
            echo "<p>Du får guldmedalj </p>";
            break;
        case "2":
            echo "<p>Du får silvermedalj </p>";
            break;
        case "3":
            echo "<p>Du får bronsmedalj </p>";
            break;
        default:
            echo "<p>Du får ingen medalj </p>";
            break;
    }
}

        ?>
    </div>
</body>
</html>

