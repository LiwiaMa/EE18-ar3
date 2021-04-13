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
/*       Innan loopen startar         /
/*************************************/
/* // Ladda in grafiken
var tank = new Image();
tank.src = "./bilder/tanks_sheet.png";


// Hur lång tid varje ruta får (1/60)
// var tankRutor = [1, 1, 1, 2, 2, 2, 3, 3, 3, 4, 4, 4, 5, 5, 5, 6, 6, 6, 7, 7, 7, 8, 8, 8];
var tankRutor = [1, 2, 3, 4, 5, 6, 7, 8];
var i = 0;
var kör = false;
var tankX = 100, tankY = 100, rotation = 0; */

var explosion = [17, 18, 19];
var j = 0;

// Objektet tank 
var tank = {
    bild: new Image(), 
    rutor: [1, 2, 3, 4, 5, 6, 7, 8],
    i: 0,
    kör: false,
    x: 100,
    y: 100,
    rotation: 0
}
tank.bild.src = "./bilder/tanks_sheet.png";
// För att rita ut tank figuren
function ritaTank() {
    // Första rätt ruta 
    var x = Math.floor(tank.rutor[Math.floor (tank.i)] % 8) * 32;
    var y = Math.floor(tank.rutor[Math.floor (tank.i)] / 8) * 32;
    // Spara koordinatsystemet
    ctx.save();
    // Vrida koordinatsystemet
    ctx.translate(tank.x, tank.y);
    ctx.rotate(tank.rotation / 180 * Math.PI);
    ctx.drawImage(tank.bild, x, y, 32, 32, -16, -16, 32, 32);
    // Återställ koordinatsystemet
    ctx.restore();
   
    // Hoppa till nästa
    //i++;
    // Stega fram 5 ggr långsammare
    /* if (i > tankRutor.length - 1) {
        i = 0;
    } */
    // Stega fram 5x långsammare
    if (tank.kör) {
        tank.i += 0.1;
        
    }
    if (tank.i> tank.rutor.length) {
        tank.i = 0;
    }
/* 
// Längre sätta att rit ut figuren 
    // Andra rutan
    i = 1;
    ctx.drawImage(tank, 32 * i, 0, 32, 32, 100, 100, 32, 32);

    // tredje rutan
    i = 2;
    ctx.drawImage(tank, 32 * i, 0, 32, 32, 100, 100, 32, 32);

    // sista rutan
    i = 6;
    ctx.drawImage(tank, 32 * i, 0, 32, 32, 100, 100, 32, 32); */

}

function ritaExplosion() {
    // Rita explosion
    var x = Math.floor(explosion[Math.floor (j)] % 8) * 32;
    var y = Math.floor(explosion[Math.floor (j)] / 8) * 32;
    ctx.drawImage(tank.bild, x, y, 32, 32, 300, 300, 32, 32);

      // Hoppa till nästa
      j += 0.2;
      if (j > explosion.length - 1) {
          j = 0;
      }
}

/*************************************/
/*         Animationsloopen           /
/*************************************/
function loopen() {
    ctx.clearRect(0, 0, 800, 600);

    ritaTank();
    ritaExplosion();

    requestAnimationFrame(loopen);

}
loopen();



/*************************************/
/*         Interaktivitetv            /
/*************************************/
window.addEventListener("keydown", function (e) {
   tank.kör = true;
    switch (e.code) {
        case "ArrowDown":
            tank.y += 5;
            rotation = 180;
            break;
    
        case "ArrowUp":
            tank.y -= 5;
            rotation = 0;
            break;
    
        case "ArrowLeft":
            tank.x -= 5;
            rotation = 270;
            break;
    
        case "ArrowRight":
            tank.x += 5;
            rotation = 90;

            break;

    }
})
window.addEventListener("keyup", function (e) {
    kör = false;
})