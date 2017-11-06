<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge" >
    <meta name="viewport"   content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no"/>
    <title>Aliplayer</title>
    <link rel="stylesheet" href="//g.alicdn.com/de/prismplayer/2.2.0/skins/default/aliplayer-min.css" />
    <script type="text/javascript" src="//g.alicdn.com/de/prismplayer/2.2.0/aliplayer-min.js"></script>
</head>
<body>
<div  class="prism-player" id="J_prismPlayer" style="position: absolute;left:0%;"></div>

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
</body>
</html>