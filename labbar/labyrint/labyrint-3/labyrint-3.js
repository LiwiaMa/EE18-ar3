/*************************************/
/*           Inställningar            /
/*************************************/
// Hitta element på sidan
const canvas = document.querySelector("canvas");
const ePoints = document.querySelector("p");


// Ställ in storlek på canvas
canvas.width = 1000;
canvas.height = 750;

// Starta canvas rit-api (det som gör att man kan rita)
var ctx = canvas.getContext("2d");

/*************************************/
/*         Globala variabler          /
/*************************************/
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
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
];
/*************************************/
/*         Objekten som syns          /
/*************************************/
var figur = {
    rad: 1, // figur.x = figurX
    kolumn: 0, // figur.y = figurY
    rotation: 0,
    poäng: 0,
    bild: new Image()
}
figur.bild.src = "../bilder/nyckelpiga.png";

// objekt mynt
var mynt1 = {
    rad: 0,
    kolumn: 0,
    bild: new Image()
}
mynt1.bild.src = "../bilder/coinn.jpg";

// objekt mynt
var mynt2 = {
    rad: 0,
    kolumn: 0,
    bild: new Image()
}
mynt2.bild.src = "../bilder/coinn.jpg";


var monster = {
    rad: 1, // figur.x = figurX
    kolumn: 0, // figur.y = figurY
    rotation: 0,
    poäng: 0,
    bild: new Image()
}
monster.bild.src = "../bilder/monster2.jpg";

/*************************************/
/*  Kod som körs innan loopen startar /
/*************************************/
spawnaMynt(mynt1);
spawnaMynt(mynt2);
spawnaMonster();
/*************************************/
/*         Animationsloopen           /
/*************************************/
function loopen() {
    ctx.clearRect(0, 0, 800, 600);

    ritaFigur();
    ritaMonster();
    ritaMynt(mynt1);
    ritaMynt(mynt2);
    
    ritaKartan();
    plockaPoäng(mynt1);
    plockaPoäng(mynt2);

    requestAnimationFrame(loopen);
}
loopen();

/*************************************/
/*             Funktioner             /
/*************************************/
// Rita ut figuren
function ritaFigur() {
    ctx.save();
    ctx.translate(figur.kolumn * 50 + 25, figur.rad * 50 + 25);
    ctx.rotate(figur.rotation / 180 * Math.PI);
    ctx.drawImage(figur.bild, -25, -25, 50, 50);
    ctx.restore();
}
function ritaMonster() {
    ctx.save();
    ctx.translate(monster.kolumn * 50 + 25, monster.rad * 50 + 25);
    ctx.rotate(monster.rotation / 180 * Math.PI);
    ctx.drawImage(monster.bild, -25, -25, 50, 50);
    ctx.restore();
}

function ritaMynt(mynt) {
    ctx.drawImage(mynt.bild, mynt.kolumn * 50, mynt.rad * 50, 50, 50);
}


// Spawna ett mynt
function spawnaMynt(objekt) {
    // Onändlig loop
    while (true) {
        objekt.rad = Math.floor(Math.random() * 16);
        objekt.kolumn = Math.floor(Math.random() * 20);

        // Avbryt när myntet 0 
        // Om vi hittar en "1", rita ut en kloss (vägg)
        if (karta[objekt.rad][objekt.kolumn] == 0) {
            break;
        }
    }
}


// Spawna ett mynt
function spawnaMonster() {
    // Onändlig loop
    while (true) {
        monster.rad = Math.floor(Math.random() * 16);
        monster.kolumn = Math.floor(Math.random() * 20);

        // Avbryt när myntet 0 
        // Om vi hittar en "1", rita ut en kloss (vägg)
        if (karta[mynt2.rad][mynt2.kolumn] == 0) {
            break;
        }
    }
}


// plocka myntet, få poäng
function plockaPoäng(mynt) {
    // om figuren är i samma ruta som myntet
    if (figur.rad == mynt.rad && figur.kolumn == mynt.kolumn) {
        // öka poäng
        figur.poäng++;
        ePoints.textContent = figur.poäng;
        // spawna om myntet
        spawnaMynt(mynt);
    }
   
}

// Rita kartan
function ritaKartan() {
    // Loopa igenom raderna (man måste byta namn på loopen till tex j, för att annars så skulle det krocka med den inre loopen)
    for (var rad = 0; rad < 15; rad++) {

        // Loopa igenom arrayen (kolumerna)
        for (var kolumn = 0; kolumn < 21; kolumn++) {
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


/*************************************/
/*             Interaktion            /
/*************************************/
window.addEventListener("keypress", function (e) {// e->  tangent som trycktes
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
})