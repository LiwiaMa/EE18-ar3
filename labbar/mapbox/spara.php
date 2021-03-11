<?php
    // Ta emot text
    $texten = filter_input(INPUT_POST, "texten", FILTER_SANITIZE_STRING);

    // Spara texten i en textfil
    //Öppna textfilen för att skriva
    $handtag = fopen("places.txt", "w"); 

    // Skriv i filen
    fwrite($handtag, "Longitude->Latitud->Texten");
        
    // Stäng textfilen
    fclose($handtag);
    
?>
