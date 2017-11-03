<!DOCTYPE html>
<html><head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/css/swiper-3.3.1.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="//g.alicdn.com/de/prismplayer/2.2.0/skins/default/aliplayer-min.css" />
    <script type="text/javascript" src="//g.alicdn.com/de/prismplayer/2.2.0/aliplayer-min.js"></script>
    <link href="/css/fron_live.css" rel="stylesheet">
    <script src="/js/vue-min.js"></script>
    <script src="/js/vue-resource.js"></script>

    <style type="text/css">
        html, body{height: 100%;font-family: "微软雅黑";}
        *{margin: 0;padding: 0;box-sizing: border-box;}
        a {color: #428bca;text-decoration: none;}
        a:hover,a:focus {color: #2a6496;text-decoration: none;}
        a:focus {outline: thin dotted;outline: 5px auto -webkit-focus-ring-color;outline-offset: -2px;}

        .padd_40{padding-top: 80px;background: #F5F5F5;overflow-x:hidden;}
        .a{text-align:center;line-height: 40px;position: fixed;top: 0;left: 0;width: 100%;z-index: 10;border-bottom: 1px #ccc solid; background: #f50;color: #fff;}
        .tab{display: flex;line-height: 40px;top: 40px;width: 100%;z-index: 10;}
        .tab a{width: 50%;background: #fff;text-align: center;color: #999999;height: 42px;line-height: 42px;}
        .tab .active{border-bottom: 1px #0e90d2 solid; color: #0e90d2;}
        .panel{margin: 0;}

        .refreshtip {position: absolute;left: 0;width: 100%;margin: 6px 0;text-align: center;color: #999;}
        .swiper-container{overflow: visible;}
        .loadtip { display: block;width: 100%;line-height: 40px; height: 40px;text-align: center;color: #999;border-top: 1px solid #ddd;}

        .swiper-slide{height: auto;}
        .zans:hover{cursor: pointer}
        .text-center{text-align: center;}
        .list-group{padding-left: 0;margin-bottom: 20px;}
        .list-group-item{    position: relative; display: block;padding: 10px 15px;margin-bottom: -1px;background-color: #fff;border: 1px solid #ddd;}
        .list-group-item:first-child {border-top-left-radius: 4px;border-top-right-radius: 4px;}
        .sContent{font-size: 16px;color: #999;word-break: break-all;overflow: hidden;height: auto;position: relative;    padding: 10px 18px 0 0;}
        .descclamp{display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 2;overflow: hidden;}
        .act{transform: rotate(180deg);background: url(/img/act.png) center center no-repeat;background-size: 100% auto;position: absolute;right: 0;bottom: 0; width: 20px;height: 20px;}
        .zero{transform: rotate(0)}
        [v-cloak] {
            display: none;
        }
    </style>
    <script>
        (function (doc, win) {
            var docEl = doc.documentElement,
                resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
                recalc = function () {
                    var clientWidth = docEl.clientWidth;
                    if (!clientWidth) return;
                    if(clientWidth>=640){
                        docEl.style.fontSize = '100px';
                    }else{
                        docEl.style.fontSize = 100 * (clientWidth / 640) + 'px';
                    }
                };

            if (!doc.addEventListener) return;
            win.addEventListener(resizeEvt, recalc, false);
            doc.addEventListener('DOMContentLoaded', recalc, false);
        })(document, window);
    </script>
</head>
<body>
<div class="container" id="app" v-cloak>
    {{--col-md-4 col-md-offset-4--}}
    <div id="main" class="col-md-6 col-md-offset-4 .col-sm-1 	col-xs-12">

        <div class="live">


            @if($type==4)
            {{--<video style="width: 100%;height:270px;" id="example_video_1"  class="video-js vjs-big-play-centered  vjs-default-skin" controls="controls" preload="auto" width="680px" height="680" poster="http://vjs.zencdn.net/v/oceans.png" data-setup="{}">--}}
                {{--<source src="{{$rtmpUrl}}" type="rtmp/flv">--}}
                {{--<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that--}}
            {{--</video>--}}
                <div  class="prism-player" id="J_prismPlayer" style="left:0%;height:3.4rem"></div>
                <script>
                    var player = new Aliplayer({
                        id: "J_prismPlayer",
                        autoplay: false,
                        isLive:true,
                        playsinline:true,
                        width:"100%",
                        height:"400px",
                        x5_type:true,
                        x5_fullscreen:false,
                        controlBarVisibility:"always",
                        useH5Prism:true,
                        useFlashPrism:false,
                        source:"//player.alicdn.com/video/aliyunmedia.mp4",
                        cover:"http://weixin.scnjnews.com/spring/upload/active/img/20171101/1.png"
                    });
                </script>
            @else
                <img style="width: 100%" src="{{$coverPic}}" alt="">
                @endif
        </div>
{{--摘要--}}
            <div class="scenInfo">
                <div class="title" style="    font-size: 24px;">
                   {{$scene}}
                </div>
                <div class="sContent descclamp" @click="showContent($event)">
                    <span class="act zero"></span>
                     <span>摘要:</span>
                    <span>{{$content}}</span>
                </div>
                @if($partakeState!=1)
                    <div style="float: right;color:#999;font-size: 14px;">浏览量:{{$viewCount}}</div>
                @endif

            </div>

        <div class="tab">
            <a class="active" href="javascript:;">直播</a>
            <a href="javascript:;" >聊天室</a>

        </div>

        <div class="swiper-container swiper-container-vertical swiper-container-free-mode swiper-container-android">

            <div class="refreshtip">下拉可以刷新</div>
            <div class="swiper-wrapper w" style="transform: translate3d(0px, 0px, 0px);">
                <div class="swiper-slide d swiper-slide-active">
                    <div class="init-loading list-group-item text-center" style="display: none;">下拉可以刷新</div>
                    <div class=" swiper-container2 swiper-container-horizontal swiper-container-android">
                        <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">

                            <div class="swiper-slide list-group swiper-slide-active" >
                                <div v-for="(x,i) in reports" class="live-tag" >
                                    <div  class="move">
                                        <div  style="background: white">
                                            <div class="blueI"></div>
                                            <div class="out"></div>
                                            <div class="main_content">
                                                <div>
                                            <span>
                                            <img src="/img/live_user_header_bg.png" alt=""><span style="color: #13b7f6;margin-left: 4px;">主持人 [[x.commiter]]</span>
                                            </span>
                                                    <span class="time" style="float: right">[[x.commitAt]]</span>
                                                </div>
                                                <div>
                                                    [[x.content]]
                                                </div>
                                                <div class="img c">
                                                    <ul>
                                                        <li v-for="pic in x.pics">
                                                            <img :src="pic" alt="">
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="svideo" style="overflow:hidden;" v-if="x.video">
                                                    <video controls :src="x.video"></video>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide list-group swiper-slide-next" >
                                <ul class="comments">
                                    <li v-for="(v,i) in commits">
                                        <div class="ctop">
                                            <div>
                                                <img style="width: 35px;" :src="v.headImg" alt="head">
                                                <span  class="cname"> [[v.name]]</span>
                                                <span class="zans" style="width: 60px"><img @click="zan(v.id,i,$event)" src="/img/great_button.png" alt=""><span>[[v.zans]]</span></span>
                                            </div>
                                            <div class="ctime">[[v.creatAt]]</div>
                                        </div>
                                        <div style="text-indent: 41px;padding-bottom: 10px;color: #999999;">
                                            [[v.content]]
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="swiper-scrollbar" style="display: none; opacity: 0;"><div class="swiper-scrollbar-drag" style="height: 0px;"></div></div>


        <div class="boo">
            <input type="hidden" v-model="name">
            <input type="text"  id="comment" v-model="comments" placeholder="我也说俩句...">
            <button type="button" id="btn" @click="submit(  {{$id}})" class="btn btn-primary">提交</button>
        </div>

    </div>

</div >
<script>
    var   vue=new Vue({
        delimiters: ['[[', ']]'],
        el: '#app',
        data:{
            pid:'{{$id}}',
            id:'{{$oid}}',
            name:'name',
            comments:'',
            reports:'',
            commits:''
        }
        ,methods:{
            showContent:function (e) {

           if( e.currentTarget.className=='sContent'){
               e.currentTarget.getElementsByClassName('act')[0].className='act zero';
               e.currentTarget.className='descclamp sContent';
           }else{
               e.currentTarget.getElementsByClassName('act')[0].className='act';
               e.currentTarget.className= 'sContent';
           }
            },
            zan:function (id,index,e) {
                    var that=this;
                this.$http.post('/Api/makeComments',{act:'zans','_token':'{{csrf_token()}}','pid':this.pid,'id':id}).then(function (res) {
                    if(res.body=='1'){
                      e.target.src='/img/great_cancel_button.png';
                      that.commits[index]['zans']+=1;
                    }else{
                        alert('失败！')
                    }
                },function (e) {
                    console.log(e)
                })
            },
            submit:function (pid) {
                var vm=this;
                this.$http.post('/Api/makeComments',{act:'makeComments','scene':'{{$scene}}','_token':'{{csrf_token()}}','pid':pid,'name':this.name,'content':this.comments}).then(function (res) {
                    if(res.body=='1'){
                        alert('提交成功！');
                       vm.comments='';
                    }else{
                        alert('提交失败')
                    }
                },function (e) {
                    console.log(e)
                })
            },
            getCommits:function () {
                this.$http.get("/dates/"+this.pid+".json?"+new Date().getTime()).then(function (res) {
                    if(res.status!=404){
                        this.commits=JSON.parse(res.body);
                    }

                },function (e) {
                    if(e.status==404){

                    }
                   // console.log(e)
                })
            },
            getReports:function () {
                var that=this;
                this.$http.post("/Api/makeComments",{act:'FgetAll','_token':'{{csrf_token()}}','oid':this.id}).then(function (res) {
                    this.reports=JSON.parse(res.body);

                    this.reports.map(function (v,i,a){
                        that.reports[i]['pics']=v['pics'].split(',');
                       that.reports[i]['commitAt']=v['commitAt'].substring(5,16)
                    })
                    console.log(this.reports);
                },function (e) {
                    console.log(e)
                })
            }
        },
        mounted:function () {
            this.getReports();
              this.getCommits();
        }
    })

</script>
<script>

</script>
<script src="/js/jquery-2.1.4.min.js" type="text/javascript" charset="utf-8"></script>
<script>
    //计算 boo属性
    $(function () {
        $(window).resize(function () {
            $('.boo').css('width',$('#main').css('width'));
        })
        $(window).on('load',function () {
            $('.boo').css('width',$('#main').css('width'));
        })
    })
</script>
<script src="/js/swiper.jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    var loadFlag = true;
    var oi = 0;
    var mySwiper = new Swiper('.swiper-container',{
        direction: 'vertical',
        scrollbar: '.swiper-scrollbar',
        slidesPerView: 'auto',
        mousewheelControl: true,
        freeMode: true,
        onTouchMove: function(swiper){		//手动滑动中触发
            var _viewHeight = document.getElementsByClassName('swiper-wrapper')[0].offsetHeight;
            var _contentHeight = document.getElementsByClassName('swiper-slide')[0].offsetHeight;


            if(mySwiper.translate < 50 && mySwiper.translate > 0) {
                $(".init-loading").html('下拉刷新...').show();
            }else if(mySwiper.translate > 50 ){
                $(".init-loading").html('释放刷新...').show();
            }
        },
        onTouchEnd: function(swiper) {
            var _viewHeight = document.getElementsByClassName('swiper-wrapper')[0].offsetHeight;
            var _contentHeight = document.getElementsByClassName('swiper-slide')[0].offsetHeight;
            // 上拉加载
            if(mySwiper.translate <= _viewHeight - _contentHeight - 50 && mySwiper.translate < 0) {
                // console.log("已经到达底部！");

                if(loadFlag){
                    $(".loadtip").html('正在加载...');
                }else{
                    $(".loadtip").html('没有更多啦！');
                }

                setTimeout(function() {

                    for(var i = 0; i <5; i++) {
                        oi++;
                        $(".list-group").eq(mySwiper2.activeIndex).append('<li class="list-group-item">我是加载出来的'+oi+'...</li>');
                    }
                    $(".loadtip").html('上拉加载更多...');
                    mySwiper.update(); // 重新计算高度;
                }, 800);
            }

            // 下拉刷新
            if(mySwiper.translate >= 50) {
                $(".init-loading").html('正在刷新...').show();
                $(".loadtip").html('上拉加载更多');
                loadFlag = true;

                setTimeout(function() {
                    vue.getReports();
                    vue.getCommits();

                    $(".refreshtip").show(0);
                    $(".init-loading").html('刷新成功！');
                    setTimeout(function(){
                        $(".init-loading").html('').hide();
                    },800);
                    $(".loadtip").show(0);
                    console.log('ajax')

                    //刷新操作
                    mySwiper.update(); // 重新计算高度;
                }, 1000);
            }else if(mySwiper.translate >= 0 && mySwiper.translate < 50){
                $(".init-loading").html('').hide();
            }
            return false;
        }
    });
    var mySwiper2 = new Swiper('.swiper-container2',{
        onTransitionEnd: function(swiper){

            $('.w').css('transform', 'translate3d(0px, 0px, 0px)')
            $('.swiper-container2 .swiper-slide-active').css('height','auto').siblings('.swiper-slide').css('height','0px');
            mySwiper.update();

            $('.tab a').eq(mySwiper2.activeIndex).addClass('active').siblings('a').removeClass('active');
        }

    });
    $('.tab a').click(function(){

        $(this).addClass('active').siblings('a').removeClass('active');
        mySwiper2.slideTo($(this).index(), 500, false)

        $('.w').css('transform', 'translate3d(0px, 0px, 0px)')
        $('.swiper-container2 .swiper-slide-active').css('height','auto').siblings('.swiper-slide').css('height','0px');
        mySwiper.update();
    });
</script>
<script src="/js/bootstrap.min.js"></script>


</body></html>