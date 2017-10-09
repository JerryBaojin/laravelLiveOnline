<!DOCTYPE html>
<html><head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/css/swiper-3.3.1.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="http://vjs.zencdn.net/5.20.1/video-js.css" rel="stylesheet">
    <script src="/js/video.min.js"></script>
    <link href="/css/test.css" rel="stylesheet">

    <script src="/js/vue-min.js"></script>
    <script src="/js/vue-resource.js"></script>
    <style type="text/css">
        html, body{height: 100%;font-family: "微软雅黑";}
        *{margin: 0;padding: 0;box-sizing: border-box;}
        a {color: #428bca;text-decoration: none;}
        a:hover,a:focus {color: #2a6496;text-decoration: underline;}
        a:focus {outline: thin dotted;outline: 5px auto -webkit-focus-ring-color;outline-offset: -2px;}

        .padd_40{padding-top: 80px;background: #F5F5F5;overflow-x:hidden;}
        .a{text-align:center;line-height: 40px;position: fixed;top: 0;left: 0;width: 100%;z-index: 10;border-bottom: 1px #ccc solid; background: #f50;color: #fff;}
        .tab{display: flex;line-height: 40px;top: 40px;width: 100%;z-index: 10;}
        .tab a{width: 50%;background: #fff;text-align: center;color: #999999;height: 42px;line-height: 42px;}
        .tab .active{border-bottom: 1px #0e90d2 solid; color: #0e90d2;}
        .panel{margin: 0;}

        .refreshtip {position: absolute;left: 0;width: 100%;margin: 10px 0;text-align: center;color: #999;}
        .swiper-container{overflow: visible;}
        .loadtip { display: block;width: 100%;line-height: 40px; height: 40px;text-align: center;color: #999;border-top: 1px solid #ddd;}
        .swiper-container, .w{height: calc(100vh - 120px);}
        .swiper-slide{height: auto;}

        .text-center{text-align: center;}
        .list-group{padding-left: 0;margin-bottom: 20px;}
        .list-group-item{    position: relative; display: block;padding: 10px 15px;margin-bottom: -1px;background-color: #fff;border: 1px solid #ddd;}
        .list-group-item:first-child {border-top-left-radius: 4px;border-top-right-radius: 4px;}
    </style>
</head>
<body>

<div class="container" id="app">
    {{--col-md-4 col-md-offset-4--}}
    <div id="main" class="col-md-6 col-md-offset-4 .col-sm-1 	col-xs-12">

        <div class="live">
            <video style="width: 100%;height:270px;" id="example_video_1"  class="video-js vjs-big-play-centered  vjs-default-skin" controls="controls" preload="auto" width="1280" height="720" poster="http://vjs.zencdn.net/v/oceans.png" data-setup="{}">
                <source src="rtmp://220.166.83.187:1935/live/a" type="rtmp/flv">
                <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that
            </video>
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
                        <div class="live-tag" >
                            <div  class="move">
                            <div  style="background: white">
                                <div class="blueI"></div>
                                <div class="out"></div>
                                <div class="main_content">
                                    <div>
                                            <span>
                                            <img src="/img/live_user_header_bg.png" alt=""><span style="color: #13b7f6;margin-left: 4px;">主持人 小1</span>
                                            </span>
                                        <span class="time" style="float: right">01-19 23:25</span>
                                    </div>
                                    <div>
                                        舞蹈  《梦幻羌寨》  曾获四川省第二届广场舞大赛一等奖。舞蹈编导张亚龄是一个90后帅小伙，舞蹈专业科班出身，这是他的第一支编舞作品。《梦幻羌寨》这个节目里添加了不少难度较高的动作和队形，且18名舞蹈演员全是业余爱好者，来自不同行业，如卖奶茶的、搞婚庆的，都是各行各业的舞蹈爱好者。
                                    </div>
                                    <div class="img c">
                                        <ul>
                                            <li><img src="https://img.newaircloud.com/njrb/pic/201701/19/62a3e02c-2e96-4750-9081-cc9642cf8bd8.jpg@!md11" alt=""></li>
                                            <li><img src="https://img.newaircloud.com/njrb/pic/201701/19/62a3e02c-2e96-4750-9081-cc9642cf8bd8.jpg@!md11" alt=""></li>
                                            <li><img src="https://img.newaircloud.com/njrb/pic/201701/19/62a3e02c-2e96-4750-9081-cc9642cf8bd8.jpg@!md11" alt=""></li>
                                            <li><img src="https://img.newaircloud.com/njrb/pic/201701/19/62a3e02c-2e96-4750-9081-cc9642cf8bd8.jpg@!md11" alt=""></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide list-group swiper-slide-next" >
                       列表2
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>


        <form class="form-inline">
            <div class="form-group">
                <label class="sr-only" for="exampleInputEmail3">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
            </div>
            <div class="form-group">
                <label class="sr-only" for="exampleInputPassword3">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Remember me
                </label>
            </div>
            <button type="submit" class="btn btn-default">Sign in</button>
        </form>

    <div class="loadtip">上拉加载更多</div>
    <div class="swiper-scrollbar" style="display: none; opacity: 0;"><div class="swiper-scrollbar-drag" style="height: 0px;"></div></div>
</div>

    </div>

<script src="/js/jquery-2.1.4.min.js" type="text/javascript" charset="utf-8"></script>
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
                    $(".refreshtip").show(0);
                    $(".init-loading").html('刷新成功！');
                    setTimeout(function(){
                        $(".init-loading").html('').hide();
                    },800);
                    $(".loadtip").show(0);

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