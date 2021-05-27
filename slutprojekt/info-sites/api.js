// Välj ut elemet 
const eKnapp = document.querySelector(".popup");

// När man klickar på knappen
eKnapp.addEventListener("click", function() {
    console.log("Hämtar...");

     fetch("./api.php")
     .then(response => response.text())
    .then(data => {
        console.log(data);
        document.querySelector("#myPopup").innerHTML = data;
   
    })
  
})