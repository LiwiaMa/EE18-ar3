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

// Spelaren 
var spelare = {
    rad: 1,
    kolumn: 0,
    rotation: 0,
    bild: new Image(),
    rita() {
        ctx.save();
        ctx.translate(this.kolumn * 50 + 25, this.rad * 50 + 25);
        ctx.rotate(this.rotation / 180 * Math.PI);
        ctx.drawImage(this.bild, -25, -25, 50, 50);
        ctx.restore();
        
    }
}
spelare.bild.src = "../bilder/nyckelpiga.png";

// var finns spelaren
// spelare.rad -> på vilken
// spelare.kolumn -> på vilken kolumn
// spelare.rad()



// Mynt 1
var mynt1 = {
    rad: 3,
    kolumn: 11,
    bild: new Image(),
    rita() {
        ctx.drawImage(this.bild, this.kolumn * 50, this.rad * 50, 50, 50);
    }
}
mynt1.bild.src = "../bilder/coin.png";

// Mynt 2
var mynt2 = {
    rad: 2,
    kolumn: 2,
    bild: new Image(),
    rita() {
        ctx.drawImage(this.bild, this.kolumn * 50, this.rad * 50, 50, 50);
    }
}
mynt2.bild.src = "../bilder/coin.png";

// Mynt 3
var mynt3 = {
    rad: 4,
    kolumn: 2,
    bild: new Image(),
    rita() {
        ctx.drawImage(this.bild, this.kolumn * 50, this.rad * 50, 50, 50);
    }
}
mynt3.bild.src = "../bilder/coin.png";

// Monster
var monster1 = {
    rad: 5,
    kolumn: 2,
    bild: new Image(),
    rita() {
        ctx.drawImage(this.bild, this.kolumn*50, this.rad*50, 50, 50);
    }
}
monster1.bild.src = "../bilder/monster.png";
// Monster
var monster2 = {
    rad: 6,
    kolumn: 6,
    bild: new Image(),
    rita() {
        ctx.drawImage(this.bild, this.kolumn*50, this.rad*50, 50, 50);
    }
}
monster2.bild.src = "../bilder/monster.png";

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
// Rita kartan
/* function ritaSpelare() {
    ctx.save();
    ctx.translate(spelare.kolumn * 50 + 25, spelare.rad * 50 + 25);
    ctx.rotate(spelare.rotation / 180 * Math.PI);
    ctx.drawImage(spelare.bild, -25, -25, 50, 50);
    ctx.restore();
    
} */

/* function ritaMynt1() {
    ctx.drawImage(mynt1.bild, mynt1.kolumn * 50, mynt1.rad * 50, 50, 50);
} */
/* function ritaMynt2() {
    ctx.drawImage(mynt2.bild, mynt2.kolumn * 50, mynt2.rad * 50, 50, 50);
} */
/* function ritaMynt3() {
    ctx.drawImage(mynt3.bild, mynt3.kolumn * 50, mynt3.rad * 50, 50, 50);
} */

/* function ritaMonster() {
    ctx.save();
    ctx.translate(monster.kolumn * 50 + 25, monster.rad * 50 + 25);
    ctx.rotate(monster.rotation / 180 * Math.PI);
    ctx.drawImage(monster.bild, -25, -25, 50, 50);
    ctx.restore();
} */
/* function ritaMonster1() {
   
    ctx.drawImage(monster1.bild, monster1.kolumn*50, monster1.rad*50, 50, 50);
} */
/* function ritaMonster2() {
   
    ctx.drawImage(monster2.bild, monster2.kolumn*50, monster2.rad*50, 50, 50);
} */


// Animationsloopen
function loopen() {
    // sudda ut canvas
    ctx.clearRect(0, 0, 600, 500)

    // Rita figuren
    ritaKartan(); 

    spelare.rita();

    mynt1.rita();
    mynt2.rita();
    mynt3.rita();

    monster1.rita();
    monster2.rita();
   /*  ritaMynt1();
    ritaMynt2();
    ritaMynt3();
    ritaMonster1();
    ritaMonster2(); */

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

