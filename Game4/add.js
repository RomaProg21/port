const canvas = document.getElementById('game');
const ctx= canvas.getContext('2d');
const ground= new Image();
ground.src='bg.png';
const food= new Image();
food.src='bg1.png';
let box =50;

let score =0;
let fd ={
    x:Math.floor(Math.random()*12 + 1) * box,
    y:Math.floor(Math.random()*10 + 1) * box,
}
let snake =[];
snake[0] ={
     x:7 * box,
     y:5 * box,
}
        document.addEventListener('keydown',diraction);
let dir;
function diraction (event){
    if (event.keyCode==37 && dir!='right'){
        dir ='left';
    } else if(event.keyCode==38 && dir!='down') {
        dir='up';
    } else if(event.keyCode==39 && dir!='left') {
        dir='right';
    } else if(event.keyCode==40 && dir!='up') {
        dir='down';
    }

}
function drawGame(){
    ctx.drawImage(ground,0,0);
    ctx.drawImage(food,fd.x,fd.y);
    for (let i=0;i<snake.length;i++){
        ctx.fillStyle = i==0 ?'green' : 'white';
        ctx.fillRect(snake[i].x,snake[i].y,box,box);
    }
    let snakeX = snake[0].x;
    let snakeY = snake[0].y;
    if (snakeX == fd.x && snakeY == fd.y){
        fd ={
            x:Math.floor(Math.random()*12 + 1) * box,
            y:Math.floor(Math.random()*10 + 1) * box,
        }



    } else {
        snake.pop(); }
        if(snakeX< box ||  snakeX > box *12 || snakeY < 1 *box || snakeY> box*10){
            clearInterval(game);
        }
    if (dir == 'left') {snakeX -=box;}
    if (dir == 'right'){snakeX+=box;}
    if (dir == 'up'){snakeY-=box;}
    if (dir == 'down'){snakeY+=box;}
    let newHead ={
        x:snakeX,
        y:snakeY
    };
    snake.unshift(newHead)

}
let game = setInterval(drawGame,190);
const App= {
    data() {
        return {


        }
    },
    methods: {






        },
    mounted(){
    }


}


const app = Vue.createApp(App)
app.mount('#app');
