window.onload = function () {
    canv = document.querySelector("#canv");
    ctx = canv.getContext("2d");
    form = $('.endGame');
    box = 32;
     food = {
        x: Math.floor(Math.random() * 17 + 1) * box,
        y: Math.floor(Math.random() * 15 + 3) * box,
    };
    score = 0;
    snake = [];
    snake[0] = {
        x: 9 * box,
        y: 10 * box
    };
    dir = 0;
    document.addEventListener("keydown",direction);
    function direction(e){
        if(e.keyCode == 65 && dir != "right"){
            dir = "left";
        }
        if(e.keyCode == 68 && dir != "left"){
            dir = "right";
        }
        if(e.keyCode == 87 && dir != "down"){
            dir = "up";
        }
        if(e.keyCode == 83 && dir != "down"){
            dir = "down";
        }
    }
    start();
}

function start(){
    let background = new Image();
    background.src = "../img/start.png";
    background.onload = function(){
        ctx.drawImage(background,0,0);
        ctx.font = "50px monospace";
        ctx.fillText("Start",230,500);
    }
    canv.onclick = function(){
        gameTimer = setInterval(game,100);
    }
}
function eatTail(head,arr){
    for(let i = 0; i < arr.length; i++){
        if(head.x == arr[i].x && head.y == arr[i].y){
            clearInterval(gameTimer);
            $('.scoreGame').val(score);
            form.css("display", "block");
        }
    }
}
function game(){
    let groundGame = new Image();
    groundGame.src = "../img/bgGame.png";
    groundGame.onload = function(){
        ctx.drawImage(groundGame,0,0);
        ctx.fillStyle = "orange";
        ctx.fillRect(food.x,food.y,box,box);
        for(let i = 0; i<snake.length; i++){
            ctx.fillStyle = "red";
            ctx.fillRect(snake[i].x,snake[i].y,box,box);
        }
        ctx.fillStyle = '#fff';
        ctx.font = "50px monospace";
        ctx.fillText(score,60,50);
        let snakeX = snake[0].x;
        let snakeY = snake[0].y;
        if(snakeX < box || snakeX > box*17 || snakeY < 3 * box || snakeY > box * 17){
            clearInterval(gameTimer);
            $('.scoreGame').val(score);
            form.css("display", "block");
        }
        if(score == 5){
            clearInterval(gameTimer);
            gameTimer = setInterval(game,90);
        }
        if(score == 10){
            clearInterval(gameTimer);
            gameTimer = setInterval(game,80);
        }
        if(score == 15){
            clearInterval(gameTimer);
            gameTimer = setInterval(game,70);
        }if(score == 20){
            clearInterval(gameTimer);
            gameTimer = setInterval(game,60);
        }
        if(dir == 'left') snakeX -= box;
        if(dir == 'right') snakeX += box;
        if(dir == 'up') snakeY -= box;
        if(dir == 'down') snakeY += box;
        if(snakeX === food.x && snakeY === food.y){
            score++;
            food = {
                x: Math.floor(Math.random() * 17 + 1) * box,
                y: Math.floor(Math.random() * 15 + 3) * box,
            };
        }else{
            snake.pop();
        }
        let newHead = {
            x: snakeX,
            y: snakeY
        }
        eatTail(newHead,snake);
        snake.unshift(newHead);
        if(score == 30){
            endGame();
        }
    }
}
function pause(){

}
function endGame(){
    clearInterval(gameTimer);
    $('.scoreGame').val(score);
    form.css("display", "block");
}
$('.btn_game').click((e) => {
    e.preventDefault();

    //
    let scoreGame = $(`input[name="score"]`).val();
    console.log(scoreGame)
    $.ajax({
        url: '../server/game.php',
        type: 'POST',
        dataType: 'json',
        data:{
            score: scoreGame
        },
        success: function(data){
            console.log(12);
            document.location.href = 'game.php';
        }
    });

 });
