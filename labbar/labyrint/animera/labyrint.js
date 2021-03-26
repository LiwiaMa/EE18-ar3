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
    x: 25, // figur.x = figurX
    y: 25, // figur.y = figurY
    rotation: 0,
    bild: new Image()
}
figur.bild.src = "../nyckelpiga.png";

// Rita ut figuren
function ritaFigur() {
    ctx.save();
    ctx.translate(figur.x, figur.y);
    ctx.rotate(figur.rotation / 180 * Math.PI);
    ctx.drawImage(figur.bild, -25, -25, 50, 50);
    ctx.restore();
}

// Animationsloopen
function loopen() {
    // sudda ut canvas
    ctx.clearRect(0, 0, 600, 500)

    // Rita figuren
    ritaFigur(); 

    requestAnimationFrame(loopen);
}
// starta loopen 
loopen();

// Lyssna på piltangenter (keypress är då man klickar på en tangent. Och då man klickar på någon tangent så vet e vilken tangent det är)
window.addEventListener("keypress", function (e) {

    switch (e.code) {
        case "Numpad5":  // Pil nedåt
                figur.y += 50;
                figur.rotation = 180;
            break;
        case "Numpad8":  // Pil uppåt
                figur.y -= 50;
                figur.rotation = 0;
            break;
        case "Numpad4":  // Pil höger

                figur.x -= 50;
                figur.rotation = 270;
            break;
        case "Numpad6":  // Pil vänster
                figur.x += 50;
                figur.rotation = 90;
            break;

        default:
            break;

    }
    console.log("kolumn: " + (figur.x - 25) / 50 + ", rad: " + (figur.y - 25) / 50);
});

