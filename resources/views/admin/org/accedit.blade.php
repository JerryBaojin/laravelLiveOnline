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
                        <div class="row-content" data-field="mobile"><input  type="text" maxlength="11" name="mobile" class="fn-rate50" required="" placeholder="请输入手机号"></div>
                    </div>
                    <div class="row xcy-row j-row-hasPwd" style="display: none;">
                        <div class="row-title">修改密码</div>
                        <div class="row-content" data-field="hasPwd"><div><label><input  required="" type="radio" name="hasPwd" value="0" checked=""> 不修改密码</label><label><input type="radio" name="hasPwd" value="1"> 修改密码</label></div></div>
                    </div>
                    <div class="row xcy-row j-row-userPwd">
                        <div class="row-title">密码</div>
                        <div class="row-content" data-field="password"><input @focus="clear"  required="" type="password" maxlength="20" name="password" class="fn-rate50" placeholder="请输入6-20位字符"></div>
                    </div>
                    <div class="row xcy-row j-row-userPwd2">
                        <div class="row-title">确认密码</div>
                        <div class="row-content" data-field="password2"><input @focus="clear"  required="" type="password" maxlength="20" name="password2" class="fn-rate50" placeholder="请输入6-20位字符"></div>
                        [[notSame]]

                    </div>
                </div>
                <div class="group2 fn-pl40">
                    <div class="row xcy-row">
                        <div class="row-title">姓名</div>
                        <div class="row-content" data-field="nick"><input @focus="clear" type="text" required="" maxlength="16" name="nick" class="fn-rate50" required="" placeholder="请输入姓名"></div>
                    </div>
                    <div class="row xcy-row">
                        <div class="row-title">角色</div>
                        <div class="row-content" data-field="role"><select @focus="clear"  required="" name="role"><option value="approver">编辑人员</option><option value="director">导播员</option><option value="reporter">记者</option></select></div>
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
    new Vue({
        delimiters: ['[[', ']]'],
        el:'#app',
        data:{
            notSame:''
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
                            break;
                        case 7:
                           alert("请重试！");
                            break;

                    }
                },function (e) {
                    console.log(e)
                })
            }
        }
    })
</script>

</body></html>