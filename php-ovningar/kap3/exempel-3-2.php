<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    /* Laugh on Monday, laugh for danger.
    Laugh on Tuesday, kiss a stranger.
    Laugh on Wednesday, laugh for a letter.
    Laugh on Thursday, something better.
    Laugh on Friday, laugh for sorrow.
    Laugh on Saturday, joy tomorrow. 
    */

    // Veckodag på engelska (litet l ger mig veckodag)
    $idag = date("l");

    if ($idag == "Monday") {
        echo "<p>Laugh on Monday, laugh for danger</p>";
    } elseif ($idag == "Tuesday") {
        echo "<p>Laugh on Tuesday, kiss a stranger.
        </p>";
    } elseif ($idag == "Wednesday") {
        echo "<p>Laugh on Wednesday, laugh for a letter.
        </p>";
    } elseif ($idag == "Thursday") {
        echo "<p>Laugh on Thursday, something better.
        </p>";
    } elseif ($idag == "Friday") {
        echo "<p>Laugh on Friday, laugh for sorrow.
        </p>";
    } elseif ($idag == "Saturday") {
        echo "<p>Laugh on Saturday, joy tomorrow.
        </p>"; }


        switch ($$idag) {
            case 'Monday':
               echo "<p>Laugh on Monday, laugh for danger</p>";
                break;
            case 'Tuesday':
               echo "<p>Laugh on Tuesday, kiss a stranger.</p>";
                break;
            case 'Wednesday':
               echo "<p>Laugh on Wednesday, laugh for a letter.</p>";
                break;
            case 'Thursday':
               echo "<p>Laugh on Thursday, something better.</p>";
                break;
            case 'Friday':
               echo "<p>Laugh on Friday, laugh for sorrow.</p>";
                break;
            case 'Saturday':
               echo "<p>Laugh on Saturday, joy tomorrow</p>";
                break;
            
            default:
                echo "<p>No day selected</p>";
                break;
        }

        // Hur upprepar man kod? (< 10 hur många gånger den ska upprepas, den börjar räkna med/på 0)
        for ($i = 0; $i < 10; $i++) { 
            echo "<p>Hej $i</p>";
        }
    ?>
</body>
</html>