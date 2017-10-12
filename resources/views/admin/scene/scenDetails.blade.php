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
    <script src="/js/video.min.js"></script>
</head>
    <div id="scenDe">

        <div id="j-search" class=" pz-form pz-searchform xcy-search fn-clear">
            <span id="j-back" class="  fn-left pz-btn btn-white"><i @click="goback" class="pz-icon icon-back1"></i> 返回</span>
            <div class="other">
                <div id="j-more" class="item">
                    <span class="pz-btn btn-white">更多操作</span>
                    <div class="itemselect itemselect-right">
                        <div class="itemoption">
                            <em class="arrow"></em>
                            <em class="arrowbg"></em>

                            <span class="j-delete" @click="delScene">删除现场</span>

                            <span class="j-playurl" @click="viewRtpAddr">播放流地址</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fn-pl40 fn-pr40 fn-pt30 fn-pb30 fn-clear">
            <div class="pz-form">
                <form id="j-sceneform">
                    {{csrf_field()}}
                    <div class="formtitle fn-mb30">基本信息</div>
                    <div class="wrap fn-clear">
                        <div class="group2">
                            <div class="row xcy-row fn-mb15">
                                <div class="row-title">现场类型</div>
                                <div class="row-content" data-field="type"><div>
                                        <input type="hidden" :value="id" name="id">
                                                <label> <input type="radio" v-model="arrs.type" name="type" value="4" >视频直播</label>
                                                <label><input type="radio" v-model="arrs.type" name="type"  value="1"  > 图文直播</label>
                                        </div></div>
                            </div>
                            <div class="row xcy-row">
                                <div class="row-title">标题</div>
                                <div class="row-content" data-field="topic"><input type="text" maxlength="30" :value="arrs.title" name="topic" required=""></div>
                            </div>
                            <div class="row xcy-row">
                                <div class="row-title">摘要<p class="j-remark-length fn-right"><span>[[Alength]]</span>/300</p></div>
                                <div class="row-content" data-field="remark"><textarea name="remark" maxlength="300" v-model="content" class="j-remark fn-h140"></textarea></div>
                            </div>
                        </div>
                        <div class="group2 fn-pl40">
                            <div class="row xcy-row fn-mb10">
                                <div class="row-title">封面<em>（750px * 422px）</em></div>
                                <div class="row-content">
                                    <div id="j-cover" class="xcy-cutimg">
                                        <label class="upbtn">
                                            <div class="imgbar"><img :src="arrs.coverPic"></div>

                                            <input type="hidden" :value="arrs.coverPic" name="opic">
                                            <div class="fn-pt25">
                                                <i class="pz-icon icon-img"></i>
                                                <p class="fn-textcenter fn-mt5">点击选择封面图片</p>
                                            </div>
                                            <div class="j-file-input fn-hide">
                                                <input name="pic" type="file"  @change="changePic(this,$event)" accept="image/gif,image/jpeg,image/jpg,image/png">
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
                                                <i @click="play" class="pz-icon icon-video"></i>
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
                                <div class="row-content" data-field="id"><input type="text" v-model="arrs.pid" name="id" class="disabled" disabled=""></div>
                            </div>
                            <div class="row fn-rate40 fn-left">
                                <div class="row-title">创建人</div>
                                <div class="row-content" data-field="creater"><input type="text" v-model="arrs.seter" name="creater" class="disabled" disabled=""></div>
                            </div>
                        </div>
                        <div class="fn-clear">
                            <div class="row fn-rate40 fn-left">
                                <div class="row-title">分享地址</div>
                                <div class="row-content" data-field="xlShortUrl"><input type="text" v-model="arrs.viewUrl" name="xlShortUrl" class="disabled" disabled=""></div>
                            </div>
                            <div class="row fn-rate40 fn-left">
                                <div class="row-title">创建时间</div>
                                <div class="row-content" data-field="gmtCreate"><input type="text" :value="arrs.createAt" name="gmtCreate" class="disabled" disabled=""></div>
                            </div>
                        </div>
                        <div class="fn-clear">
                            {{--<div class="row fn-rate40 fn-left">--}}
                                {{--<div class="row-title">定位城市</div>--}}
                                {{--<div class="row-content">--}}
                                    {{--<select id="j-province"><option value="北京市">北京市</option><option value="天津市">天津市</option><option value="河北省">河北省</option><option value="山西省">山西省</option><option value="内蒙古自治区">内蒙古自治区</option><option value="辽宁省">辽宁省</option><option value="吉林省">吉林省</option><option value="黑龙江省">黑龙江省</option><option value="上海市">上海市</option><option value="江苏省">江苏省</option><option value="浙江省">浙江省</option><option value="安徽省">安徽省</option><option value="福建省">福建省</option><option value="江西省">江西省</option><option value="山东省">山东省</option><option value="河南省">河南省</option><option value="湖北省">湖北省</option><option value="湖南省">湖南省</option><option value="广东省">广东省</option><option value="广西壮族自治区">广西壮族自治区</option><option value="海南省">海南省</option><option value="重庆市">重庆市</option><option value="四川省">四川省</option><option value="贵州省">贵州省</option><option value="云南省">云南省</option><option value="西藏自治区">西藏自治区</option><option value="陕西省">陕西省</option><option value="甘肃省">甘肃省</option><option value="青海省">青海省</option><option value="宁夏回族自治区">宁夏回族自治区</option><option value="新疆维吾尔自治区">新疆维吾尔自治区</option><option value="其他">其他</option></select>--}}
                                    {{--<select id="j-city" name="city" class=""><option value="">其他</option></select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="row row100 fn-rate40 fn-left">
                                <div class="row-title">浏览量显示状态</div>
                                <div class="row-content" data-field="partakeState"><div>
                                        <label>
                                            <input type="radio" name="partakeState" v-model="arrs.partakeState" value="0" checked=""> 显示</label>
                                        <label>
                                            <input type="radio" name="partakeState" v-model="arrs.partakeState" value="1"> 不显示</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="actions actions-transparent fn-pt20">
                        <input @click="submit($event)" class="pz-btn btn-success btn-big" value="保存修改">
                    </div>
                </form>
            </div>
        </div>

        <component :is="currentView" v-if="isalive" :dir="arrs" v-on:refreshbizlines="close"></component>
    </div>

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
        <script type="text/x-template" id="j-overlay-streamurl">
            <div class="pz-overlay" style="display: block;">
                <div class="overlay">
                    <div class="overlay-content" style="margin-left: -261px;">
            <div class="pz-boxhead fn-w520">
                <em class="icon pz-icon icon-warning"></em>
                <span class="title">推流地址</span>
                <span  @click="close"  class="close j-overlay-close">
            <em class="pz-icon icon-close"></em>
          </span>
            </div>
            <div class="pz-boxbody fn-w520">
                <div class="pz-form">
                    <div class="wrap fn-pd20">
                        <div class="fn-pd10 fn-fs16 fn-break" style="border:solid 1px #e5e8ee;border-bottom:none;background:#f7faff;">
                               推流地址: [[rtmpUrl]]
                        </div>
                        <div class="fn-pd10 fn-fs16 fn-break" style="border:solid 1px #e5e8ee;border-top:none;background:#f7faff;">
                            密匙:[[keycode]]
                        </div>
                        <div class="fn-mt5 fn-color-gray">注：此地址可用于把视频直播内容传输到其他服务器</div>
                        <div class="fn-textcenter">
                            <span class="j-copy-streamurl fn-mt20 pz-btn btn-big btn-white fn-hide"><i class="pz-icon icon-copy"></i> 复制推流地址</span>
                        </div>
                    </div>
                </div>
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
        <script type="text/x-template" id="j-overlay-view">

  <div class="pz-overlay" style="display: block;">
      <div class="overlay">
          <div class="overlay-content" style="margin-left: -261px;">
              <div class="pz-boxhead fn-w520">
                  <em class="icon pz-icon icon-warning"></em>
                  <span class="title">现场视频预览</span>
                  <span class="close j-overlay-close" @click="close">
                    <em class="pz-icon icon-close"></em>
                </span> </div> <div class="pz-boxbody fn-w520">
                  <div class="pz-form">
                      <div class="wrap fn-pd20 fn-fs16">
                          <div id="j-viewvideo" style="width:480px;height:270px;background:#000;">
                              <video style="width: 100%;height: 100%;" id="example_video_1"  class="video-js vjs-big-play-centered  vjs-default-skin" controls="controls" preload="auto" width="1280" height="720" poster="http://vjs.zencdn.net/v/oceans.png" data-setup="{}">
                                  <source :src="dir.rtmpUrl" type="rtmp/flv">
                                  <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                              </video>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>


        </script>
<script>
    new Vue({
        delimiters: ['[[', ']]'],
        el:'#scenDe',
        data:{
            Alength:0,
            id:null,
            currentView:'',
            content:'',
            arrs:null,
            isalive:true
        },
        watch:{
            content:function (newValue) {
                this.Alength=newValue.length;
            }
        },
        methods:{
            goback:function () {
                window.history.go(-1)
            },
            changePic:function (m,e) {
                var imgUrl=window.URL.createObjectURL(e.currentTarget.files[0]);
                this.arrs.coverPic=imgUrl;
            },
            submit:function (e) {
              e.preventDefault();
              var tag=document.getElementById('j-sceneform');
              var dates=new FormData(tag);
              this.$http.post('/Api/editScene',dates).then(function (res) {
                  if (res.body=='1'){
                      alert('编辑成功！')
                  }else{
                      alert('请重试！')
                  }
              },function (e) {
                  console.log(e);
              })
            },
            del:function () {
              if(confirm('确认删除此场景吗？')){
                  this.$http.post('/Api/getDetails',{act:'delScen','id':this.id,'_token':'{{csrf_token()}}'}).then(function (res) {
                      this.arrs=eval(res.body)[0];
                      this.content=this.arrs.content;
                  },function (error) {
                      console.log(error)
                  })
              }
            },
            close:function (id) {
                 if (id=='viewScen'){
                     var myPlayer=videojs("example_video_1");
                     myPlayer.dispose();
                 }
                this.isalive=false;
            },
            play:function () {
                this.isalive=true;
                this.currentView='viewScen';
            },viewRtpAddr:function () {
                this.isalive=true;
                this.currentView='rtmpAdd';
            },delScene:function () {
                console.log('del')
            }
        }
        ,components:{
            viewScen:{//#j-overlay-view
                delimiters: ['[[', ']]'],
                template:"#j-overlay-view",
                props:['dir'],
                data:function () {
                    return{
                    }
                },methods:{
                    close:function () {
                        this.$emit('refreshbizlines','viewScen');
                    }
                },
                mounted:function () {
                    var that=this;
                    var rtmpUrls=that.dir.rtmpUrl.split("|||");
                    if (that.dir.rtmpUrl.indexOf("|||")>=0){
                        rtmpUrls[0]=rtmpUrls[0]+ rtmpUrls[1].split("?")[0];
                        that.dir["rtmpUrl"]= rtmpUrls[0];
                    }else{
                        that.dir["rtmpUrl"]= rtmpUrls[0];
                    }
                    var myPlayer=videojs("example_video_1");
                    myPlayer.src(that.dir["rtmpUrl"]);
                    myPlayer.load(that.dir["rtmpUrl"]);
                }
            } ,
            rtmpAdd:{
                delimiters: ['[[', ']]'],
                props:['dir'],
                data:function () {
                    return{
                        rtmpUrl:'',
                        keycode:''
                    }
                },methods:{
                    close:function () {
                        this.$emit('refreshbizlines','rtmp');
                    }
                },
                template:'#j-overlay-streamurl',
                mounted:function () {
                    var that=this;
                    var rtmpUrls=that.dir.rtmpUrl.split("|||");
                    this.rtmpUrl=rtmpUrls[0];
                    this.keycode=rtmpUrls[1];
                }
            },
        },
        mounted:function () {
            this.id=parent.document.getElementById('inframe').dataset.pid;
            this.$http.post('/Api/getDetails',{act:'getDetail','id':this.id,'_token':'{{csrf_token()}}'}).then(function (res) {
                this.arrs=eval(res.body)[0];
                this.content=this.arrs.content;
            },function (error) {
                console.log(error)
            })
        }
    })
</script>
    </div>
</html>

