// Element vi använder
const canvas = document.querySelector("canvas");

// Ställ storlek på cavas
canvas.width = 1000;
canvas.height = 750;

// Stlå på rit api
var ctx = canvas.getContext("2d");

// Skapa kartan (0 = hål i väggen, 1 = vägg)
var karta = [
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1],
    [1, 0, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1, 0, 1, 0, 1],
    [1, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 0, 0, 1, 0, 1, 0, 1, 1, 1],
    [1, 1, 1, 1, 0, 1, 0, 1, 0, 0, 0, 1, 0, 1, 1, 1, 0, 1, 0, 1],
    [1, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1],
    [1, 0, 1, 1, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1, 0, 0],
    [1, 0, 0, 0, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1],
    [1, 1, 1, 1, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1, 0, 1, 0, 1],
    [1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1],
    [1, 0, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 1, 1, 0, 1, 0, 1, 0, 1],
    [1, 0, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 1],
    [1, 0, 1, 0, 1, 0, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1, 0, 1, 0, 1],
    [1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
];
// Figur objekt
var figur = {
    x: 25, // figur.x = figurX
    y: 75, // figur.y = figurY
    rotation: 0,
    bild: new Image()
}
figur.bild.src = "../bilder/nyckelpiga.png";

// Rita ut figuren
function ritaFigur() {
    ctx.save();
    ctx.translate(figur.x, figur.y);
    ctx.rotate(figur.rotation / 180 * Math.PI);
    ctx.drawImage(figur.bild, -25, -25, 50, 50);
    ctx.restore();
}

// Rita kartan
function ritaKartan() {
    // Loopa igenom raderna (man måste byta namn på loopen till tex j, för att annars så skulle det krocka med den inre loopen)
    for (var j = 0; j < 15; j++) {

        // Loopa igenom arrayen (kolumerna)
        for (var i = 0; i < 20; i++) {
            // console.log(i, karta[i]);

            // Om vi hittar en "1", rita ut en kloss
            var x = i * 50;
            var y = j * 50;
            if (karta[j][i] == 1) {
                ctx.fillRect(x, y, 50, 50);
            }
        }
    }
    // Loopa igenom arrayen
    for (var i = 0; i < 12; i++) {
        console.log(i, karta[i]);

        // Om vi hittar en "1", rita ut en kloss
        var x = i * 50;
        var y = 0;
        if (karta[i] == 1) {
            ctx.fillRect(x, y, 50, 50);
        }
    }
}

// Animationsloopen
function loopen() {
    // sudda ut canvas
    ctx.clearRect(0, 0, 1000, 650)

    // Rita figuren
    ritaKartan();

    ritaFigur();

    requestAnimationFrame(loopen);
}
// starta loopen 
loopen();

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



