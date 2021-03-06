<?php

/**
 * PHP version 7
 * @category   Inloggning
 * @author     Liwia Matuszczak <liwiamatuszczak.@gmail.com>
 * @license    PHP CC
 */
// kod som säger var bug finns
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */

require "../db/resurser/conn.php";

require "./class/Validator.php";
$check = new Validator();

// Ta emot data och skydda från hot
$fnamn = filter_input(INPUT_POST, "fnamn", FILTER_SANITIZE_STRING);
$enamn = filter_input(INPUT_POST, "enamn", FILTER_SANITIZE_STRING);
$mail = filter_input(INPUT_POST, "mail", FILTER_SANITIZE_STRING);
$pass1 = filter_input(INPUT_POST, "pass1", FILTER_SANITIZE_STRING);
$pass2 = filter_input(INPUT_POST, "pass2", FILTER_SANITIZE_STRING);

//var_dump($fnamn, $enamn, $mail, $pass1, $pass2);


//$sql = "SELECT * FROM `logIn`";
// Kontrollera om data finns
if ($fnamn && $enamn && $mail && $pass1 && $pass2) {
    $check->validateName($fnamn);
    $check->validateLastname($enamn);
    $check->validatePass($pass1);
    $check->validateMail($mail);
    $errors=$check->showErrors();

    if (count($errors) > 0) {
        foreach ($errors as $error ) {
            echo $error;
        }
    } else {
        

    // kontroll om användarnamnet inte redan finns!
    $sql = "SELECT * FROM 'logIn' WHERE mail = $mail";
    $result = $conn->query($sql);

    // Kontroll om lösenordet matchar
    if ($pass1 == $pass2) {
        $result = $conn->query($sql);

        // Om användarnamnet finns, gå vidare skriv ut en varning
        if ($result->num_rows != 0) {
            echo "<p class=\"alert alert-warning\">Användarnamnet finnsredan, försök igen</p>";
        } else {
            //Räkna ut hash på lösenordet
            $hash = password_hash($pass1, PASSWORD_DEFAULT);

            $sql = "INSERT INTO `logIn`(`fnamn`, `enamn`, `mail`, `hash`) VALUES ('$fnamn', '$enamn', '$mail', '$hash')";
            //echo "<p>$sql</p>";

            // Kör sql satsen
            $result = $conn->query($sql);

            if (!$result) {
                die("Something is wrong wih SQL." . $conn->error);
            } 
            echo "<p class=\"alert alert-success\">User registered
            </p>";

            // Stäng ned anslutningen
            $conn->close();
            //header("Location: ../index.html");
        }
    } else {
        echo "<p class=\"alert alert-warning\">Passwrord doesn't match, try again</p>";
    }
    }

    //echo $sql;
} 
    //exit;
