<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <title>新建子账号</title>
    <link rel="stylesheet" href="/css/main/ui.css">
    <script src="/js/vue-min.js"></script>
    <script src="/js/vue-resource.js"></script>
</head>
<body>
<div id="app">
<div id="j-search" class="pz-form pz-searchform xcy-search fn-clear">
    <span id="j-back" class="fn-left pz-btn btn-white" @click="back"><i class="pz-icon icon-back1"></i> 返回</span>
</div>
<div id="j-formcontain" class="fn-pl40 fn-pr40 fn-pt30 fn-pb30 fn-clear">
    <div class="pz-form">
        <form id="j-editform">
            {{csrf_field()}}
            <div class="wrap fn-clear">
                <div class="group2">
                    <div class="row xcy-row">
                        <div class="row-title">账号</div>
                        <div class="row-content" data-field="mobile"><input v-model="phone"  type="text" maxlength="11" name="mobile" class="fn-rate50" required="" placeholder="请输入手机号"></div>
                    </div>
                    <div class="row xcy-row j-row-hasPwd" v-if="!show || cpwd">
                        <div class="row-title">修改密码</div>
                        <div class="row-content" data-field="hasPwd">
                            <div>
                                <label>
                                    <input  required="" v-model="a" type="radio" name="hasPwd" value="0" checked=""> 不修改密码
                                </label>
                                <label>
                                    <input type="radio" v-model="a" name="hasPwd" value="1"> 修改密码
                                </label>

                            </div>
                        </div>
                    </div>

                    <div v-if="show" class="row xcy-row j-row-userPwd">
                        <div class="row-title">密码</div>
                        <div class="row-content" data-field="password"><input @focus="clear"  required="" type="password" maxlength="20" name="password" class="fn-rate50" placeholder="请输入6-20位字符"></div>
                    </div>
                    <div v-if="show" class="row xcy-row j-row-userPwd2">
                        <div class="row-title">确认密码</div>
                        <div class="row-content" data-field="password2"><input @focus="clear"  required="" type="password" maxlength="20" name="password2" class="fn-rate50" placeholder="请输入6-20位字符"></div>
                        [[notSame]]

                    </div>

                </div>
                <div class="group2 fn-pl40">
                    <div class="row xcy-row">
                        <div class="row-title">姓名</div>
                        <div class="row-content" data-field="nick"><input @focus="clear" v-model="name"  type="text" required="" maxlength="16" name="nick" class="fn-rate50" required="" placeholder="请输入姓名"></div>
                    </div>
                    <div class="row xcy-row">
                        <div class="row-title">角色</div>
                        <div class="row-content" data-field="role"><select @focus="clear" v-model="role"  required="" name="role"><option value="approver">编辑人员</option><option value="director">导播员</option><option value="reporter">记者</option></select></div>
                    </div>
                </div>
            </div>
            <div class="actions actions-transparent fn-pt20 fn-pb20">
                <input  @click="submit($event)" class="pz-btn btn-success btn-big" value="确 定">
            </div>

        </form>
    </div>
</div>
</div>
<script>
   var vue= new Vue({
        delimiters: ['[[', ']]'],
        el:'#app',
        data:{
            notSame:'',
            show:true,
            a:0,
            phone:'',
            name:'',
            role:'director',
            cpwd:false,
            p:'',
            swtichTag:false
        },
       watch:{
           a:function (newvalue,old) {
               console.log(newvalue);
               if (newvalue=='1'){
                   this.cpwd=true;
                   this.show=true;
               }else{
                   this.cpwd=true;
                   this.show=false;
               }
           }
       },
       methods:{
            back:function () {
                window.history.go(-1)
            },
            clear:function () {
              this.notSame=''
            },
            submit:function (e) {
                var tag=document.getElementById('j-editform');
                e.preventDefault();
                if(this.swtichTag){
                    var dates=new FormData(tag);
                    dates.append('act','editInfo');
                    dates.append('id',parseInt(this.p))
                    this.$http.post('/Api/setAUser',dates).then(function (res) {
                      var dates=eval('('+res.body+')');
                     switch (dates.status){
                         case 6:
                             alert('成功!')
                             window.history.go(-1);
                             break;
                         case 2:
                             alert("请重新提交!");
                             break;
                         case 0:
                             alert('俩次输入的密码不一致!');

                     }
                    },function (e) {
                        console.log(e)
                    })
                }else{
                    this.$http.post('/Api/addUser',new FormData(tag)).then(function (res) {
                        var dates=eval('('+res.body+')');
                        switch (dates.status){
                            case 0:
                                alert('输入不能有空');
                                break;
                            case 1:
                                this.notSame='俩次密码不一致！'
                                break;
                            case 6:
                                alert("添加成功！");
                                tag.reset();
                                break;
                            case 7:
                                alert("请重试！");
                                break;

                        }
                    },function (e) {
                        console.log(e)
                    })
                }
            },

        },
       mounted:function () {
            var vm=this;
           var p=parent.document.getElementById('inframe').dataset.userid;
           this.p=p
           //获取到了 马上销毁
           parent.document.getElementById('inframe').dataset.userid='';
           if (p){
               this.show=false;
               this.swtichTag=true;
               this.$http.post('/Api/getAUser',{'id':p,'_token':'{{csrf_token()}}','act':'getAdminUsers'}).then(function (res) {
                   var dates=eval('('+res.body+')');
                  vm.name=dates[0]['name'];
                  vm.phone=dates[0]['count']
                   vm.role=dates[0]['role']
               },function (e) {
                   console.log(e)
               })
           }else{
               this.show=true;
           }
           //获取信息
       }
    })
</script>


</body></html>