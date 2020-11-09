<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Regex</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Hitta match med regex</h1>
        <form action="#" method="POST">
            <label>Ange text
                <input type="text" name="text" required>
            </label>
            <button>Skicka</button>
        </form>
        <?php
        /* Ta emot data som skickas */
        $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING);

        if ($text) {
            echo "<h3>Inmattat</h3>";
            echo "<p>Text: <em>'$text'</em></p>";

            echo "<h3>Resultat</h3>";
            // Matcha "123"
            // Regex = regular expression = reguljära uttryck
            // På samma sätt som strstr() //php regex match, det är det preg_match betyder. Matcha efter 123 någon stans i texten
            if (preg_match("/123/", $text)) {
                echo "<p>&#10003; Innehåller '123'.</p>";
            } else {
                echo "<p>&#10005; Innehåller INTE '123'.</p>";
            } 

            //match om det innehåller ngn siffra
            if (preg_match("/0-9/", $text)) {
                echo "<p>&#10003; Innehåller en siffra.</p>";
            } else {
                echo "<p>&#10005; Innehåller INTE en siffra.</p>";
            } 

            //matcha bokstav från alfabetet 
            if (preg_match("/[a-zåäö]/", $text)) {
                echo "<p>&#10003; Innehåller en bokstav ur alfabetet.</p>";
            } else {
                echo "<p>&#10005; Innehåller INTE en bokstav ur alfabetet.</p>";
            }   
            //matcha bokstav från alfabetet (funkar bara med små bokstäver). i, efter ]/ betyder att den ska matcha om det finns antingen små eller stora bokstäver (case insensitive)
            if (preg_match("/[a-zåäö]/i", $text)) {
                echo "<p>&#10003; Innehåller en bokstav ur alfabetet.</p>";
            } else {
                echo "<p>&#10005; Innehåller INTE en bokstav ur alfabetet.</p>";
            }   

            //Negativ matchning
            if (preg_match("/[^_]/", $text)) {
                echo "<p>&#10003; Innehåller ej '_' tecknet.</p>";
            } else {
                echo "<p>&#10005; Innehåller '_' tecknet.</p>";
            }   

            //Sök efter 'a', 'aa', 'aaa', dvs en eller flera
            if (preg_match("/[a+]/i", $text)) {
                echo "<p>&#10003; Innehåller en eller flera 'a' i följd.</p>";
            } else {
                echo "<p>&#10005; Innehåller ej flera 'a' eller flera 'a' i följd.</p>";
            }   

            // Matcha ett antal, tex en ip-adress som 192.168.0.10
            if (preg_match("/[0-9]{1.3}.[0-9]{1.3}.[0-9]{1.3}.[0-9]{1.3}/i", $text)) {
                echo "<p>&#10003; matchar en ip adress.</p>";
            } else {
                echo "<p>&#10005; Matchar ej en ip adress.</p>";
            }   

            // Matcha ordet SAB eller SAAB
            if (preg_match("/SA{1,2}B/", $text)) {
                echo "<p>&#10003; Matchar SAB eller SAAB.</p>";
            } else {
                echo "<p>&#10005; Matchar ej SAB eller SAAB.</p>";
            }   

            // Matcha ordet SAB eller SAAB. Ett abbat sätt. | betyder eller 
            if (preg_match("/SAB|SAAB/", $text)) {
                echo "<p>&#10003; Matchar SAB eller SAAB.</p>";
            } else {
                echo "<p>&#10005; Matchar ej SAB eller SAAB.</p>";
            }  

            // Matcha orden Obs eller OBS eller obs
            if (preg_match("/obs|Obs|OBS/", $text)) {
                echo "<p>&#10003; Matchar OBS, obs, Obs.</p>";
            } else {
                echo "<p>&#10005; Matchar ej OBS, obs, Obs.</p>";
            }  

            // Matcha orden Obs oavsätt små eller stora bokstäver
            if (preg_match("/obs/i", $text)) {
                echo "<p>&#10003; Matchar obs.</p>";
            } else {
                echo "<p>&#10005; Matchar obs.</p>";
            }  

            // Matcha gatuadress tex Sveavägen 12, Sveaväg. 12
            if (preg_match("/Sveavägen 12| Sveaväg\. 12/", $text)) {
                echo "<p>&#10003; Matchar Sveaväge 12, eller Sveavägen.12 .</p>";
            } else {
                echo "<p>&#10005; Matchar Sveaväge 12, eller Sveavägen.12.</p>";
            }  
            
            // Gunnars lösning
            if (preg_match("/Sveaväg(en_12|._12)/", $text)) {
                echo "<p>&#10003; Matchar Sveaväge 12, eller Sveavägen.12 .</p>";
            } else {
                echo "<p>&#10005; Matchar Sveaväge 12, eller Sveavägen.12.</p>";
            }  
        }
        ?>
    </div>
</body>
</html>