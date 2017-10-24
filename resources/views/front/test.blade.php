<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge" >
    <meta name="viewport"   content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no"/>
    <title>Aliplayer在线配置</title>
    <link rel="stylesheet" href="//g.alicdn.com/de/prismplayer/2.1.0/skins/default/aliplayer-min.css" />
    <script type="text/javascript" src="//g.alicdn.com/de/prismplayer/2.1.0/aliplayer-min.js"></script>
</head>
<body>
<div  class="prism-player" id="J_prismPlayer" style="position: absolute;left:0%;"></div>
<script>
    var player = new Aliplayer({
        id: "J_prismPlayer",
        autoplay: true,
        isLive:true,
        playsinline:true,
        width:"100%",
        height:"400px",
        controlBarVisibility:"always",
        useH5Prism:false,
        useFlashPrism:true,
        source:"rtmp://220.166.83.187:1935/live/59ddbfb7a891b",
        cover:"",
        skinLayout:[{"name":"bigPlayButton","align":"blabs","x":30,"y":80},
            {"name":"H5Loading","align":"cc"},
            {"name":"infoDisplay","align":"cc"},
            {"name":"controlBar","align":"blabs","x":0,"y":0,"children":[{"name":"fullScreenButton","align":"tr","x":20,"y":25},
                {"name":"timeDisplay","align":"tl","x":10,"y":24},
                {"name":"volume","align":"tr","x":20,"y":25},
                {"name":"playButton","align":"tl","x":15,"y":26},
                {"name":"progress","align":"tlabs","x":0,"y":0},
                {"name":"snapshot","align":"tr","x":20,"y":25},
                {"name":"setButton","align":"tr","x":20,"y":25},
                {"name":"streamButton","align":"tr","x":20,"y":23},
                {"name":"speedButton","align":"tr","x":10,"y":23}]},
            {"name":"fullControlBar","align":"tlabs","x":0,"y":0,"children":[{"name":"fullTitle","align":"tl","x":25,"y":6},
                {"name":"fullNormalScreenButton","align":"tr","x":24,"y":13},
                {"name":"fullTimeDisplay","align":"tr","x":10,"y":12},
                {"name":"fullZoom","align":"cc"}]}]
    });
</script>
</body>
</html>