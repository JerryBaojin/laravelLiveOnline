
var vue=new Vue({
    delimiters: ['[[', ']]'],
    el:'#app',
    data:{
        test:'test',
        page:"/admin/scene/scenelist"
    },
    mounted:function(){

    },
    methods:{
       loopPage:function (e) {
           var dds=document.getElementById('j-nav').getElementsByTagName('dd');
          for (var i=0;i<dds.length;i++){
              dds[i]=i;
            dds[i].className='';
          }
            e.target.className='current';
           this.page='/admin'+e.target.dataset.href.split('.')[0];
        },
        editUser:function (e) {

       if (e.target.dataset.href=='logout'){

            function clearCookie(){
                var keys=document.cookie.match(/[^ =;]+(?=\=)/g);
                if (keys) {
                    for (var i = keys.length; i--;)
                        document.cookie=keys[i]+'=0;expires=' + new Date( 0).toUTCString()
                }
            }
            clearCookie();
       }else{
           this.page='/admin'+e.target.dataset.href.split('.')[0];
       }

        }
    }
})