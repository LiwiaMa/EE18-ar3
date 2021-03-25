// Element vi använder
const canvas = document.querySelector("canvas");

// Ställ storlek på cavas
canvas.width = 600;
canvas.height = 500;

// Stlå på rit api
var ctx = canvas.getContext("2d");

/* // Figuren
var figur = new Image();
figur.src = "../nyckelpiga.png";
var figurX = 100;
var figurY = 100;
 */
// Figur objektet (istället för att ha många olika variabler, som figurX, figurY osv) (vad figuren har för egenskaper)
var figur = {
    x: 100, // figur.x = figurX
    y: 100, // figur.y = figurY
    rotation: 0,
    bild: new Image()
}
figur.bild.src = "../nyckelpiga.png";

// Animationsloopen
function loopen() {
    // sudda ut canvas
    ctx.clearRect(0, 0, 600, 500)

    // Rita loopen
    ctx.drawImage(figur.bild, figur.x, figur.y, 50, 50);


    requestAnimationFrame(loopen);
}
// starta loopen 
loopen();

// Lyssna på piltangenter (keypress är då man klickar på en tangent. Och då man klickar på någon tangent så vet e vilken tangent det är)
window.addEventListener("keypress", function (e) {

    switch (e.code) {
        case "Numpad5":  // Pil nedåt
            if (figur.y < 450) {
                figur.y += 50;
            }
            break;
        case "Numpad8":  // Pil uppåt
            if (figur.y > 0) {
                figur.y -= 50;
            }
            break;
        case "Numpad4":  // Pil höger

            if (figur.x > 0) {
                figur.x -= 50;
            }
            break;
        case "Numpad6":  // Pil vänster
            if (figur.x < 550) {
                figur.x += 50;
            }
            break;

        default:
            break;

    }
    console.log("kolumn: " + figur.x / 50 + ", rad: " + figur.y / 50);
});

