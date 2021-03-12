<?php
    // Ta emot text
    $texten = filter_input(INPUT_POST, "texten", FILTER_SANITIZE_STRING);

    // Spara texten i en textfil
    //Öppna textfilen för att skriva
    $handtag = fopen("places.txt", "w"); 

    // Skriv i filen
    // Spara ned koordinater
    fwrite($handtag, $texten." ". " \n");
       
    // Stäng textfilen
    fclose($handtag);
    
?>
