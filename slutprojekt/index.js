// Välj ut elemet 
const eKnapp = document.querySelector("#sign-up");
const eButton = document.querySelector("#log-in");
const eModal = document.querySelector("#geoModal");
const eRegistrera = document.querySelector("#registrera");
const eErrors = document.querySelector(".errors");

// När man klickar på knappen
eKnapp.addEventListener("click", function(e) {
    console.log("Hämtar...");

    e.preventDefault();

    // läser in det som står i formuläret
    formData = new FormData(eRegistrera);

    // går till sidan och tar med
     fetch("./db/registrera.php", {
        method: "post",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        // Skriver ut errors
     eErrors.innerHTML=data;
    })
  
})

eButton.addEventListener("click", function() {
    console.log("Hämtar...");

     fetch("./db/log-in.php")
     .then(response => response.text())
    .then(data => {
        console.log(data);
   
    })
  
})