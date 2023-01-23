 let  n = (_.shuffle(_.range(1,100)).slice(0,5))

const App ={
    data(){
        return{
            vidim:false,
            x1: n[0],
            x2: n[1],
            x3: n[2],
            x4: n[3],
            x5: n[4],
            tim:0,
            btnClick:false,
            result:'',
            res:0,
            bol:false,
            nolk:false,
            tim1:5,








        }

    },
    methods: {
        modOkno() {
            this.vidim = true;
        },
        nevidim() {
            this.vidim = false;
        },
        timi() {
            let timerId = setInterval(() => this.tim++, 1000);
            setTimeout(() => {
                clearInterval(timerId);
            }, 5000);


        },
        timi1(){
            let timerId = setInterval(() => this.tim1--, 1000);
            setTimeout(() => {
                clearInterval(timerId);
            }, 6000);

        },
        resL() {
            let n =[this.x1,this.x2,this.x3,this.x4,this.x5];
            let unique = [...new Set(n)];
            if (unique.length<=4){
                unique.push(Math.floor(Math.random()*100))
            }
         let k =  this.result.split(' ');

            let unique1 = [...new Set(k)];

         for (let i=0;i<unique1.length;i++){
             for(let j=0;j<unique.length;j++){
                 if (unique1[i]==unique[j]){
                     this.res+=20;
                 }
             }
         }
            this.nolk=true;
        },
        randChislo(){
            let start = 100;
            let nums = [];
            while (start >= 0) {
                nums.push(start--);
            }

              let  ranNums = [];
              let  i = nums.length;
              let  j = 0;

            while (i--) {
                j = Math.floor(Math.random() * (i+1));
                ranNums.push(nums[j]);
                nums.splice(j,1);
            }
            console.log(ranNums)






        }
    },
    mounted(){
        this.timi();
        this.timi1();
    },
    computed:{
         className:function (){
                if(this.btnClick==true){
                    return 'opacit'
                } else {
                    return setTimeout('opaciti',5000);
                }
            },
    }
}
const app = Vue.createApp(App)
app.mount('#app');
// let x1 = Math.floor(Math.random()*100)
// console.log(x1)
document.getElementById("nw").focus();
