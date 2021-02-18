// Element vi behöver
const eGeoModal = document.querySelector("#geoModal");

// Starta modal (koppla till js-biblioteket)
var myModal = new bootstrap.Modal(eGeoModal, {
    keyboard: false
});

// Lyssna på när eGeoModal öppnas
// och byta ut texten
eGeoModal.addEventListener("show.bs.modal", function () {
    console.log("Yeeeey, det funkar att visa upp modal");

    // Byt ut innehållet
    const eModalBody = eGeoModal.querySelector(".modal-body");

    // Ändra innehållet
    eModalBody.innerHTML = "<h3>Hej</h3>" + "<div class=\"input-group mb-3\">" +
        "<span class=\"input-group-text\" id=\"basic-addon1\">Användarnamn</span>" +
        "<input type=\"text\" class=\"form-control\" aria-describedby=\"basic-addon1\">" +
        "</div>" +
        "<div class=\"input-group mb-3\">" +
        "<span class=\"input-group-text\" id=\"basic-addon1\">Lösenord</span>" +
        "<input type=\"text\" class=\"form-control\"  aria-describedby=\"basic-addon1\">" +
        "</div>";
});