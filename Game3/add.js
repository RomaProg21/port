
const App={
    data(){
        return {
            dif:3,
            dif_max:10,
            game_speed:3000,
            mass:[],
            num:25,
            timeOt:false,
            FIELD:{
                EMPTY:0,
                FILLED:1,
            },
            GAME_STATUS:{
                NONE:0,
                PREVIEW:1,
                STARTED:2,
                WIN:3,
                FAIL:4
            },
            gameStatus:0,
            st:true,
            n:0,
            timeWin:false,
            scoped:0,
            psr:false,
            inputValue:'',
            infK:false,
        }
    },
    methods:{
        init(){
            this.mass= [];
            for(let i =0;i<this.num;i++){
                this.mass.push({
                    id: i,
                    clicked:false,
                    value:this.FIELD.EMPTY,
                    click:0,
                })
            }

        },
        start(){
            this.init();
            this.prepareGame();
            // setTimeout(this.init,3000)


        },
        prepareGame(){
            this.gameStatus= this.GAME_STATUS.PREVIEW;
            this.timeOt=true;
            for (let i=0;i<this.dif;i++){
                const index = this.randGet(0,this.num-1);
                if(this.mass[index].value!==this.FIELD.FILLED){
                    this.mass[index].value=this.FIELD.FILLED;
                } else {
                    i--;
                }
            }
            setTimeout(()=>{this.timeOt=false;
                this.gameStatus=this.GAME_STATUS.STARTED;
                },this.game_speed)


        },
        randGet(min,max){
            return Math.floor(Math.random()*(max-min)+min);
        },
        statBtn(){
           if (this.gameStatus!==this.GAME_STATUS.PREVIEW){
               return false
           }
        },
        select(id){
            this.mass[id].click++;
            if (this.gameStatus===this.GAME_STATUS.STARTED) {
                //  for(let i =0;i<this.num;i++){
                // if (this.mass[i].value>0){
                //   this.mass[i].clicked = true;

                if (this.mass[id].value > 0 && this.mass[id].click===1) {
                    this.mass[id].clicked = true;
                    this.n = this.n + 1;
                }
                if (this.mass[id].clicked === false) {
                    this.st = false;
                    this.gameOver()
                    return this.st;

                }
                this.gameWin()
            }





        },
        gameOver(){
            this.gameStatus=this.GAME_STATUS.FAIL;
            // for (let i=0;i<this.num;i++){
            //     this.mass[i].click = 0;
            // }

            this.psr=true;
            this.timeLose();
            setTimeout(()=>{
                this.psr=false;
            },1000)


            this.dif=3;
            // setTimeout(()=>{
            //     window.location.reload()
            // },3000)
        },
        gameWin(){
            if  ( this.n>=this.dif) {
                if (this.game_speed > 400) {
                    this.game_speed = this.game_speed - 150;
                    this.gameStatus = this.GAME_STATUS.WIN;
                    this.n = 0;
                    this.timeSec()
                    setTimeout(() => {
                        this.dif++;
                    }, 1000)
                    if (this.scoped < this.dif) {
                        this.scoped = this.dif
                    }
                } else {
                    this.game_speed = 350;
                    this.gameStatus = this.GAME_STATUS.WIN;
                    this.n = 0;
                    this.timeSec()
                    setTimeout(() => {
                        this.dif++;
                    }, 1000)
                    if (this.scoped < this.dif) {
                        this.scoped = this.dif
                    }
                }
            }



        },
        timeSec(){
            this.timeWin=true;
            setTimeout(()=>{
                this.timeWin=false;
                this.start();

            },3000)
        },
        timeLose(){
            this.game_speed=3000;
            this.timeWin=true;
            // this.timeWin=false;
            // this.start();
            setTimeout(()=>{
                this.n=0;
                this.timeWin=false;
                this.start();

            },999)

        },
        inpVal(){
            if(this.inputValue.toLowerCase()=='разработчик'){
                this.infK=true;
            }

        }
    },
    mounted(){
        this.init()
        this.statBtn()

    },





}
const app = Vue.createApp(App)
app.mount('#app');
