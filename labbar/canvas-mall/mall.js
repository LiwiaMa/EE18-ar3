/*************************************/
/*           Inställningar            /
/*************************************/
// Hitta element på sidan
const canvas = document.querySelector("canvas");

// Ställ in storlek på canvas
canvas.width = 800;
canvas.height = 600;

// Starta canvas rit-api (det som gör att man kan rita)
var ctx = canvas.getContext("2d");

/*************************************/
/*         Globala variabler          /
/*************************************/
var karta = [
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
]

/*************************************/
/*         Objekten som syns          /
/*************************************/
var piga = {
    x: 
}

var monster = {
    x:
}

/*************************************/
/*         Animationsloopen           /
/*************************************/
function loopen() {
    ctx.clearRect(0, 0, 800, 600);

    ritaPiga();

    requestAnimationFrame(loopen);
}
loopen();

/*************************************/
/*             Funktioner             /
/*************************************/
// Rita ut nyckelpigan
function ritaPiga() {
    ctx.drawImage(piga.bild, poga.x, piga.y, 50, 50);
}

/*************************************/
/*             Interaktion            /
/*************************************/
window.addEventListener("keypress", function (e) {// e->  tangent som trycktes
    switch (e.code) {
        case "Numpad2":
            piga.y++;
            break;
        case "Numpad4":

            break;
        case "Numpad6":

            break;
        case "Numpad8":

            break;
    }
})