<!doctype html>
<html><head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>修改密码</title>
    <link rel="stylesheet" href="/css/main/ui.css">
    <script src="/js/vue-min.js"></script>
    <script src="/js/vue-resource.js"></script>
</head>
<body>
<div id="app">


<div class="fn-pl40 fn-pr40 fn-pt30 fn-pb30 fn-clear">
    <div class="pz-form">
        <form id="j-editform">
            {{csrf_field()}}
            <div class="wrap fn-clear">
                <div class="group2">
                    <div class="row xcy-row">
                        <div class="row-title">原始密码</div>
                        <div class="row-content" data-field="ypw"><input @focus="clear"  type="password" maxlength="20" name="ypw" class="fn-rate50" required="" placeholder="请输入原始密码"></div>
                        [[wrong]]
                    </div>
                    <div class="row xcy-row">
                        <div class="row-title">修改密码</div>
                        <div class="row-content" data-field="xpw"><input  @focus="clear" type="password" maxlength="20" name="xpw" class="fn-rate50" required="" placeholder="请输入6-20位字符"></div>
                    </div>
                    <div class="row xcy-row">
                        <div class="row-title">确认密码</div>
                        <div class="row-content" data-field="qrpw"><input @focus="clear"  type="password" maxlength="20" name="qrpw" class="fn-rate50" required="" placeholder="请输入6-20位字符"></div>
                    [[notSame]]
                    </div>
                </div>
                <div class="group2"></div>
            </div>
            <div class="actions actions-transparent fn-pt20">
                <input type="submit"  @click="submit($event)" class="pz-btn btn-success btn-big" value="保存修改">
            </div>
        </form>
    </div>
</div>
</div>
<script src="/js/jq.min.js"></script>
<script>

    vue=new Vue({
        delimiters: ['[[', ']]'],
        el:'#app',
        data:{
          wrong:'',
          notSame:''
        },
        methods:{
            clear:function () {
              this.wrong='';
              this.notSame='';
            },
            submit:function (e) {
                //暂时未对表单验证
                e.preventDefault();
                var tag=document.getElementById('j-editform');
                var vm=this;
                var dates=new FormData(tag);

                this.$http.post('/Api/changePwd',dates).then(function (res) {
                    var result=eval('('+res.body+')');
                    switch (result['status']){
                        case 1:
                           vm.wrong="密码错误";
                           break;
                        case 0:
                            vm.notSame="俩次输入的密码不一致"
                            break;
                        case 5:
                            alert("请重试");
                            break;
                        case 6:
                            alert("修改成功!");
                            parent.window.location="/admin/login";
                            //arent.document.getElementById('inframe').src="adminlogin"
                    }
                },function (error) {
                    console.log(error)
                })
            }

        }
    })

</script>

</body></html>