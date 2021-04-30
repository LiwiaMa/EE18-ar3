// Element vi använder
const canvas = document.querySelector("canvas");

// Ställ storlek på cavas
canvas.width = 1000;
canvas.height = 750;

// Stlå på rit api
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
/*              Objekten              /
/*************************************/


// Spelare class (oop)
// class är som en ritning/ mall som man kan använda för att skapa objekt
// constructor är som 
class Spelare {
    constructor()
    {
        this.rad = 1;
        this.kolumn = 0;
        this.rotation = 0;
        this.bild = new Image();
        this.bild.src = "../bilder/nyckelpiga.png";
    }
    rita() {
        ctx.save();
        ctx.translate(this.kolumn * 50 + 25, this.rad * 50 + 25);
        ctx.rotate(this.rotation / 180 * Math.PI);
        ctx.drawImage(this.bild, -25, -25, 50, 50);
        ctx.restore();
        
    }
}
// Nu skapar vi objektet vi behöver
var spelare = new Spelare();

// var finns spelaren
// spelare.rad -> på vilken
// spelare.kolumn -> på vilken kolumn
// spelare.rad()

// Klass muynt
class Mynt {
    constructor () {
    this.rad = Math.floor(Math.random() * 12);
    this.kolumn = Math.floor(Math.random() * 16);
    this.bild = new Image();
    this.bild.src = "../bilder/coin.png";
    }
    rita() {
        ctx.drawImage(this.bild, this.kolumn * 50, this.rad * 50, 50, 50);
    }
}

// skapa en array för mynt
var mynten = [];
for (let i = 0; i < 5; i++) {
mynten.push(new Mynt());
    
}

// Klass monster
class Monster {
    constructor () {
        this.rad = Math.floor(Math.random() * 12);
        this.kolumn = Math.floor(Math.random() * 16);
        this.bild = new Image();
        this.bild.src = "../bilder/monster.png";

    }
    rita() {
        ctx.drawImage(this.bild, this.kolumn*50, this.rad*50, 50, 50);
    }
}
// skapa en array för monster
var monsters = [];
for (let i = 0; i < 5; i++) {
mynten.push(new Monster());
    
}

/*************************************/
/*            Funktioner              /
/*************************************/

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
    
}


// Animationsloopen
function loopen() {
    // sudda ut canvas
    ctx.clearRect(0, 0, 600, 500)

    // Rita figuren
    ritaKartan(); 

    spelare.rita();

    // Rita ut alla mynt
    mynten.forEach(mynt => mynt.rita());
    // Rita ut alla mynt
    monsters.forEach(monster => monster.rita());

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

