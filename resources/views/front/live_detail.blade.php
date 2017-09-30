<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="http://vjs.zencdn.net/5.20.1/video-js.css" rel="stylesheet">
    <script src="/js/video.min.js"></script>
    <script src="/js/idangerous.swiper.min.js"></script>
    <link href="/css/fron_live.css" rel="stylesheet">
    <script src="/js/vue-min.js"></script>
    <script src="/js/vue-resource.js"></script>
</head>
<style>

</style>
<body>
<div class="container" id="app">
    {{--col-md-4 col-md-offset-4--}}
    <div id="main" class="col-md-6 col-md-offset-4 .col-sm-1 	col-xs-12">
        <!--直播addr-->
        <div>
            <video style="width: 100%;height:270px;" id="example_video_1"  class="video-js vjs-big-play-centered  vjs-default-skin" controls="controls" preload="auto" width="1280" height="720" poster="http://vjs.zencdn.net/v/oceans.png" data-setup="{}">
                <source src="rtmp://220.166.83.187:1935/live/a" type="rtmp/flv">
                <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that
            </video>
        </div>
        <div class="containA">
            <div class="tagactive" data-pid="live">直播</div>
            <div data-pid="chat">聊天室</div>
        </div>
        <div class="section">
            <div class="live-tag leftTag" >
                <div class="live_section" >
                    <div  id="move" style="border-left:1px solid #dddddd; margin-left: 17px;margin-right: 5px;">
                        <div class="swiper-container ">
                            <div class="preloader"> Loading... </div>
                            <div class="swiper-wrapper" style="width: 100% !important;">
                                <div class="swiper-slide green-slide swiper-slide-visible swiper-slide-active">
                                    <div class="title">silder 2</div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="live-tag rightTag" >
                <div class="live_section" >
                    <div  id="move" style="border-left:1px solid #dddddd; margin-left: 17px;margin-right: 5px;">

                        <div class="swiper-container">
                            <div class="preloader"> Loading... </div>
                            <div class=" swiper-wrapper">
                                <div class="swiper-slide green-slide swiper-slide-visible swiper-slide-active">
                                    <div class="title">silder 2</div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    var holdPosition = 0;
    var mySwiper = new Swiper('.swiper-container',{
        slidesPerView:'auto',
        mode:'vertical',
        watchActiveIndex: true,
        onTouchStart: function() {
            holdPosition = 0;
        },
        onResistanceBefore: function(s, pos){
            holdPosition = pos;
        },
        onTouchEnd: function(){
            if (holdPosition>100) {
                mySwiper.setWrapperTranslate(0,100,0)
                mySwiper.params.onlyExternal=true
                $('.preloader').addClass('visible');
                loadNewSlides();
            }
        }
    })
    var slideNumber = 0;
    function loadNewSlides(){
        setTimeout(function(){
            //Prepend new slide
            var colors = ['red','blue','green','orange','pink'];
            var color = colors[Math.floor(Math.random()*colors.length)];
            mySwiper.prependSlide('<div class="title">silder '+slideNumber+'</div>', 'swiper-slide '+color+'-slide');
            //Release interactions and set wrapper
            mySwiper.setWrapperTranslate(0,0,0)
            mySwiper.params.onlyExternal=false;
            //Update active slide
            mySwiper.updateActiveSlide(0)
            //Hide loader
            $('.preloader').removeClass('visible');
        },1000)
        slideNumber++;
    }
</script>

<script src="/js/jq.min.js"></script>

<script src="/js/bootstrap.min.js"></script>

<script>
    $(function () {
      var _width=$("#main").width()*2;
      $('.section').css('width',_width);
        $('.containA').click(function (e) {
          for (var i=0;i<2;i++){
             $(this).find('div')[i].className='';
          }
          e.target.className='tagactive';
            console.log(_width);
            if (e.target.dataset.pid=='chat'){
                $('.section').animate({'left':'-'+_width/2});
            }else{
                $('.section').animate({'left':'0'});
            }
        })
    })
</script>
</body>
</html>