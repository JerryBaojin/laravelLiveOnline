<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>现场管理</title>
    <link rel="stylesheet" href="/css/main/ui.css">
    <script src="/js/vue-min.js"></script>
    <script src="/js/vue-resource.js"></script>
</head>
<body>
<div id="app">
<div id="j-search" class="pz-form pz-searchform xcy-search fn-clear">
    <div class="row-content" data-field="keyword">
        <input type="text" id="j-keyword" name="keyword" class="input-search" placeholder="请输入标题关键字">
    </div>
    <div class="actions">
        <input id="j-searchbtn" type="button" class="pz-btn pz-icon btn-search" value="">
    </div>
    <span id="j-cardmode" class="fn-left pz-btn btn-transparent fn-ml30"><i class="pz-icon icon-viewgallery"></i> 卡片模式</span>
    <span id="j-listmode" class="fn-left pz-btn btn-transparent fn-ml30 fn-hide"><i class="pz-icon icon-viewlist"></i> 列表模式</span>
    <div id="j-ordertime" class="fn-left pz-btn btn-transparent label-normal fn-ml30">
        创建时间
        <span class="pz-sort"></span>
    </div>
    <div class="row-content fn-ml30">
        <select id="j-state">
            <option value="0">全部现场</option>
            <option value="1">待审现场</option>
            <option value="16">直播中</option>
            <option value="32">直播结束</option>
            <option value="64">回收站</option>
        </select>
    </div>
    <span id="j-copy" class="fn-right pz-btn btn-white zeroclipboard-is-hover" data-clipboard-text="http://t.cn/RoTCXHC"><i class="pz-icon icon-copy"></i> 复制现场列表</span>
</div>
<div id="j-card" class="xcy-card fn-pt30 fn-pb30 fn-pl40 fn-clear">
    <ul>
        <li v-for="(item,index) in scenLists ">

            <div class="picbar">
                <div class="j-edit pic" data-id=" [[item.id]]"><img :src="www.oa.com/[[item.coverPic]]"></div>
                <span class="top j-stick" @click="setTop(item.id)"><i class="pz-icon icon-top"></i> 置顶</span><span class="j-reportnum top topnum" >[[item.reports]]条报道</span>
                <div class="title fn-ellipsis">[[item.title]]</div>
            </div>
            <div class="action fn-clear">
                <span class="pz-label label-normal fn-left fn-ellipsis creater"><i class="pz-icon icon-account"></i> [[item]]</span>
                <span class="pz-label label-normal fn-left fn-pl0 fn-pr0"><i class="pz-icon icon-clock"></i>[[item.createAt]]</span>
                <a class="j-view" href="javascript:void(0)" data-id="150574775309060" data-creater="大海" data-poster="https://xcycdn.zhongguowangshi.com/live-img/20170918/1505747709152_87.jpeg" data-url="rtmp://xinhualive.zhongguowangshi.com/zbcb/150574775309060?auth_key=1537283753-0-0-176452a1c3e0d1da06607e9700f613c7" data-streamstate="1">预览</a>
                <a class="j-stop" href="javascript:void(0)" data-id="150574775309060">结束现场</a>
            </div>
        </li>
    </ul>
</div>
<div id="j-list" class="fn-pt30 fn-pb30 fn-pl40 fn-pr40 fn-hide">

</div>
</div>
<script>
var list=new Vue({
    delimiters: ['[[', ']]'],
    el:'#app',
    data:{
        scenLists:null
    },
    created:function () {
        this.$http.post('/Api/scenelist',{act:"getList",'_token':'{{csrf_token()}}'}).then(function (res) {
            this.scenLists=eval(res.body);
        },function (error) {
            console.log(error);
        })


    }


})
</script>


<script type="text/template" id="j-overlay-view">
    <div class="pz-boxhead fn-w520">
        <em class="icon pz-icon icon-warning"></em>
        <span class="title">现场直播画面预览</span>
        <span class="close j-overlay-close">
    <em class="pz-icon icon-close"></em>
  </span>
    </div>
    <div class="pz-boxbody fn-w520">
        <div class="pz-form">
            <div class="wrap fn-pd20 fn-fs16">
                <div id="j-viewvideo" style="width:480px;height:270px;background:#000;"></div>
            </div>
            <div class="actions fn-pd10 fn-clear">
                <span class="fn-left pz-label label-normal tip-creater fn-ellipsis">直播账号：${creater}</span>
                <a class="j-cut fn-right" data-id="${id}" style="color:#1a9fff;padding: 5px;">剪辑</a>
                <div class="fn-hide">

                    <div class="pz-switch switch-close fn-right fn-w80" data-id="${id}">
                        <div class="switch-btn">关闭</div>
                    </div>

                    <div class="pz-switch switch-open fn-right fn-w80" data-id="${id}">
                        <div class="switch-btn">正常</div>
                    </div>

                    <span class="fn-right pz-label label-normal label-transparent fn-pd0">当前直播状态：</span>
                </div>
            </div>
        </div>
    </div>
</script>
<script type="text/template" id="j-overlay-verify">
    <div class="pz-boxhead fn-w520">
        <em class="icon pz-icon icon-warning"></em>
        <span class="title">现场审核</span>
        <span class="close j-overlay-close">
    <em class="pz-icon icon-close"></em>
  </span>
    </div>
    <div class="pz-boxbody fn-w520">
        <div class="fn-pd20 fn-textcenter">
            <div class="pz-btn btn-success btn-big fn-mg30" data-id="${id}">通过</div>
            <div class="pz-btn btn-big fn-mg30" data-id="${id}">不通过</div>
        </div>
        <div class="pz-progress fn-hide">
            <div class="progress-bar progress-success progress-striped progress-active"></div>
        </div>
    </div>
</script>
<script type="text/template" id="j-overlay-stop">
    <div class="pz-boxhead fn-w520">
        <em class="icon pz-icon icon-warning"></em>
        <span class="title">结束直播</span>
        <span class="close j-overlay-close">
    <em class="pz-icon icon-close"></em>
  </span>
    </div>
    <div class="pz-boxbody fn-w520">
        <div class="pz-form">
            <div class="wrap fn-pd30 fn-fs16">
                确定要结束直播？
            </div>
            <div class="actions fn-pd10 fn-textright">
                <input type="button" class="pz-btn fn-mr10 j-overlay-close" value="取消">
                <input type="button" class="pz-btn btn-success j-true" data-id="${id}" value="确定">
            </div>
        </div>
    </div>
</script>
<script type="text/template" id="j-overlay-restart">
    <div class="pz-boxhead fn-w520">
        <em class="icon pz-icon icon-warning"></em>
        <span class="title">恢复直播</span>
        <span class="close j-overlay-close">
    <em class="pz-icon icon-close"></em>
  </span>
    </div>
    <div class="pz-boxbody fn-w520">
        <div class="pz-form">
            <div class="wrap fn-pd30 fn-fs16">
                将现场恢复为直播中的状态。如需使用导播台，请重新设置
            </div>
            <div class="actions fn-pd10 fn-textright">
                <input type="button" class="pz-btn fn-mr10 j-overlay-close" value="取消">
                <input type="button" class="pz-btn btn-success j-true" data-id="${id}" value="确定">
            </div>
        </div>
    </div>
</script>



</body></html>