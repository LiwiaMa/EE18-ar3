// Element vi använder
const canvas = document.querySelector("canvas");
const ePoints = document.querySelector("p");

// Ställ storlek på cavas
canvas.width = 1000;
canvas.height = 750;

// Stlå på rit api
var ctx = canvas.getContext("2d");

// Skapa labyrinten (0 = hål i väggen, 1 = vägg)
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
    rad: 1, // figur.x = figurX
    kolumn: 0, // figur.y = figurY
    rotation: 0,
    poäng: 0, 
    bild: new Image()
}
figur.bild.src = "../bilder/nyckelpiga.png";

// objekt mynt
var mynt = {
    rad: 0,
    kolumn: 0,
    bild: new Image ()
}
mynt.bild.src = "../bilder/coinn.jpg";


// Rita ut figuren
function ritaFigur() {
    ctx.save();
    ctx.translate(figur.kolumn * 50 + 25, figur.rad * 50 + 25);
    ctx.rotate(figur.rotation / 180 * Math.PI);
    ctx.drawImage(figur.bild, -25, -25, 50, 50);
    ctx.restore();
}

// Rita mynt
function ritaMynt() {
    ctx.drawImage(mynt.bild, mynt.kolumn * 50, mynt.rad * 50, 50, 50);
}

// Spawna ett mynt
function spawnaMynt() {
    // Onändlig loop
    while (true) {
        mynt.rad = Math.floor(Math.random() * 16);
        mynt.kolumn =  Math.floor(Math.random() * 20);

        // Avbryt när myntet 0 
         // Om vi hittar en "1", rita ut en kloss (vägg)
        if (karta[mynt.rad][mynt.kolumn] == 0) {
            break;
        }
    }
}

// Spawna ett mynt
function spawnaMynt() {
    // Onändlig loop
    while (true) {
        mynt.rad = Math.floor(Math.random() * 16);
        mynt.kolumn =  Math.floor(Math.random() * 20);

        // Avbryt när myntet 0 
         // Om vi hittar en "1", rita ut en kloss (vägg)
        if (karta[mynt.rad][mynt.kolumn] == 0) {
            break;
        }
    }
}
spawnaMynt();

// plocka myntet, få poäng
function plockaPoäng() {
    // om figuren är i samma ruta som myntet
    if (figur.rad == mynt.rad && figur.kolumn == mynt.kolumn) {
        // öka poäng
        figur.poäng++;
        texten.textContent = figur.poäng;
        // spawna om myntet
        spawnaMynt();
    }
}
// Rita kartan
function ritaKartan() {
    // Loopa igenom raderna (man måste byta namn på loopen till tex j, för att annars så skulle det krocka med den inre loopen)
    for (var rad = 0; rad < 15; rad++) {

        // Loopa igenom arrayen (kolumerna)
        for (var kolumn = 0; kolumn < 20; kolumn++) {
            // console.log(i, karta[i]);

            // Om vi hittar en "1", rita ut en kloss (vägg)
            if (karta[rad][kolumn] == 1) {
                ctx.fillRect(kolumn * 50, rad * 50, 50, 50);
            }
        }
    }
    // Loopa igenom arrayen
    for (var i = 0; i < 12; i++) {
        // console.log(i, karta[i]);

        // Om vi hittar en "1", rita ut en kloss
        var x = i * 50;
        var y = 0;
        if (karta[i] == 1) {
            ctx.fillRect(kolumn, rad, 50, 50);
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

    ritaMynt();

    // krocka med myntet och få poäng
    plockaPoäng();
    

    requestAnimationFrame(loopen);
}
// starta loopen 
loopen();

window.addEventListener("keypress", function (e) {

    switch (e.code) {
        case "Numpad2":  // Pil nedåt
        // Är det 0 (gång) i rutan nedanför?
                if (karta[figur.rad + 1][figur.kolumn] == 0) {
                    // Isåfall flytta dit
                    figur.rad++;
                }
                figur.rotation = 180;
            break;
        case "Numpad8":  // Pil uppåt
        // Är det 0 i rutan ovanför?
            if (karta[figur.rad - 1][figur.kolumn] == 0) {
                // Isåfall flytta dit
                figur.rad--;
            }
                figur.rotation = 0;
            break;
        case "Numpad4":  // Pil höger
                if (karta[figur.rad][figur.kolumn - 1] == 0) {
                    figur.kolumn--;
                }
                figur.rotation = 270;
            break;
        case "Numpad6":  // Pil vänster
            if (karta[figur.rad][figur.kolumn + 1] == 0) {
                figur.kolumn++;
            }
                figur.rotation = 90;
            break;

        default:
            break;

    }
    console.log("Kolumn: " + figur.kolumn + ", rad:" + figur.rad);
});



