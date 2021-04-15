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
var plane = {
    bild: new Image(), 
    rutor: [111, 112, 113],
    i: 0,
    kör: false,
    x: 100,
    y: 100,
    rotation: 0
}
plane.bild.src = "./spritelib-gpl/shooter/1945.png";
// För att rita ut plane figuren
function ritaflygplan() {
    // Första rätt ruta 
    var x = plane.i * 64 + 4;
    var y = 400;
    // Spara koordinatsystemet
    ctx.save();
    // Vrida koordinatsystemet
    ctx.translate(plane.x, plane.y);
    ctx.rotate(plane.rotation / 180 * Math.PI);
    ctx.drawImage(plane.bild, x, y, 64, 64, -32, -32, 64, 64);
    // Återställ koordinatsystemet
    ctx.restore();
   
    // Hoppa till nästa
    //i++;
    // Stega fram 5 ggr långsammare
    /* if (i > flygplanRutor.length - 1) {
        i = 0;
    } */
    // Stega fram 5x långsammare
    if (plane.kör) {
        plane.i += 0.1;
        
    }
    if (plane.i> plane.rutor.length) {
        plane.i = 0;
    }
/* 
// Längre sätta att rit ut figuren 
    // Andra rutan
    i = 1;
    ctx.drawImage(plane, 32 * i, 0, 32, 32, 100, 100, 32, 32);

    // tredje rutan
    i = 2;
    ctx.drawImage(plane, 32 * i, 0, 32, 32, 100, 100, 32, 32);

    // sista rutan
    i = 6;
    ctx.drawImage(plane, 32 * i, 0, 32, 32, 100, 100, 32, 32); */

}

function ritaExplosion() {
    // Rita explosion
    var x = Math.floor(explosion[Math.floor (j)] % 8) * 32;
    var y = Math.floor(explosion[Math.floor (j)] / 8) * 32;
    ctx.drawImage(plane.bild, x, y, 32, 32, 300, 300, 32, 32);

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

    ritaflygplan();
    ritaExplosion();

    requestAnimationFrame(loopen);

}
loopen();



/*************************************/
/*         Interaktivitetv            /
/*************************************/
window.addEventListener("keydown", function (e) {
   plane.kör = true;
    switch (e.code) {
        case "ArrowDown":
            plane.y += 5;
            rotation = 180;
            break;
    
        case "ArrowUp":
            plane.y -= 5;
            rotation = 0;
            break;
    
        case "ArrowLeft":
            plane.x -= 5;
            rotation = 270;
            break;
    
        case "ArrowRight":
            plane.x += 5;
            rotation = 90;

            break;

    }
})
window.addEventListener("keyup", function (e) {
    kör = false;
})