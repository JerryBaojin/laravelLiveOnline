<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>现场管理</title>
    <link rel="stylesheet" href="/css/main/ui.css">
    <script src="/js/vue-min.js"></script>
    <script src="/js/vue-resource.js"></script>
    <link href="http://vjs.zencdn.net/5.20.1/video-js.css" rel="stylesheet">
</head>
<style>
    .video-js .vjs-big-play-button{
        top: 39%;
        left: 37%;
    }
    .end{
        background:#eee;
    }
    .pz-overlay .overlay-content{
        top: 15%;
        left: 23%;
    }
    .pz-overlay{
        top: 0;
        bottom: 0;
        left: 0;
        background-color: rgba(0,0,0,.75);
        position: fixed;
        right: 0;
        display: block !important;
        z-index: 999;
    }
    .video-js{
        width:100%;
        height:100%;
    }
</style>


<body>

<div id="app">
<div id="j-search" class="pz-form pz-searchform xcy-search fn-clear">
    <div class="row-content" data-field="keyword">
        <input type="text" id="j-keyword" name="keyword" class="input-search" placeholder="请输入标题关键字(暂时未启用)">
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

        <select v-model="filterList" id="j-state">
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
                <div class="j-edit pic" @click="goDetails(item.id)"><img :src="'/'+item.coverPic"></div>
                <span :class="[(item.setTop!=0?'nowtop top j-stick':'top j-stick') ]" @click="setTop(item.id,$event,index)"><i class="pz-icon icon-top"></i> [[item.setTop==0?'置顶':'取消置顶']]</span><span class="j-reportnum top topnum" >[[item.reports]]条报道</span>
                <div class="title fn-ellipsis">[[item.title]]</div>
            </div>
            <div :class="item.status==32?'end action fn-clear ':'action fn-clear '">
                <span class="pz-label label-normal fn-left fn-ellipsis creater"><i class="pz-icon icon-account"></i> [[item.seter]]</span>
                <span class="pz-label label-normal fn-left fn-pl0 fn-pr0"><i class="pz-icon icon-clock"></i>[[item.createAt]]</span>
                <a class="j-view" @click="view(item.id,index)" href="javascript:void(0)" data-id="" data-creater="" data-poster="https://xcycdn.zhongguowangshi.com/live-img/20170918/1505747709152_87.jpeg" data-url="rtmp://xinhualive.zhongguowangshi.com/zbcb/150574775309060?auth_key=1537283753-0-0-176452a1c3e0d1da06607e9700f613c7" data-streamstate="1">预览</a>
                <a class="j-stop" @click="endScence(item.id,$event,index)" href="javascript:void(0)" :data-status="item.status"> [[item.status==32?'恢复直播':item.status==1?'待审核现场':item.status==16?'直播中':item.status==64?'回收站':'直播结束']]</a>
            </div>
        </li>
    </ul>
</div>

<div id="j-list" class="fn-pt30 fn-pb30 fn-pl40 fn-pr40 fn-hide">

    <div class="overlay-content" style="">
        <div class="pz-boxhead fn-w520">
            <em class="icon pz-icon icon-warning"></em>
            <span class="title">现场直播画面预览</span>
            <span class="close j-overlay-close" @click="close">
                <em class="pz-icon icon-close"></em>
            </span>
        </div>

        <div class="pz-boxbody fn-w520">
            <div class="pz-form">
                <div class="wrap fn-pd20 fn-fs16">
                    <div id="j-viewvideo" style="width:480px;height:270px;background:#000;">
                    </div>
                </div>
                <div class="actions fn-pd10 fn-clear"  >
                    <span class="fn-left pz-label label-normal tip-creater fn-ellipsis">直播账号：大海</span>
                    <a class="j-cut fn-right"   @click="fullScreen"  data-id="150632699300148" style="color:#1a9fff;padding: 5px;">全屏</a>
                    <div class="fn-hide">
                        <div class="pz-switch switch-open fn-right fn-w80" data-id="150632699300148">
                            <div class="switch-btn">正常</div>
                        </div>
                        <span class="fn-right pz-label label-normal label-transparent fn-pd0">当前直播状态：</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <component :is="currentView" :dir="arrHolder"></component>
</div>
</div>
<script>
    //controller the main frame
    // window.parent.document.getElementsByTagName('footer')[0]['className']="pz-overlay";
    //document.getElementById('j-list').style='display:block';

var list=new Vue({
    delimiters: ['[[', ']]'],
    el:'#app',
    data:{
        scenLists:null,
        filterList:0,
        bakArr:null,
        setCurrent:0,
        currentView:"",
        arrHolder:'',
        singleTag:null
    },
    components:{
      viewScen:{//#j-overlay-view
          delimiters: ['[[', ']]'],
          template:"",
          props:['dir']
      } ,
      endScen:{
          template:'#j-overlay-stop'
      },
        recover:{
          template:'#j-overlay-restart'
        }
    },
    methods:{
        goDetails:function (id) {
           parent.document.getElementById('inframe').dataset.pid=id
            parent.document.getElementById('inframe').src="scene/scenDetails"
        },
        fullScreen:function () {
            /* still not work
            var myPlayer=videojs("example_video_1");
            myPlayer.enterFullScreen();*/
        },
        close:function () {
            document.getElementById('j-list').className='fn-pt30 fn-pb30 fn-pl40 fn-pr40 fn-hide';

            var myPlayer=videojs("example_video_1");
            myPlayer.dispose();

        },
        endScence:function (id,e,index) {
            //判断当前状态
            var act =null;
            var test=null;

           switch (parseInt(e.target.dataset.status)){
               case 1:
                   test="确定更改为直播中吗？";
                   act ='pushLive';
                   break;
               case 16:
                   test="确定结束直播吗？"
                   act ='end';
                   break;
               case 32:
                   test="确定放入回收站吗？";
                   act ='del';
                   break;
           }
        if (test==null)return false;
        if(!confirm(test)){
               return false;
        }
            this.$http.post('/Api/scenelist',{act:act,'id':id,'_token':'{{csrf_token()}}'}).then(function (res) {
                if (res.data==1){
                    switch (parseInt(e.target.dataset.status)){
                        case 1:
                            this.bakArr[index]['status']=16;
                            break;
                        case 16:
                            this.bakArr[index]['status']=32;
                            break;
                        case 32:
                            this.bakArr[index]['status']=64;
                            break;
                    }
                }
            },function (error) {
                console.log(error);
            })
        },
        view:function (id,index) {
            var      placeHappen= document.getElementById('j-list');
            document.getElementById('j-viewvideo').innerHTML='  <video id="example_video_1" class="video-js vjs-default-skin" controls="controls" preload="auto" width="1280" height="720" poster="http://vjs.zencdn.net/v/oceans.png" data-setup="{}">\n' +
                '      <source src="rtmp://220.166.83.187:1935/live/59c075f837c4f" type="rtmp/flv">\n' +
                '    <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>\n' +
                '  </video>';

            this.currentView="";
                    var that=this;
                    var index=parseInt(index);
                    console.log(this.bakArr);
                this.bakArr.map(function (item,index) {
                    if(item.id==id){
                      var rtmpUrls=item.rtmpUrl.split("|||");
                      if (item.rtmpUrl.indexOf("|||")>=0){
                          that.arrHolder=that.bakArr[index];
                          rtmpUrls[0]=rtmpUrls[0]+ rtmpUrls[1].split("?")[0];
                          that.arrHolder["rtmpUrl"]= rtmpUrls[0];
                      }else{
                          that.arrHolder["rtmpUrl"]= rtmpUrls[0];
                      }
                    }
                })
            var myPlayer=videojs("example_video_1");
                myPlayer.src(that.arrHolder["rtmpUrl"]);
                myPlayer.load(that.arrHolder["rtmpUrl"]);
            placeHappen .className='pz-overlay fn-pt30 fn-pb30 fn-pl40 fn-pr40 fn-hide';
        },
        setTop:function (id,e,index) {
            var n=JSON.stringify(this.bakArr);
            n=JSON.parse(n);
          function viewSynchronize(arr) {
            arr.sort(function (x,y) {
                return y['setTop']-x['setTop'];
            })
        }
            var classArr=e.target.className.indexOf('nowtop');
        if (classArr==-1){//如果为-1则不存在
            this.$http.post('/Api/scenelist',{act:"setTop",'id':id,'_token':'{{csrf_token()}}'}).then(function (res) {
                if (res.data==1){
                    ++this.bakArr[index]['setTop'];
                }
            },function (error) {
                console.log(error);
            })
        }else{
            this.$http.post('/Api/scenelist',{act:"cancelTop",'id':id,'_token':'{{csrf_token()}}'}).then(function (res) {
                if (res.data==1){
                    this.bakArr[index]['setTop']=0;
                }
            },function (error) {
                console.log(error);
            })
        }
            viewSynchronize(n);
        }
    },
    watch:{
        filterList:function(newValue,old){
            if (newValue==0){
                this.scenLists=this.bakArr;
            }else{
                this.scenLists=this.bakArr.filter(function (value) {
                    return value.status==parseInt(newValue);
                })
            }
        }
    },
    created:function () {
        this.$http.post('/Api/scenelist',{act:"getList",'_token':'{{csrf_token()}}'}).then(function (res) {
            this.scenLists=eval(res.body);
            //备份一份数组
            this.bakArr=this.scenLists;
        },function (error) {
            console.log(error);
        })
    }

})
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
{{--<script src="http://vjs.zencdn.net/5.20.1/video.js"></script>--}}

<script src="/js/video.min.js"></script>



</body></html>