// Hitta tabellen
const eTable = document.querySelector('table');

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
    newRow.insertCell().innerText = e.lngLat.lng;
    newRow.insertCell().innerText = e.lngLat.lng;
    newRow.insertCell().innerText = "...";

    // @todo
    // Textcellen är redierbar
    
});

