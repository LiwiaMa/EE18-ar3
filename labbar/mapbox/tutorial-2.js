// Hitta tabellen
const eTable = document.querySelector('table');
const eKnapp = document.querySelector("button");



// Min personlia access-token
mapboxgl.accessToken = 'pk.eyJ1IjoibGlsZWswMiIsImEiOiJja2w2ZGw0dDMwaHluMnBreWl2NTRxMmxuIn0.58ExQ72kcfWOF4XKGaQIdQ'; // replace this with your access token

// Skapa kartan
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/lilek02/ckm1xkuom7xho17rz3jqq7jhn', // replace this with your style URL
    center: [18.068581, 59.329323], // Longitude, Latitude
    zoom: 10.7
});
// Lägga till markers när man klickar på kartan (function(e) betyder vart man klicksr, edn skickar med sig information)
map.on("click", function (e) {
    console.log("du har klickat på kartan", e.lngLat);

    // Infoga marker
    var marker = new mapboxgl.Marker()
        .setLngLat(e.lngLat)
        .addTo(map);

    // Infoga rad i tabellen
    var newRow = eTable.insertRow();

    // Infogas Första cellen
    // .. och skriver in latitude-texten
    newRow.insertCell().innerText = e.lngLat.lng;

    // Infogas andra cellen
    // .. och skriver in longituden

    newRow.insertCell().innerText = e.lngLat.lng;

    // Infogas Tredje cellen
    // .. och gör den redigerbar
    // .. Skriver in en exempeltext

    //newRow.insertCell().innerHTML = "<td><blockquote contenteditable=\"true\">Write Here</td>";
    var lastCell = newRow.insertCell();
    lastCell.contentEditable = "true";
    lastCell.innerText = "...";


});
// Klick på knappen läser in alla koordinater från tabellen
eKnapp.addEventListener("click", function() {
    // Skriv ut innehållet av tabellen i loggen
    // 1. Hitta första cellen
    const eCell = document.querySelector("td");
    // 2. Läs av innehållet
    console.log(eCell.textContent);

    // Hitta ALLA celler
    const eCeller = document.querySelectorAll("td");

    // Loopa igenom alla celler (läsa igenom de en och en) 
    eCeller.forEach(cell => {
        console.log(cell.innerText);

        // Låtsas att vi har ett formulär
        var formData = new FormData();
        formData.append("texten", "Latitude->...");

        // Skicka till backend
        fetch("spara.php", {
            method: "post",
            body: formData
        }) 
            
        // Skickar
        .then(response => response.text()) // Tar emot svar
    });

    

});




    


