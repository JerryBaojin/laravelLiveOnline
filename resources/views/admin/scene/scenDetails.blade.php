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
    <div id="app">
        <div id="j-search" class="pz-form pz-searchform xcy-search fn-clear">
            <span id="j-back" class="fn-left pz-btn btn-white"><i class="pz-icon icon-back1"></i> 返回</span>
            <div class="other">
                <div id="j-more" class="item">
                    <span class="pz-btn btn-white">更多操作</span>
                    <div class="itemselect itemselect-right">
                        <div class="itemoption">
                            <em class="arrow"></em>
                            <em class="arrowbg"></em>

                            <span class="j-delete">删除现场</span>

                            <span class="j-playurl">播放流地址</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fn-pl40 fn-pr40 fn-pt30 fn-pb30 fn-clear">
            <div class="pz-form">
                <form id="j-sceneform">
                    <div class="formtitle fn-mb30">基本信息</div>
                    <div class="wrap fn-clear">
                        <div class="group2">
                            <div class="row xcy-row fn-mb15">
                                <div class="row-title">现场类型</div>
                                <div class="row-content" data-field="type"><div><label>
                                            [[arrs.type]]
                                            <input type="radio" name="type" value="4" :class="arrs.type=='4'?'test':''">视频直播</label><label>
                                            <input type="radio" name="type" value="1"  > 图文直播</label></div></div>
                            </div>
                            <div class="row xcy-row">
                                <div class="row-title">标题</div>
                                <div class="row-content" data-field="topic"><input type="text" maxlength="30" value="美女主播带你逛网络安全周公众体验展(直播)" name="topic" required=""></div>
                            </div>
                            <div class="row xcy-row">
                                <div class="row-title">摘要<p class="j-remark-length fn-right"><span>78</span>/300</p></div>
                                <div class="row-content" data-field="remark"><textarea name="remark" class="j-remark fn-h140">9月18日，以“网络安全为人民 网络安全靠人民”为主题的四川省2017年国家网络安全宣传周启动仪式在内江市举行，美女主播“万万”将带领大家逛一逛公众体验展。</textarea></div>
                            </div>
                        </div>
                        <div class="group2 fn-pl40">
                            <div class="row xcy-row fn-mb10">
                                <div class="row-title">封面<em>（750px * 422px）</em></div>
                                <div class="row-content">
                                    <div id="j-cover" class="xcy-cutimg">
                                        <label class="upbtn">
                                            <div class="imgbar"><img src="https://xcycdn.zhongguowangshi.com/live-img/20170918/1505747709152_87.jpeg"></div>
                                            <div class="fn-pt25">
                                                <i class="pz-icon icon-img"></i>
                                                <p class="fn-textcenter fn-mt5">点击选择封面图片</p>
                                            </div>
                                            <div class="j-file-input fn-hide">
                                                <input type="file" accept="image/gif,image/jpeg,image/jpg,image/png">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div id="j-videorow" class="row xcy-row">
                                <div class="row-title fn-w240 fn-clear">现场视频<a id="j-material" class="fn-right" href="javascript:void(0)">查看全部</a></div>
                                <div class="row-content">
                                    <div id="j-video" class="xcy-video">
                                        <div id="j-uploader-tip" class="upbtn toplayer fn-hide">
                                            <div class="fn-pt25">
                                                <i class="pz-icon icon-video"></i>
                                                <p class="fn-textcenter fn-mt5"></p>
                                            </div>
                                        </div>
                                        <div class="videobar toplayer">
                                            <div class="fn-pt30">
                                                <span class="close"><i class="pz-icon icon-close"></i></span>
                                                <i class="pz-icon icon-video"></i>
                                                <p class="fn-textcenter fn-mt10">点击播放</p>
                                                <a class="j-cut" href="javascript:void(0)" style="color:#1a9fff;position:absolute;top:140px;left:0;">剪辑</a>
                                                <a target="_blank" class="download" href="https://xcycdn-video.zhongguowangshi.com/record/zbcb/150574775309060_2.mp4" download="">下载<i class="pz-icon icon-icondownload"></i></a>
                                            </div>
                                        </div>
                                        <div id="j-uploader-select" class="upbtn" style="position: relative; z-index: 1;">
                                            <div class="fn-pt25">
                                                <i class="pz-icon icon-video"></i>
                                                <p class="fn-textcenter fn-mt5">点击选择现场视频</p>
                                            </div>
                                        </div>
                                        <div id="html5_1bquk5ue21dq015a5h54lle7p83_container" class="moxie-shim moxie-shim-html5" style="position: absolute; top: 0px; left: 0px; width: 240px; height: 135px; overflow: hidden; z-index: 0;"><input id="html5_1bquk5ue21dq015a5h54lle7p83" type="file" style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;" accept="video/3gpp,video/mp4,.m3u8,video/x-ms-wmv,video/webm,video/quicktime,video/avi,video/mpeg,.mpeg1,.mpeg4,video/x-matroska,video/x-flv"></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="formtitle fn-mb30 fn-mt-1">其他信息</div>
                    <div class="wrap fn-pb30">
                        <div class="fn-clear">
                            <div class="row fn-rate40 fn-left">
                                <div class="row-title">现场ID</div>
                                <div class="row-content" data-field="id"><input type="text" value="150574775309060" name="id" class="disabled" disabled=""></div>
                            </div>
                            <div class="row fn-rate40 fn-left">
                                <div class="row-title">创建人</div>
                                <div class="row-content" data-field="creater"><input type="text" value="大海" name="creater" class="disabled" disabled=""></div>
                            </div>
                        </div>
                        <div class="fn-clear">
                            <div class="row fn-rate40 fn-left">
                                <div class="row-title">分享地址</div>
                                <div class="row-content" data-field="xlShortUrl"><input type="text" value="http://t.cn/RpDqh08" name="xlShortUrl" class="disabled" disabled=""></div>
                            </div>
                            <div class="row fn-rate40 fn-left">
                                <div class="row-title">创建时间</div>
                                <div class="row-content" data-field="gmtCreate"><input type="text" value="2017-09-18 23:15" name="gmtCreate" class="disabled" disabled=""></div>
                            </div>
                        </div>
                        <div class="fn-clear">
                            <div class="row fn-rate40 fn-left">
                                <div class="row-title">定位城市</div>
                                <div class="row-content">
                                    <select id="j-province"><option value="北京市">北京市</option><option value="天津市">天津市</option><option value="河北省">河北省</option><option value="山西省">山西省</option><option value="内蒙古自治区">内蒙古自治区</option><option value="辽宁省">辽宁省</option><option value="吉林省">吉林省</option><option value="黑龙江省">黑龙江省</option><option value="上海市">上海市</option><option value="江苏省">江苏省</option><option value="浙江省">浙江省</option><option value="安徽省">安徽省</option><option value="福建省">福建省</option><option value="江西省">江西省</option><option value="山东省">山东省</option><option value="河南省">河南省</option><option value="湖北省">湖北省</option><option value="湖南省">湖南省</option><option value="广东省">广东省</option><option value="广西壮族自治区">广西壮族自治区</option><option value="海南省">海南省</option><option value="重庆市">重庆市</option><option value="四川省">四川省</option><option value="贵州省">贵州省</option><option value="云南省">云南省</option><option value="西藏自治区">西藏自治区</option><option value="陕西省">陕西省</option><option value="甘肃省">甘肃省</option><option value="青海省">青海省</option><option value="宁夏回族自治区">宁夏回族自治区</option><option value="新疆维吾尔自治区">新疆维吾尔自治区</option><option value="其他">其他</option></select>
                                    <select id="j-city" name="city" class=""><option value="">其他</option></select>
                                </div>
                            </div>
                            <div class="row row100 fn-rate40 fn-left">
                                <div class="row-title">浏览量显示状态</div>
                                <div class="row-content" data-field="partakeState"><div><label><input type="radio" name="partakeState" value="0" checked=""> 显示</label><label><input type="radio" name="partakeState" value="1"> 不显示</label></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="actions actions-transparent fn-pt20">
                        <input type="submit" class="pz-btn btn-success btn-big" value="保存修改">
                    </div>
                </form>
            </div>
        </div>
    </div>
<script>
var vue=new Vue({
    delimiters: ['[[', ']]'],
    el:'#app',
    data:{
      id:null,
        arrs:null
    },
    mounted:function () {
       this.id=parent.document.getElementById('inframe').dataset.pid;
       this.$http.post('/Api/getDetails',{act:'getDetail','id':this.id,'_token':'{{csrf_token()}}'}).then(function (res) {
           this.arrs=eval(res.body)[0];
            console.log(this.arrs);
       },function (error) {
           console.log(error)
       })
       console.log(this.id);
    }
})
</script>
        <script type="text/template" id="j-overlay-delete">
            <div class="pz-boxhead fn-w520">
                <em class="icon pz-icon icon-warning"></em>
                <span class="title">删除现场</span>
                <span class="close j-overlay-close">
    <em class="pz-icon icon-close"></em>
  </span>
            </div>
            <div class="pz-boxbody fn-w520">
                <div class="pz-form">
                    <div class="wrap fn-pd30 fn-fs16">
                        确定要删除该现场？
                    </div>
                    <div class="actions fn-pd10 fn-textright">
                        <input type="button" class="pz-btn fn-mr10 j-overlay-close" value="取消">
                        <input type="button" class="pz-btn btn-success j-true" value="确定">
                    </div>
                </div>
            </div>
        </script>
        <script type="text/template" id="j-overlay-streamurl">
            <div class="pz-boxhead fn-w520">
                <em class="icon pz-icon icon-warning"></em>
                <span class="title">推流地址</span>
                <span class="close j-overlay-close">
    <em class="pz-icon icon-close"></em>
  </span>
            </div>
            <div class="pz-boxbody fn-w520">
                <div class="pz-form">
                    <div class="wrap fn-pd20">
                        <div class="fn-pd10 fn-fs16 fn-break" style="border:solid 1px #e5e8ee;background:#f7faff;">

                        </div>
                        <div class="fn-mt5 fn-color-gray">注：此地址可用于把视频直播内容传输到其他服务器</div>
                        <div class="fn-textcenter">
                            <span class="j-copy-streamurl fn-mt20 pz-btn btn-big btn-white fn-hide"><i class="pz-icon icon-copy"></i> 复制推流地址</span>
                        </div>
                    </div>
                </div>
            </div>
        </script>
        <script type="text/template" id="j-overlay-playurl">
            <div class="pz-boxhead fn-w520">
                <em class="icon pz-icon icon-warning"></em>
                <span class="title">播放流地址</span>
                <span class="close j-overlay-close">
    <em class="pz-icon icon-close"></em>
  </span>
            </div>
            <div class="pz-boxbody fn-w520">
                <div class="pz-form">
                    <div class="wrap fn-pd20">
                        <div class="fn-pd10 fn-fs16 fn-break" style="border:solid 1px #e5e8ee;background:#f7faff;">

                        </div>
                        <div class="fn-mt5 fn-color-gray">注：此地址可用于在其他平台播放直播视频</div>
                        <div class="fn-textcenter">
                            <span class="j-copy-playurl fn-mt20 pz-btn btn-big btn-white fn-hide"><i class="pz-icon icon-copy"></i> 复制播放流地址</span>
                        </div>
                    </div>
                </div>
            </div>
        </script>
        <script type="text/template" id="j-overlay-view">
            <div class="pz-boxhead fn-w520">
                <em class="icon pz-icon icon-warning"></em>
                <span class="title">现场视频预览</span>
                <span class="close j-overlay-close">
    <em class="pz-icon icon-close"></em>
  </span>
            </div>
            <div class="pz-boxbody fn-w520">
                <div class="pz-form">
                    <div class="wrap fn-pd20 fn-fs16">
                        <div id="j-viewvideo" style="width:480px;height:270px;background:#000;"></div>
                    </div>
                </div>
            </div>
        </script>
        <script type="text/template" id="j-overlay-material">
            <div class="pz-boxhead" style="width:830px;">
                <em class="icon pz-icon icon-warning"></em>
                <span class="title">媒体素材</span>
                <span class="close j-overlay-close">
    <em class="pz-icon icon-close"></em>
  </span>
            </div>
            <div class="pz-boxbody" style="width:830px;">
                <div class="pz-form">
                    <div class="wrap fn-pd10"></div>
                </div>
            </div>
        </script>
        <script type="text/template" id="j-overlay-material-content">
            <ul class="xcy-material fn-clear">
                <li>
                    <div class="j-playvideo imgbar" data-state="${item.state|formatState}" data-video="${item.mediaUrl}">
                        <div class="videolayer fn-textcenter">
                            <i class="pz-icon icon-video"></i>
                            <p class="fn-mt5"></p>
                        </div>
                        <img src="${item.thumbnail}">
                    </div>
                    <div class="fn-mt10 fn-clear">
                        <a class="fn-right" target="_blank" href="${item.mediaUrl}" download>下载</a>
                        <a class="j-getvideo fn-right fn-mr10" href="javascript:void(0)" data-video="${item.mediaUrl}">选择</a>
                    </div>
                </li>

            </ul>
            <div class="pz-page fn-mt20 fn-mb10 fn-textcenter"></div>
        </script>
    </div>
</html>

