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
    [25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25],
    [0, 0, 0, 0, 0, 0, 0, 25, 0, 0, 0, 0, 0, 0, 0, 25, 0, 0, 0, 25],
    [24, 0, 25, 25, 25, 25, 25, 25, 0, 25, 25, 25, 25, 25, 0, 25, 0, 25, 0, 25],
    [24, 0, 0, 0, 0, 25, 0, 25, 0, 25, 0, 0, 0, 25, 0, 25, 0, 25, 25, 25],
    [24, 25, 25, 25, 0, 25, 0, 25, 0, 0, 0, 25, 0, 25, 25, 25, 0, 25, 0, 25],
    [24, 0, 0, 0, 0, 25, 0, 25, 0, 25, 0, 25, 0, 0, 0, 0, 0, 25, 0, 25],
    [24, 0, 25, 25, 25, 25, 0, 0, 0, 25, 0, 25, 25, 25, 25, 25, 0, 25, 0, 0],
    [24, 0, 0, 0, 0, 25, 25, 25, 25, 25, 0, 0, 0, 0, 0, 25, 0, 25, 0, 25],
    [24, 25, 25, 25, 0, 25, 0, 25, 0, 25, 25, 25, 25, 25, 0, 25, 0, 25, 0, 25],
    [24, 0, 0, 0, 0, 0, 0, 0, 0, 25, 0, 0, 0, 0, 0, 25, 0, 0, 0, 25],
    [24, 0, 25, 25, 25, 25, 25, 25, 0, 25, 0, 25, 25, 25, 0, 25, 0, 25, 0, 25],
    [24, 0, 25, 0, 25, 0, 0, 25, 0, 0, 0, 0, 0, 25, 0, 25, 0, 25, 0, 25],
    [24, 0, 25, 0, 25, 0, 25, 25, 0, 25, 25, 25, 25, 25, 0, 25, 0, 25, 0, 25],
    [24, 0, 0, 0, 25, 0, 0, 0, 0, 25, 0, 0, 0, 0, 0, 25, 0, 25, 0, 25],
    [24, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25]
];

var kartBild = new Image();
kartBild.src = "../bilder/tanks_sheet.png";

function loopen() {
    ctx.clearRect(0, 0, 800, 600);
    
    ritaKartan();

    requestAnimationFrame(loopen);
}
loopen();

// Rita kartan
function ritaKartan() {
    // Loopa igenom raderna (man måste byta namn på loopen till tex j, för att annars så skulle det krocka med den inre loopen)
    for (var rad = 0; rad < 15; rad++) {

        // Loopa igenom arrayen (kolumerna)
        for (var kolumn = 0; kolumn < 21; kolumn++) {
            // console.log(i, karta[i]);

            // Om vi hittar en "1", rita ut en kloss (vägg)
                // ctx.fillRect(kolumn * 50, rad * 50, 50, 50);
                var x = Math.floor(karta[rad][kolumn] % 8) *32;
                var y = Math.floor(karta[rad][kolumn] / 8) *32;
                // Rita ut en vild som väggar istället för svarta väggar
                ctx.drawImage(kartBild, x, y, 32, 32, kolumn * 50, rad * 50, 50, 50);
        }
    }
    
}


