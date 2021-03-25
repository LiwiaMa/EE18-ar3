/*
Create by Learn Web Developement
Youtube channel : https://www.youtube.com/channel/UC8n8ftV94ZU_DJLOLtrpORA
*/
// Element som vi arbetar med
const eCanvas = document.querySelector("#snake");
const ctx = eCanvas.getContext("2d");

// Create the unit
const box = 32;

// load img
const ground = new Image();
ground.src = "./img/ground.png";

const foodImg = new Image();
foodImg.src = "./img/food.png";

// create the snake
var snake = [];
snake[0] = {
    x : 9* box,
    y : 10 * box
}

// load audio files
const dead = new Audio();
const eat = new Audio();
const up = new Audio();
const left = new Audio();
const right = new Audio();
const down = new Audio();

dead.src = "./audio/dead.mp3";
eat.src = "./audio/eat.mp3";
up.src = "./audio/up.mp3";
left.src = "./audio/left.mp3";
right.src = "./audio/right.mp3";
down.src = "./audio/down.mp3";
// create the food
var food = {
    x : Math.floor(Math.random()*17+1) * box,
    y : Math.floor(Math.random()*15+3) * box
}

// Create the score var
var score = 0;

// control the snake
var d;
document.addEventListener("keydown", direction);

function direction(e) {
    if (e.keyCode == 37 && d != "RIGHT") {
        left.play();
        d = "LEFT";
    }else if (e.keyCode == 38 && d != "DOWN"){
            up.play();
        d = "UP";
    }else if (e.keyCode == 39 && d != "LEFT") {
            right.play();
        d = "RIGHT";
    }else if (e.keyCode == 40 && d != "UP"){
            down.play();
        d = "DOWN";
    }
}
// Check collision function (om fu träffar dig själv)
function collision(head,array) {
    for (var i = 0; i < array.length; i++) {
       if (head.x == array[i].x && head.y == array[i].y) {
           return true;
       } 
    }
    return false;
}
// draw everything to the canvas
function draw() {
    
    ctx.drawImage(ground, 0, 0);
    for (var i = 0; i < snake.length; i++) {
        ctx.fillStyle = ( i == 0 )? "green" : "white";
        ctx.fillRect(snake[i].x,snake[i].y,box,box);

        ctx.strokeStyle = "red";
        ctx.strokeRect(snake[i].x,snake[i].y,box,box);
    }
    ctx.drawImage(foodImg, food.x, food.y);

    // old head position
    var snakeX = snake[0].x;
    var snakeY = snake[0].y;

    

    // which direction
    if (d == "LEFT") snakeX -= box;
    if (d == "UP") snakeY -= box;
    if (d == "RIGHT") snakeX += box;
    if (d == "DOWN") snakeY += box;
        
    // If the snake eats the food
    if(snakeX == food.x && snakeY == food.y) {
        score++;
        eat.play();
            food = {
                x : Math.floor(Math.random()*17+1) * box,
                y : Math.floor(Math.random()*15+3) * box
            }
            // we dont remove the tail
    }else {
        // remove the tail
        snake.pop();
    }

    // Add new head
    var newHead = {
        x : snakeX,
        y : snakeY
    }
    // Game over
    if(snakeX < box || snakeX > 17 * box || snakeY < 3*box || snakeY > 17*box || collision(newHead,snake)) {
        clearInterval(game);
        dead.play();
    }


  
    snake.unshift(newHead);

    ctx.fillStyle = "white";
    ctx.font = "45px Changa one";
    ctx.fillText(score,2*box,1.6*box);
}

// call draw function every 100ms

var game = setInterval(draw, 100);

// Timer
const timeH = document.querySelector("aside");
var timeSecond = 60;

displayTime(timeSecond);

const countDown = setInterval(() => {
    timeSecond--;
    displayTime(timeSecond);
    if (timeSecond <= 0 || timeSecond < 1) {
        endTime();
        clearInterval(countDown);
    }
},1000);

function displayTime(second) {
    const min = Math.floor(second / 60);
    const sec = Math.floor(second % 60);
    timeH.innerHTML = `${min<10 ? '0': ''}${min}:${sec<10?'0':''}${sec}`
}
function endTime() {
    timeH.innerHTML = "TIME OVER";
    clearInterval(game);
    dead.play();
}
 