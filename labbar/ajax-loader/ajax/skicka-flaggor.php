<?php
/* Backend */
session_start();
if (!isset($_SESSION["index"])) {
    $_SESSION["index"] = 2;
} else {
    $_SESSION["index"] += 6;
}

//echo "gick bra";

$allaFlaggor = scandir("../flags");

// Skriv ut namnet en flagga
//echo $allaFlsggor[2];
/* echo " <img src=\"./flags/{$allaFlaggor[$index]}\" alt=\"\">";
echo " <img src=\"./flags/{$allaFlaggor[$index + 1]}\" alt=\"\">";
echo " <img src=\"./flags/{$allaFlaggor[$index + 2]}\" alt=\"\">";
echo " <img src=\"./flags/{$allaFlaggor[$index + 3]}\" alt=\"\">";
echo " <img src=\"./flags/{$allaFlaggor[$index + 4]}\" alt=\"\">";
echo " <img src=\"./flags/{$allaFlaggor[$index + 5]}\" alt=\"\">";
echo " <img src=\"./flags/{$allaFlaggor[$index + 6]}\" alt=\"\">";
echo " <img src=\"./flags/{$allaFlaggor[$index + 7]}\" alt=\"\">";
echo " <img src=\"./flags/{$allaFlaggor[$index + 8]}\" alt=\"\">";
echo " <img src=\"./flags/{$allaFlaggor[$index + 9]}\" alt=\"\">"; */

for ($i = 0; $i < 6; $i++) { 
echo "<img src=\"./flags/{$allaFlaggor[$_SESSION["index"] + $i]}\" alt=\"\">";
    
}