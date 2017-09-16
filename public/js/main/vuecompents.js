
var vue=new Vue({
    delimiters: ['[[', ']]'],
    el:'#app',
    data:{
    page:"admin/scene/scenelist"
    },
    mounted:function(){
    console.log(165);
    },
    methods:{
       loopPage:function (e) {
           console.log(this);
           this.page='admin'+e.target.dataset.href.split('.')[0];
           console.log(this.page);
        }
    }
})