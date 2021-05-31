// Välj ut elemet 
const eKnapp = document.querySelector(".popup");

// När man klickar på knappen
eKnapp.addEventListener("click", function() {
    console.log("Hämtar...");

     fetch("./api.php")
     .then(response => response.text())
    .then(data => {
        console.log(data);
        // skriv in api till popup ruta som kommer efter man har klickat på knappen
        document.querySelector("#myPopup").innerHTML = data;
   
    })
  
})