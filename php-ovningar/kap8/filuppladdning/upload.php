<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <?php
        if (isset($_POST['submit'])) {

            // Ta emot filen
            $file = $_FILES["file"];
            var_dump($file);
            //  Filens namn
            $fileName = $file["name"];
            $fileSize = $file["size"];
            $fileType = $file["type"];
            $fileTempName = $file["tmp_name"];
            $error = $file["error"];

            // Tillåtna filtyper
            $allowed = ["jpg", "png", "gif"];
            

            // Bildens filtyp
            $delar = explode("/", $fileType);
            $imageType = $delar[1];

            // Är filen tillåten?
            if (in_array($imageType, $allowed)) {

                // Blev det något felmeddelande?
                if ($error === 0) {
                    
                    // Är filen för stor? eller for liten, whatever
                    if ($fileSize <= 200000) {
                        
                        // Skapa ett unikt namn
                        $fileNewName = uniqid("", true). "$imageType";

                        // vart filen skall hamna
                        $fileDestination = "uppladdat/$fileNewName";

                        // Äntligen! Flytta filen in i maooen
                        move_uploaded_file($fileTempName, $fileDestination);
                        echo "<p>Filen är uppladdat </p>";
                    } 
                    else {
                        echo "<p>Filen är fööööööör stor!</p>";
                    }
                }else {
                    echo "<p>Något blev fel</p>";
                }
                
            } else {
                echo "<p>Sorry, du får bara ladda upp jpg, png eller gif!.</p>";
            }
            
        }
        ?>
    </div>

    </form>
</body>
</html>