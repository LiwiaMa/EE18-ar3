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
// Ladda in grafiken
var shrek = new Image();
shrek.src = "./bilder/shrel.png";

// Hur lång tid varje ruta får (1/60)
var shrekRutor = [0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6];
var i = 0;

// För att rita ut shrek figuren
function ritashrek() {
    // Första rutan 
    ctx.drawImage(shrek, 64 * shrekRutor[i], 0, 64, 64, 100, 100, 96, 64);

    // Hoppa till nästa
    i++;
    if (i > shrekRutor.length - 4) {
        i = 0;
    }
/* 
// Längre sätta att rit ut figuren 
    // Andra rutan
    i = 1;
    ctx.drawImage(shrek, 32 * i, 0, 32, 32, 100, 100, 32, 32);

    // tredje rutan
    i = 2;
    ctx.drawImage(shrek, 32 * i, 0, 32, 32, 100, 100, 32, 32);

    // sista rutan
    i = 6;
    ctx.drawImage(shrek, 32 * i, 0, 32, 32, 100, 100, 32, 32); */

}

/*************************************/
/*         Animationsloopen           /
/*************************************/
function loopen() {
    ctx.clearRect(0, 0, 800, 600);

    ritashrek();

    requestAnimationFrame(loopen);

}
loopen();

