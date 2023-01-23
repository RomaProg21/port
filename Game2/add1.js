const App = {
    data(){
        return {
            buts:[0,1,2,3,4,5,6,7,8,9],
            inpV:'',
            operations:['+','-','*','/']
        }},
    methods:{
    inp(v){
        this.inpV=this.inpV.toString();
        this.inpV+=v;
    },
        calc(){
        this.inpV=eval(this.inpV);
        }
    }

}
const app = Vue.createApp(App)
app.mount('#app')
document.getElementById('cen').focus()