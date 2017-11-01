<html><head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>数据统计</title>
    <link rel="stylesheet" href="/css/main/ui.css">
    <link rel="stylesheet" href="/css/main/chart.css">
    <script src="/js/vue-min.js"></script>
    <script src="/js/vue-resource.js"></script>
</head>
<body class="pz-contain">
<!--
<div class="fn-clear fn-pd20">
  <div class="pz-form pz-searchform fn-right">
    <form id="j-searchform">
    <div class="row-content" data-field="key"></div>
    <div class="actions">
      <input type="submit" class="pz-btn btn-warn pz-icon" value="&#xe6ad;">
    </div>
    </form>
  </div>
</div>
-->
<div id="app">
<div class="pz-boxhead">
    <em class="icon pz-icon icon-table"></em>
    <span class="title">直播统计</span>

</div>
<div class="fn-pb30">
    <div id="j-list" class="pz-table">
        <table class="table-noborder">
            <tbody><tr>
                <th>ID</th>
                <th>直播标题</th>
                <th>创建时间</th>
                <th>用户量(UV)</th>
                <th>访问量(PV)</th>
                <th>报道数</th>
                <th>评论数</th>

                <th>报道来源</th>
                <th>用户来源</th>
            </tr>
            <tr v-for="(v,index) in list">
                <td>[[v.pid]]</td>
                <td>[[v.title]]<p class="fn-color-gray">类型：[[v.type=='4'?"视频现场":"直播现场"]]</p></td>
                <td class="fn-textcenter">[[v.createAt]]</td>
                <td class="fn-textcenter">0</td>
                <td class="fn-textcenter">[[v.viewCount]]</td>
                <td class="fn-textcenter">[[v.reports]]</td>
                <td class="fn-textcenter">[[v.Ccommits]]</td>

                <td class="fn-textcenter">记者：0<br>用户：0</td>
                <td class="fn-textcenter">APP：0<br>微信：0<br>微博：0</td>
            </tr>
          </tbody>
        </table>
    </div>

</div>
</div>
<script>
    new Vue({
        delimiters:['[[', ']]'],
        el:'#app',
        data:{
          list:''
        },
        mounted:function () {
            var that=this;
            this.$http.post('/Api/getCount',{act:'a','_token':'{{csrf_token()}}'}).then(function (res) {
                that.list=JSON.parse(res.body);
                console.log(that.list);
            },function (e) {

            })
        }
    })
</script>

</body></html>