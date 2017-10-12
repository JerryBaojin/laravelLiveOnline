
var vue=new Vue({
    delimiters: ['[[', ']]'],
    el:'#app',
    data:{
        user:'',
      //  page:"/admin/scene/scenelist"
        page:"/admin/scene/showscenelist"
    },
    mounted:function(){
        this.user=document.cookie.split(';')[0].split('=')[1];
    },
    methods:{
        logout:function(token){
        console.log(token)
          this.$http.post('/Api/logout',{act:'logout','_token':token}).then(function (res) {
            if (parseInt(res.body)==1){
                alert('退出成功！')
                window.location=location;
            }else{
                alert('请重试！')
            }
          },function (e) {
              console.log(e)
          })
        },
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