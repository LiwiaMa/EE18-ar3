// Välj ut elemet 
const eKnapp = document.querySelector("input");
const eModal = document.querySelector("#geoModal");

// När man klickar på knappen
eKnapp.addEventListener("click", function() {
    console.log("Hämtar...");

    fetch("./db/log-in.php")
    /* .then(response => response.text())
    .then(data => {
        console.log(data);
   
    eModal.innerHTML += data;
    })
 */
})