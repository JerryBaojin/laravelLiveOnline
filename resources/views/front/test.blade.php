<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ckplayer6.8</title>
    <style type="text/css">
        body,td,th {
            font-size: 14px;
            line-height: 26px;
        }
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
        }
        p {
            margin-top: 5px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
            padding-left: 10px;
        }
        #a1{
            position:relative;
            z-index: 100;
            width:600px;
            height:400px;
            float: left;
        }
    </style>
    <script type="text/javascript" src="/js/offlights.js"></script>
</head>

<body>
<div id="a1"></div>
<!--
上面一行是播放器所在的容器名称，如果只调用flash播放器，可以只用<div id="a1"></div>
-->
<textarea name="statusvalue" rows="15" id="statusvalue" style="width:200px;height:400px;">该处是用来监听播放器实时返回的各种状态，可以根据这里的状态实时的控制播放器</textarea>
<script type="text/javascript" src="/ckplayer/ckplayer.js" charset="utf-8"></script>
<script type="text/javascript">
    //如果你不需要某项设置，可以直接删除，注意var flashvars的最后一个值后面不能有逗号

    var _nn=0;
    function ckplayer_status(str){
        _nn+=1;
        if(_nn>100){
            _nn=0;
            document.getElementById('statusvalue').value='';
        }
        document.getElementById('statusvalue').value=str+'\n'+document.getElementById('statusvalue').value;
    }

    var flashvars={
        f:'rtmp://localhost:1935/live/59f691cc1d084',//视频地址
        a:'',//调用时的参数，只有当s>0的时候有效
        s:'0',//调用方式，0=普通方法（f=视频地址），1=网址形式,2=xml形式，3=swf形式(s>0时f=网址，配合a来完成对地址的组装)
        c:'0',//是否读取文本配置,0不是，1是
        x:'',//调用配置文件路径，只有在c=1时使用。默认为空调用的是ckplayer.xml
        i:'http://www.ckplayer.com/static/images/cqdw.jpg',//初始图片地址
        wh:'',//宽高比，可以自己定义视频的宽高或宽高比如：wh:'4:3',或wh:'1080:720'
        lv:'1',//是否是直播流，=1则锁定进度栏
        loaded:'loadedHandler',//当播放器加载完成后发送该js函数loaded
        //调用播放器的所有参数列表结束
        //以下为自定义的播放器参数用来在插件里引用的
        my_url:encodeURIComponent(window.location.href)//本页面地址
        //调用自定义播放器参数结束
    };
    var params={bgcolor:'#FFF',allowFullScreen:true,allowScriptAccess:'always'};//这里定义播放器的其它参数如背景色（跟flashvars中的b不同），是否支持全屏，是否支持交互
    var video=['http://img.ksbbs.com/asset/Mon_1605/0ec8cc80112a2d6.mp4->video/mp4'];
    CKobject.embed('/ckplayer/ckplayer.swf','a1','ckplayer_a1','100%','100%',false,flashvars,video,params);
    /*
        以上代码演示的兼容flash和html5环境的。如果只调用flash播放器或只调用html5请看其它示例
    */

    var _nn=0;//用来计算实时监听的条数的，超过100条记录就要删除，不然会消耗内存

    function getstart(){
        var a=CKobject.getObjectById('ckplayer_a1').getStatus();
        var ss='';
        for (var k in a){
            ss+=k+":"+a[k]+'\n';
        }
        alert(ss);
    }
    //开关灯
    function addflash(){
        if(CKobject.Flash()['f']){
            CKobject._K_('a1').innerHTML='';
            CKobject.embedSWF('ckplayer/ckplayer.swf','a1','ckplayer_a1','600','400',flashvars,params);
        }
        else{
            alert('该环境中没有安装flash插件，无法切换');
        }
    }
    function addhtml5(){
        if(CKobject.isHTML5()){
            support=['all'];
            CKobject._K_('a1').innerHTML='';
            CKobject.embedHTML5('a1','ckplayer_a1',600,400,video,flashvars,support);
        }
        else{
            alert('该环境不支持html5，无法切换');
        }
    }
    function addListener(){
        /*if(CKobject.getObjectById('ckplayer_a1').getType()){//说明使用html5播放器
            CKobject.getObjectById('ckplayer_a1').addListener('play',playHandler);
        }
        else{
            CKobject.getObjectById('ckplayer_a1').addListener('play','playHandler');
        }*/
        CKobject.getObjectById('ckplayer_a1').addListener('play','playHandler');
    }

</script>


</body>
</html>
