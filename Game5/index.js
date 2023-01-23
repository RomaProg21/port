const App = {
    data(){
        return {
            canvas:null,
            ctx:null,
            x:0,
            y:0,
            bol:false,
            points:[],
            widn:1,
            bol1:false,
            infVid:false,
            but:'',
            ValueBoolean:false,
            point:' easiest',
            colors:['red','orange','yellow','green','blue','purple','teal','indigo','black'],
            objcolor:{
                0:'red',
                1:'orange',
                2:'yellow',
                3:'green',
                4:'blue',
                5:'purple',
                6:'tean',
                7:'indigo'

            },
            strok:"rgba(0,0,0,1)",
        }

    },
    mounted(){
        this.canvas = this.$refs.canvas
        this.ctx = this.canvas.getContext('2d');
        this.canvas.addEventListener('mousedown',this.mousedown)
        this.canvas.addEventListener('mousemove',this.mousemove)
        document.addEventListener('mouseup',this.mouseup)



    },
    methods:{
        mousedown(event) {
            let rect = this.canvas.getBoundingClientRect();
            let x = event.clientX - rect.left;
            let y = event.clientY - rect.top;
            this.bol = true;
            this.x = x;
            this.y = y;
            this.points.push({
                x: x,
                y: y
            });
        },
        mousemove(event) {
            let rect = this.canvas.getBoundingClientRect();
            let x = event.clientX - rect.left;
            let y = event.clientY - rect.top;
            if (this.bol) {
                this.ctx.beginPath();
                this.ctx.moveTo(this.x, this.y);
                this.ctx.lineTo(x, y);
                this.ctx.lineWidth = this.widn;
                this.ctx.lineCap = 'round';
                this.ctx.strokeStyle = this.strok;
                this.ctx.stroke();


                this.x = x;
                this.y = y;
                this.points.push({
                    x: x,
                    y: y
                });
            }
        },
        mouseup(event){
            this.bol= false;
            if (this.points.length>0 ) {
                localStorage['points'] = JSON.stringify(this.points);

            }
            },
        reset(){
            this.canvas.width = this.canvas.width;
            this.points.length = 0;

        },
        save(){
            let dataURL = this.canvas.toDataURL();
            let img = this.$refs.img;
            img.src =dataURL;
        },
        replay(){
            var vm = this
            vm.canvas.width= vm.canvas.width;
            if(vm.points.length === 0){
                if (localStorage['points'] !== undefined){
                    vm.points = JSON.parse(localStorage['points']);
                }
            }
            var point = 1;
            setInterval(function (){
                drawNextPoint(point);
                point+=1;
            },10);

            function drawNextPoint(index){
                if (index>= vm.points.length){
                    return;
                }
                let startX = vm.points[index-1].x;
                let startY = vm.points[index-1].y;
                let x =vm.points[index].x;
                let y = vm.points[index].y;
                vm.ctx.beginPath();
                vm.ctx.moveTo(startX,startY);
                vm.ctx.lineTo(x,y);
                vm.ctx.linewidth = 1 ;
                vm.ctx.lineCap = 'round';
                vm.ctx.strokeStyle = 'rgba(0,0,0,1)';
                vm.ctx.stroke();


            }
        },
        draw(){
            this.bol1=true;
            this.ctx.globalCompositeOperation= 'destination-out';
            this.widn = 10;
            this.ctx.fillStyle='rgba(255,255,255,1)';


        },
        mal(){
            this.ctx.globalCompositeOperation= 'destination-out';
            this.widn = 5;
            this.ctx.fillStyle='rgba(255,255,255,1)'
            this.bol1=false;
            this.but = 'Маленькая'

        },
        sr(){
            this.ctx.globalCompositeOperation= 'destination-out';
            this.widn = 15;
            this.ctx.fillStyle='rgba(255,255,255,1)';
            this.bol1=false;
            this.but = 'Средняя'



        },
        big(){
            this.ctx.globalCompositeOperation= 'destination-out';
            this.widn= 30;
            this.ctx.fillStyle='rgba(255,255,255,1)';
            this.bol1=false;
            this.but = 'Большая';



        },
        ris(){
            this.widn=1;
            this.ctx.globalCompositeOperation = "source-over";
            this.ValueBoolean = true;
            this.point = 'easiest'

        },
        mal1(){
            this.widn = 5;
            this.ValueBoolean = false;
            this.point = 'Min'

        },
        sr1(){
            this.widn = 15;
            this.ValueBoolean = false;
            this.point = 'Medium'



        },
        big1(){
            this.widn= 30;
            this.ValueBoolean = false;
            this.point = 'High'
        },
        clkColor(index){
            this.strok = this.colors[index]
        }









    }

}
const app = Vue.createApp(App);
app.mount('#app')