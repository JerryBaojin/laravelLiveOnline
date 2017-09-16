
var vue=new Vue({
    delimiters: ['[[', ']]'],
    el:'#app',
    data:{
    page:"scene/scenelist"
    },
    mounted:function(){
    console.log(165);
    },
    methods:{
       loopPage:function (e) {
           //去除其他元素的classname
           var dds=document.getElementById('j-nav').getElementsByTagName('dd');
          for (var i=0;i<=dds.length;i++){
              dds[i]=i;
              dds[i].className='';
          }
            e.target.className='current';
           this.page='/admin'+e.target.dataset.href.split('.')[0];

        }
    }
})