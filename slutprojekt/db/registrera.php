<?php

/**
 * PHP version 7
 * @category   Inloggning
 * @author     Liwia Matuszczak <liwiamatuszczak.@gmail.com>
 * @license    PHP CC
 */
// kod som säger var bug finns, används bara när man utvecklar koden
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "conn.php";
$check = new Validator();

// använder validator klassen på data som skickas från formuläret
if (isset($_POST["submit"])) {
    $check->set($_POST);
    $check->validateUsername();
    $check->validatePassword();
    $check->validateEmail();
}
?>

<?php

// Ta emot data och skydda från hot
$fnamn = filter_input(INPUT_POST, "fnamn", FILTER_SANITIZE_STRING);
$enamn = filter_input(INPUT_POST, "enamn", FILTER_SANITIZE_STRING);
$mail = filter_input(INPUT_POST, "mail", FILTER_SANITIZE_STRING);
$pass1 = filter_input(INPUT_POST, "pass1", FILTER_SANITIZE_STRING);
$pass2 = filter_input(INPUT_POST, "pass2", FILTER_SANITIZE_STRING);

echo "<p>Hello $fnamn</p>";
//$sql = "SELECT * FROM `logIn`";
// Kontrollera om data finns
if ($fnamn && $enamn && $mail && $pass1 && $pass2) {

    // kontrollera att användarnamnet inte redan finns!
    $sql = "SELECT * FROM 'logIn' WHERE mail = $mail";
    $result = $conn->query($sql);

    // Kontrollera om lösenordet matchar
    if ($pass1 == $pass2) {
        $result = $conn->query($sql);

        // Om användarnamnet  finns går vidare skriv ut en varning
        if ($result->num_rows != 0) {
            echo "<p class=\"alert alert-warning\">Användarnamnet finnsredan, försök igen</p>";
        } else {
            //Räkna ut hash på lösenordet
            $hash = password_hash($pass1, PASSWORD_DEFAULT);

            $sql = "INSERT INTO `logIn`(`fnamn`, `enamn`, `mail`, `hash`) VALUES ('$fnamn', '$enamn', '$mail', '$hash')";
            echo "<p>$sql</p>";

            // Kör sql satsen
            $result = $conn->query($sql);

            if (!$result) {
                die("Något blev fel med SQL-satsen." . $conn->error);
            } else {
                echo "<p class=\"alert alert-success\">Inläggets har registrerats.</p>";
            } 
            echo "<p class=\"alert alert-success\">Användarenregistrerad</p>";

            // Stäng ned anslutningen
            $conn->close();
        }
    } else {
        echo "<p class=\"alert alert-warning\">Lösenorden matchar inte,försök igen</p>";
    }
  
    echo $sql;
}  header("Location: ../index.html");
    exit;
?>
