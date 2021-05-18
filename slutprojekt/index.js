// Välj ut elemet 
const eKnapp = document.querySelector("button");
const eModal = document.querySelector("#geoModal");

// När man klickar på knappen
eKnapp.addEventListener("click", function() {
    console.log("Hämtar...");

    fetch("./db/inloggning/log-in.php")
    .then(response => response.text())
    .then(data => {
        console.log(data);
        
    // Fyll griden med bild
    eModal.innerHTML += data;
    })

})