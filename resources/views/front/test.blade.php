<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge" >
    <meta name="viewport"   content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no"/>
    <title>Aliplayer</title>
    <link rel="stylesheet" href="//g.alicdn.com/de/prismplayer/2.2.0/skins/default/aliplayer-min.css" />
    <script type="text/javascript" src="//g.alicdn.com/de/prismplayer/2.2.0/aliplayer-min.js"></script>
    <script src="/js/jq.min.js"></script>
</head>
<body>

<script>

    $(function () {
        $.ajax({
            type :"get",
            url:'http://weixin.scnjnews.com/spring/implement.php',
            dataType :"jsonp",
            success:function (res) {
               console.log(res)
            }
        })
    })
</script>
</body>
</html>