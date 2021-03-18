// Element vi jobbar med
const canvas = document.querySelector("canvas");
const ePoints = document.querySelector("p");

// Ställ in bredd och höjd
canvas.width = 1000;
canvas.height = 700;

// Slå på ritmotorn
var ctx = canvas.getContext("2d");

// Ladda in bilderna 
var background = new Image();
background.src = "./bilder/game.jpg";
var green = new Image();
green.src = "./bilder/green.png";
var orange = new Image();
orange.src = "./bilder/orange.png";

// Figurernas position
var greenX = 100, greenY = 100;

var orangeX = 700 * Math.random(); // Slump 0-700
var orangeY = 500 * Math.random(); // Slump 0 - 500

var squareX =  700 * Math.random();
var squareY =  700 * Math.random();

// Animationsloopen
var points = 0;

function loopen() {
    // Suddar ut canvas
    ctx.clearRect(0, 0, 800, 600);
    
    // Rita grafiken
    ctx.drawImage(background, 0, 0);
    ctx.drawImage(green, greenX, greenY, 80, 100);
    ctx.drawImage(orange, orangeX, orangeY, 90, 100);
      // Rita en rektangel
        ctx.fillStyle = "#DAC5A0";
        ctx.fillRect(squareX, squareY, 200, 100); 

      // Kollision
      var d = Math.sqrt((greenY - orangeY)**2 + (greenX - orangeX)**2);
      if (d < 50) {
          orangeX = 750 * Math.random();
          orangeY = 500 * Math.random();
          points++;
          ePoints.textContent = points;
          console.log(points);
      }
    requestAnimationFrame(loopen);
    
}
loopen();

// Lyssna på tangenter
window.addEventListener("keydown", function (e) {
    console.log(e.keyCode);
    
    switch (e.keyCode) {
        // Flytta på green
        case 101: // Numpad2
        // Om mindre än 700
        if (greenY < 600 ) {
            greenY += 10;
        }
            break;
    
        case 100: // Numpad4
        // Om större än 0
        if (greenX > 0) {
            greenX -= 10;
        }
            break;
    
        case 102: // Numpad6
        // Om mindre än 880
        if (greenX < 920) {
            greenX += 10;
        }
            break;
        
        case 104: // Numpad8
        // Om större än o
        if (greenY > 0) {
            greenY -= 10;   
        }       
            break;
            
        // Flytta på orange
        case 65: // A
            orangeX -= 10;          
            break;
    
        case 68: // D
            orangeX += 10;          
            break;
        case 87: // W
            orangeY -= 10;          
            break;
        case 83: // S
            orangeY += 10;          
            break;
    
    }
})
 
// Röra figuren med tangent
/* canvas.addEventListener("mousemove", function (e) {
    orangeX = e.offsetX;
    orangeY = e.offsetY;

}) */