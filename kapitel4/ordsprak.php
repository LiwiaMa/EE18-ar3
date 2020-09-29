<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Slumpa fram sex ordspråk</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="ordsprak.css">
</head>
<body>
    <?php
    // Skapa en array med tio ordspråk
    $ordsprak[] = "Blyga pojkar får aldrig kyssa vackra flickor.";
    $ordsprak[] = "Alla känner apan, apan känner ingen";
    $ordsprak[] = "Bättre en fågel i handen än tio i skogen";
    $ordsprak[] = "Den som gapar över mycket mister ofta hela stycket.";
    $ordsprak[] = "Ju fler kockar desto sämre soppa";
    $ordsprak[] = "Man saknar inte kon förrän båset är tomt.";
    $ordsprak[] = "I nöden prövas vännen.";
    $ordsprak[] = "Hunger är den bästa kryddan.";
    $ordsprak[] = "Ett gott skratt förlänger livet.";
    $ordsprak[] = "Bränt barn skyr elden";


    // Array för att lagra varje kasr
    $tagna = [];

    // Upprepa mig 6 gånger
    for ($i = 0; $i < 6; $i++) {

    

    // Slumpa fram ett tal mellan 0 och 9 med funktionen rand()
    $index = rand(0, 9);

    // Skriv ut ordspråket om det inte är redan taget
    if (!in_array($index, $tagna)) {
        echo "<p>$ordsprak[$index]</p>";

        //Spara nu det tagna indexet
        $tagna[] = $index;
    } else {
        $i --;
    }
    print_r($tagna);

    }

    /* 
    // for-loop som går 6 varv för att vi vill skriva ut 6 ordspråk'
    echo "<ol>";
    for ($i = 0; $i < 6; $i++) {
        // Slumpa fram ett tal mellan 0 och 9 med funktionen rand()
        $index = rand(0, 9);
        // Skriv ut ordspråket 
        echo "<li>$ordsprak[$index]</li>";
    }
    echo "</ol>";
 */
    ?>
</body>
</html>