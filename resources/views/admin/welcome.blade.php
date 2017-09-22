<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/main/index1.css" />
    <link rel="stylesheet" href="/css/main/index2.css">
    <link rel="stylesheet" href="/css/main/index3.css">
    <link rel="stylesheet" href="/css/main/index4.css">
</head>
<body>
<!-- head -->
<div id="app">
<div class="pz-header xcy-header fn-clear">
    <div class="logo"><img src="static/imgs/logo.png"></div>
    <div id="j-headerOther" class="other clearfix">
        <span id="j-orglogo" class="item headpic fn-cursor-default"><img src="https://xcycdn.zhongguowangshi.com///live-img/20170706/1499333599494_55.png"></span>
        <span id="j-org" class="item fn-ml0 fn-cursor-default">内江日报</span>
        <div class="item">
            <span id="j-user">大海</span>
            <em class="pz-icon icon-moreunfold"></em>
            <div class="itemselect">
                <div class="itemoption" @click="editUser($event)">
                    <em class="arrow"></em>
                    <em class="arrowbg"></em>
                    <span class="j-optionlink" data-href="/user/info.html">基本信息</span>
                    <span class="j-optionlink"  data-href="/user/pwd.html">修改密码</span>
                    <span id="j-logout"  data-href="logout">安全退出</span>
                </div>
            </div>
        </div>

        <div id="j-help" class="j-optionlink item" data-href="/system/help.html">
            <span>帮助</span>
            <em class="pz-icon icon-help"></em>
        </div>
    </div>
</div>
<!--LEFTSIDE-->
<div class="xcy-side">
    <div id="j-nav" @click="loopPage($event)" class="nav">
        <dl>
            <dt><i class="pz-icon icon-app"></i>审核/管理</dt>
                <dd data-href="/scene/scenelist.html" class="current">现场</dd>
                <dd data-href="/scene/reportlist.html">报道</dd>
                <dd data-href="/scene/comment.html" class="">评论</dd>
        </dl>
        <dl><dt><i class="pz-icon icon-add1"></i>创建/发布</dt>
            <dd data-href="/scene/sceneadd.html">创建现场</dd>
            <dd data-href="/scene/showscenelist.html">发布报道</dd>
        </dl><dl><dt><i class="pz-icon icon-org-bi"></i>机构信息</dt>
            <dd data-href="/org/info.html">基本信息</dd>
            <dd data-href="/org/acclist.html">子账号管理</dd>
        </dl><dl>
            <dt><i class="pz-icon icon-accountfilling">
                </i>个人中心</dt><dd data-href="/user/info.html">基本信息</dd>
            <dd data-href="/user/pwd.html">修改密码</dd></dl><dl><dt>
                <i class="pz-icon icon-data2"></i>受众与统计</dt>
            <dd data-href="/org/userlist.html">受众管理</dd>
            <dd data-href="/count/general.html">数据概览</dd>
            <dd data-href="/count/list.html">数据统计</dd></dl></div>
</div>

<div id="j-mainIframe" class="xcy-main">
    <iframe frameborder="0" id="inframe" scrolling="auto" name="mainIframe0" :src="[[page]]" style="display: block;"></iframe>
</div>
</div>
</body>
<footer class="test">
</footer>

<script src="/js/vue-min.js"></script>
<script src="/js/vue-resource.js"></script>
{{--<script src="js/main/borwer-min.js"></script>--}}
<script src="/js/main/vuecompents.js"></script>
</html>