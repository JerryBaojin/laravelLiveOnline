<html><head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="/css/main/ui.css">
    <script src="/js/vue-min.js"></script>
    <script src="/js/vue-resource.js"></script>
</head>
<body>
<div id="app">

<div id="j-search" class="pz-form pz-searchform xcy-search fn-clear">
    <span id="j-verify" class="pz-btn btn-white pz-color-green">批量通过</span>
    <span id="j-delete" class="pz-btn btn-white pz-color-red fn-ml10">批量删除</span>
</div>
<div id="j-list" class="fn-pt30 fn-pb30 fn-pl40 fn-pr40" style="display: none" v-show="loaded">
    <div class="pz-table">
        <table id="j-checktable" class="table-noborder">       <tbody>
            <tr>
                <th class="checkbox">
                    <label>
                        <input id="j-checkall" type="checkbox">
                    </label>
                </th>

                <th class="fn-textleft">现场名称</th>
                <th>评论内容</th>
                <th>用户名</th>
                <th>创建时间</th>
                <th>操作</th>

            </tr>
            <tr v-for="(v,i) in dates">
                <td class="checkbox">
                    <label data-reportid="1505203007569691">
                        <input name="id" type="checkbox" value="1505203224419348">
                    </label>
                </td>
                <td>[[v.scene]]</td>
                <td>
                    <div class="fn-w520 fn-break">[[v.content]]</div>
                </td>
                <td>[[v.name]]</td>
                <td class="fn-textcenter">[[v.creatAt]]</td>
                <td class="fn-textcenter">

                    <a v-if="v.status==0" class="j-delete pz-color-green fn-ml10" @click="deal(v.id,'pass',i,v.pid)" href="javascript:void(0)" >通过</a>
                    <a  v-if="v.status==1" class="j-delete pz-color-red fn-ml10" @click="deal(v.id,'del',i,v.pid)" href="javascript:void(0)" >删除</a>
                </td>
            </tr>
               </tbody></table>
    </div>   </div>
</div>
<script>
    new Vue({
        delimiters: ['[[', ']]'],
        el:'#app',
        data:{
            dates:'',
            loaded:false
        },
        methods:{
                deal:function (id,action,i,pid) {
                    var that=this;
                    var doNext=true;
                    if (action == 'pass'){
                        if(!confirm('确认通过吗？')){
                          doNext=false;
                        }
                    }else{
                        if(!confirm('确认删除此评论吗？')){
                            doNext=false;
                        }
                    }
                    if(doNext){
                        this.$http.post('/Api/signedCommits',{act:action,'id':id,'pid':pid,'_token':'{{csrf_token()}}'}).then(function (res) {
                            if(res.body=='1'){
                                alert('操作成功')
                                that.dates[i]['status']=1;//sysnchronization
                            }else if (res.body=='2'){
                                alert('操作成功')
                                that.dates.splice(i,1);//sysnchronization
                            }
                        },function (e) {
                            console.log(e)
                        })
                    }

                }
        },
        mounted:function () {
         this.$http.post('/Api/signedCommits',{act:'getAll','_token':'{{csrf_token()}}'}).then(function (res) {
             this.dates=eval('('+res.body+')');
             this.loaded=true;
         },function (e) {
             console.log(e)
         })
        }
    })
</script>
</body>
</html>