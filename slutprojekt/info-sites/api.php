<?php
/**
* PHP version 7
* @category   
* @author     Liwia Matuszczak <liwiamatuszczak.@gmail.com>
* @license    PHP CC
*/
?>

<?php
$url = "https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY";

// Gör ett anrop
$json = file_get_contents($url);
// Avkoda json
$jsonData = json_decode($json);

echo "<p class=\"pTitle\">$jsonData->title</p>";

echo "<p class=\"pText\">$jsonData->explanation</p>";
echo "<p class=\"pDate\"> Created $jsonData->date</p>";
?>