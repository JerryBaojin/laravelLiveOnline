<!doctype html>
<html><head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>内部账号管理</title>
    <link rel="stylesheet" href="/css/main/ui.css">
    <script src="/js/vue-min.js"></script>
    <script src="/js/vue-resource.js"></script>
</head>
<body>
<div id="app">

<div id="j-search" class="pz-form pz-searchform xcy-search fn-clear">
    <div class="row-content" data-field="keyword">
        <input type="text" id="j-keyword" name="keyword" class="input-search" placeholder="请输入账号/姓名">
    </div>
    <div class="actions">
        <input id="j-searchbtn" type="button" class="pz-btn pz-icon btn-search" value="">
    </div>
    <span id="j-add" @click="creatCount" class="fn-right pz-btn btn-success"><i class="pz-icon icon-add"></i> 新建子账号</span>
</div>
<div id="j-list" class="fn-pt30 fn-pb30 fn-pl40 fn-pr40">
    <div class="pz-table">
        <table class="table-noborder">
            <tbody>
            <tr>
                <th>子账号</th>
                <th>姓名</th>
                <th>角色</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
            <tr v-for="(item,index) in arrs">
                <td class="fn-textcenter">[[item.count]]</td>
                <td class="fn-textcenter">[[item.name]]</td>
                <td class="fn-textcenter">[[item.role]]</td>
                <td class="fn-textcenter">[[item.createtime]]</td>
                <td class="fn-textcenter">
                    <a class="j-stop pz-color-red" href="javascript:void(0)" @click="ban(item.id)">禁用</a>
                    <a class="j-edit fn-ml15" href="javascript:void(0)" @click="edit(item.id)">编辑</a>
                    <a class="j-delete fn-ml15 pz-color-red" href="javascript:void(0)" @click="del(item.id)">删除</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    </div>
</div>
<script>
    new Vue({
        delimiters: ['[[', ']]'],
        el:'#app',
        data:{
          arrs:'',
            test:'1'
        },
        methods:{
            creatCount:function () {
                parent.document.getElementById('inframe').src="/admin/org/accedit"
            },
            ban:function (id) {
                console.log(id)
            },
            edit:function (id) {
                console.log(id)
            },
            del:function (id) {
                console.log(id)
            }
        },
        mounted:function () {
            this.$http.post('/Api/getAUser',{'act':'getAdminUsers','_token':'{{csrf_token()}}'}).then(function (res) {
                    var arrs=eval('('+res.body+')');
                    arrs.map(function (item,index) {
                        switch (item.role){
                            case 'approver':
                                arrs[index]['role']='编辑人员'
                                break;
                            case 'director':
                                arrs[index]['role']='导播员'
                                break;
                            case 'reporter':
                                arrs[index]['role']='记者'
                                break;
                            default:
                                arrs[index]['role']='编辑人员'
                        }

                    })
                this.arrs=arrs
            },function (e) {
                console.log(e)
            })
        }
    })
</script>

</body></html>