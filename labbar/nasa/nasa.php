<?php
/**
* PHP version 7
* @category   
* @author     Liwia Matuszczak <liwiamatuszczak.@gmail.com>
* @license    PHP CC
*/
?>
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
        echo "<h1>NASA</h1>";

        // Hämta sidan
        $sidan = file_get_contents("https://blogs.nasa.gov/disaster-response/2020/10/28/nasa-prepares-for-hurricane-zeta/");

        // Sök början på texten
        $start = strpos($sidan, "widget widget_recent_entries") ;
        if ($start !== false) {
            echo "<p>Recent post började på position $start</p>";
        } else {
            echo "<p>Hittade inte Recent post början!</p>";
        }

        // Hitta var horoskopet slutar
        $slut = strpos($sidan, "widget widget_recent_comments", $start);
        if ($slut !== false) {
            echo "<p>Recent post slutar på position $slut</p>";
        } else {
            echo "<p>Hittade inte Recent post slut!</p>";
        }

        // Hitta var horoskopet slutar
            
            // Skriv ut den här delen
            $caRecentPost = substr($sidan, $start + 30, $slut - $start);
            //echo $caHoroskopText;

            /* // Första delen: Vädurens rubrik
            $start = strpos($caHoroskopText, "<div class=\"o-indenter\">");
            $slut = strpos($caHoroskopText, "</div>", $start);
            $del1 = substr($caHoroskopText, $start, $slut - $start);
            echo "$del1</div>\n";

            // Andra delen: 
            $start = strpos($caHoroskopText, "<div class=\"o-indenter\">", $slut);
            $slut = strpos($caHoroskopText, "</div>", $start);
            $del2 =  substr($caHoroskopText, $start, $slut - $start);
            echo "$del2</div>\n"; */

            // Hämta alla div-boxar i en loop
            for ($i = 0; $i < 5; $i++) {
                $start = strpos($caRecentPost, "<li>", $slut);
                $slut = strpos($caRecentPost, "</li>", $start);
                $del2 =  substr($caRecentPost, $start, $slut - $start);
                echo "$del2</li>\n";
            } 
        ?>
    </div>
</body>
</html>