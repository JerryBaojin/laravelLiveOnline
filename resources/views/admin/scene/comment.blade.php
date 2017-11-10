<!--suppress ALL -->
<html><head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="/css/main/ui.css">
    <script src="/js/vue-min.js"></script>
    <script src="/js/vue-resource.js"></script>
</head>
<style>
    body{
        font-family:"Segoe UI";
    }
    li{
        list-style:none;
    }
    a{
        text-decoration:none;
    }
    .pagination {
        position: relative;

    }
    .pagination li{
        display: inline-block;
        margin:0 5px;
    }
    .pagination li a{
        padding:.5rem 1rem;
        display:inline-block;
        border:1px solid #ddd;
        background:#fff;

        color:#0E90D2;
    }
    .pagination li a:hover{
        background:#eee;
    }
    .pagination li.active a{
        background:#0E90D2;
        color:#fff;
    }
</style>
<body>
<div id="app">

<div id="j-search" class="pz-form pz-searchform xcy-search fn-clear">
    <span id="j-verify" class="pz-btn btn-white pz-color-green" @click="delParts('passParts')">批量通过</span>
    <span id="j-delete" class="pz-btn btn-white pz-color-red fn-ml10" @click="delParts('delParts')">批量删除</span>
</div>
<div id="j-list" class="fn-pt30 fn-pb30 fn-pl40 fn-pr40" style="display: none" v-show="loaded">
    <div class="pz-table">
        <table id="j-checktable" class="table-noborder">       <tbody>
            <tr>
                <th class="checkbox">
                    <label>
                        <input id="j-checkall" type="checkbox" v-model="checkAll">
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
                    <label >
                        <input name="id" type="checkbox" v-model="selected" :value="v.aindex">
                    </label>
                </td>
                <td>[[v.scene]]</td>
                <td>
                    <div class="fn-w520 fn-break">[[v.content]]</div>
                </td>
                <td>[[v.name]]</td>
                <td class="fn-textcenter">[[v.creatAt]]</td>
                <td class="fn-textcenter">
                    <a v-if="v.status==0" class="j-delete pz-color-green fn-ml10" @click="deal(v.id,'pass',v.aindex,v.pid)" href="javascript:void(0)" >通过</a>
                    <a  v-if="v.status==1" class="j-delete pz-color-red fn-ml10" @click="deal(v.id,'del',v.aindex,v.pid)" href="javascript:void(0)" >删除</a>
                </td>
            </tr>
               </tbody></table>

    </div>
    <page></page>
</div>
</div>
<script type="text/x-template" id="page">
    <ul class="pagination" style="text-align: center" >
        <li v-show="current != 1" @click="current-- && goto(current)" ><a href="#">上一页</a></li>
        <li v-for="index in pages" @click="goto(index)" :class="{'active':current == index}" :key="index">
            <a href="#" >[[index]]</a>
        </li>
        <li v-show="allpage != current && allpage != 0 " @click="current++ && goto(current++)"><a href="#" >下一页</a></li>
    </ul>
</script>
<script>
    var vm=new Vue({
        delimiters: ['[[', ']]'],
        el:'#app',
        data:{
            dates:new Array(),
            loaded:false,
            allDates:'',
            selected:[],
            allPage:0,
        },
        computed:{
          checkAll:{
              get:function (v) {
                  return this.dates ? this.selected.length == this.dates.length : false;
              },
              set:function(value){
                    var selected=[];
                    if (value){
                        this.dates.forEach(function (index) {
                            selected.push(index.aindex)
                        })
                    }
                    this.selected=selected;
              }
          }
        },
        methods:{
                delParts:function (act) {
                    var that=this;
                    var info;
                    act=='pass'?info="确认删除所选中的评论吗？":info="确认通过所选中的评论吗？";
                    if (this.selected.length==0){
                        return false
                    }else{
                        this.selected.map(function (a,i) {
                            that.selected[i]=that.allDates[a]['id']
                        })
                        if (confirm(info))
                            this.$http.post('/Api/signedCommits',{act:act,'dates':JSON.stringify(this.selected),'_token':'{{csrf_token()}}'}).then(function (res) {
                                if(res.body=='1'){
                                    //如果是删除 就直接重新载入页面
                                    if (act=='delParts'){
                                        alert('操作成功')
                                        parent.document.getElementById('inframe').src="/admin/scene/comment";
                                    }

                                }else if(act=='passParts'){
                                    alert('操作成功');
                                    parent.document.getElementById('inframe').src="/admin/scene/comment";
                                }else{
                                    alert('操作失败，请重试！')
                                }
                            },function (e) {
                                console.log(e)
                            })
                    }
                },
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
             console.log(res);
             this.allDates=JSON.parse(res.body);
             this.allPage=Math.ceil(this.allDates.length/10);

             this.loaded=true;
         },function (e) {
             console.log(e)
         })
        }
    })
    Vue.component("page", {
            delimiters: ['[[', ']]'],
            template: "#page",
            data: function () {
                return {
                    current: 1,
                    showItem: 10,
                    allpage: 13,
                    from: 0,
                    logo:null
                }
            },
            watch:{
              current(a,o){
                  var that=this;
                if (a!=1)
                {
                   this.from=(this.current-1)*10;
                }else if(a==1){
                    this.from=0;
                }
                this.changeDetails();
              }
            },
            computed: {
                pages: function () {
                    vm.selected=[];
                    var pag = [];
                    if (this.current < this.showItem) { //如果当前的激活的项 小于要显示的条数
                        //总页数和要显示的条数那个大就显示多少条
                        var i = Math.min(this.showItem, this.allpage);
                        while (i) {
                            pag.unshift(i--);
                        }
                    } else { //当前页数大于显示页数了
                        var middle = this.current - Math.floor(this.showItem / 2),//从哪里开始
                            i = this.showItem;
                        if (middle > (this.allpage - this.showItem)) {
                            middle = (this.allpage - this.showItem) + 1
                        }
                        while (i--) {
                            pag.push(middle++);
                        }
                    }
                    return pag
                }
            },
            methods: {
                goto: function (index) {
                    this.logo=index;
                    if (index==this.allpage){
                        vm.allDates.length==vm.allPage*10?'':this.showItem=vm.allDates.length-(index-1)*10;
                    }
                    if (index == this.current) return;
                    this.current = index;
                    //这里可以发送ajax请求
                },
                changeDetails:function () {
                    var p=9;
                    if (this.logo==this.allpage){
                        vm.allDates.length==vm.allPage*10?'':p=vm.allDates.length-(this.logo-1)*10-1;
                    }
                    var begin = this.from;
                    var to;
                    this.allpage!=1?to = this.from + p:to=vm.allDates.length-1;
                    vm.allDates.map(function (v, i, a) {
                        vm.allDates[i]['aindex'] = i;
                    });
                vm.dates.length!=0?vm.dates.splice(0,vm.dates.length):'';
                    for (var x = begin; x <=to; x++) {
                        vm.dates.push(vm.allDates[x]);
                    }
                }
            },
            mounted: function () {
                //刷新时重置多选
                    this.allpage=vm.allPage;
                    this.changeDetails();
            }
        }
    )
</script>
</body>
</html>