<html><head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>现场管理</title>
    <link rel="stylesheet" href="/css/main/ui.css">
    <script src="/js/vue-min.js"></script>
    <script src="/js/vue-resource.js"></script>
</head>
<body>
<style>

    .progress{background:#000 ;color: white}
    .close{position: absolute;
        top: 8px;
        right: 8px;
        width: 24px;
        height: 24px;
        line-height: 24px;
        color: #fff;
        background-color: red;
        text-align: center;
        border-radius: 50%;}
    .progress div:nth-child(1){padding: 20px 0 0 0}
    .xcy-video{background: #000}
    .fn-left{    padding: 10px 0 0 10px;}
</style>
<div id="app">
    <component :is="currentView" :dir="items" v-on:refreshbizlines="makeReport"></component>
</div>
<script id="edit" type="text/template">
    <div>
        <div id="j-search" class="pz-form pz-searchform xcy-search fn-clear">
            <span id="j-back" @click="back" class="fn-left pz-btn btn-white"><i class="pz-icon icon-back1"></i> 返回</span>
        </div>
        <div class="fn-pl40 fn-pr40 fn-pt30 fn-pb30 fn-clear">
            <div class="pz-form">
                <form id="j-reportform">
                    {{csrf_field()}}
                    <div class="wrap fn-clear">
                        <div class="group2">
                            <div class="row xcy-row">
                                <div class="row-title">报道内容</div>
                                <div class="row-content" data-field="content"><textarea name="content" class="j-content fn-h180"></textarea></div>
                            </div>
                            <div class="row xcy-row">
                                <div class="row-title">所属现场</div>
                                <div class="row-content" data-field="scene"><input type="text" v-model="dir[0].title" name="scene" class="disabled" disabled=""></div>
                            </div>
                        </div>
                        <div class="group2 fn-pl40">
                            <div class="row xcy-row fn-mb0">
                                <div class="row-title">报道类型</div>
                                <div class="row-content" data-field="type">
                                    <div>

                                        <label><input type="radio" name="type" v-model="type" value="1" checked="">图文报道</label>
                                        <label><input type="radio" name="type"  v-model="type" value="4"> 视频报道</label>
                                    </div></div>
                            </div>
                            <div class="row xcy-row">
                                <div id="j-upcontain" class="row-content">
                            <div v-if="type ==1">
                                <div id="j-row-img" class=" fn-left">
                                    <div class="j-uploader-tip upbtn toplayer fn-hide">
                                        <div class="fn-pt25">
                                            <i class="pz-icon icon-img"></i>
                                            <p class="fn-textcenter fn-mt5"></p>
                                        </div>
                                    </div>
                                    <div id="j-cover" class="xcy-cutimg">
                                         <label class="upbtn">
                                            <div class="imgbar fn-hide"></div>
                                            <div class="fn-pt25">
                                                <i class="pz-icon icon-img"></i>
                                                <p class="fn-textcenter fn-mt5">点击选择封面图片</p>
                                            </div>
                                            <div class="j-file-input fn-hide">
                                                <input required type="file"   @change="imgUrl($event)" id="image" name="image[]" accept="image/gif,image/jpeg,image/jpg,image/png">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                    <div v-for="x in picList" v-show="ispicList">
                                        <div id="j-row-img" class=" fn-left">
                                            <div class="j-uploader-tip upbtn toplayer fn-hide">
                                                <div class="fn-pt25" style="display: none;">
                                                    <i class="pz-icon icon-img"></i>
                                                    <p class="fn-textcenter fn-mt5"></p>
                                                </div>
                                            </div>
                                            <div id="j-cover" class="xcy-cutimg" >
                                        <span @click="close(x)" class="close" style="">
                                            <i class="pz-icon icon-close" style="font-size: 25px;"></i>
                                        </span>
                                            </div>
                                        </div>
                                    </div>


                            </div>
                                 <div v-else>
                                     <div id="j-row-video" class="" style="position: relative;">
                                         <div class="xcy-video">
                                             <div class="imgbar"></div>
                                             <div class="j-uploader-tip upbtn toplayer fn-hide">
                                                 <div class="fn-pt25">
                                                     <i class="pz-icon icon-video"></i>
                                                     <p class="fn-textcenter fn-mt5"></p>
                                                 </div>
                                             </div>
                                             <div class="videobar toplayer fn-hide">
                                                 <div class="fn-pt30">
                                                     <span class="close"><i class="pz-icon icon-close"></i></span>
                                                     <i class="pz-icon icon-video"></i>
                                                     <p class="fn-textcenter fn-mt10">点击播放</p>
                                                 </div>
                                             </div>
                                             <div id="j-uploader-selectvideo" class="j-uploader-select upbtn fn-cursor-pointer" style="position: relative; z-index: 1;">
                                                <div class="progress"  v-show="tag" style="width: 100%;height: 100%">
                                                    <div @click="preView"><i class="pz-icon icon-video"></i></div>
                                                    <span v-show="uploadsDtail.close" @click="close" class="close"><i class="pz-icon icon-close" style="font-size: 25px;"></i></span>
                                                    <div>[[uploadsDtail.mesg]]</div>
                                                    [[process]]
                                                </div>
                                                 <div class="fn-pt25" v-show="!tag">
                                                     <label class="upbtn">
                                                         <i class="pz-icon icon-video"></i>
                                                         <p class="fn-textcenter fn-mt5">点击选择报道视频</p>
                                                         <div class="j-file-input fn-hide">
                                                             <input required type="file"  @change="imgUrl($event)" id="image" name="video" accept="video/3gpp,video/mp4,.m3u8,video/x-ms-wmv,video/webm,video/quicktime,video/avi,video/mpeg,.mpeg1,.mpeg4,video/x-matroska,video/x-flv">
                                                         </div>
                                                     </label>
                                                 </div>

                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="actions actions-transparent fn-pt20">
                        <input type="button" @click="submit" class="pz-btn btn-success btn-big" value="发布报道">
                    </div>
                </form>
            </div>
        </div>
    </div>
</script>

<script  id="mainScen" type="text/template">
    <div>

        <div id="j-list" class="fn-pt30 fn-pb30 fn-pl40 fn-pr40">
            <div class="fn-fs14" style="color:#666;">当前正在直播的现场</div>
            <div class="pz-table fn-mt10">

                <table class="table-noborder table-noheader">
                    <tbody>
                    <tr v-for="(item,index) in dates">
                    <td>[[item.title]]</td>
                    <td>[[item.seter]]
                    </td>
                    <td class="fn-textcenter">[[item.createAt]]</td>
                    <td class="fn-textcenter">
                    <a class="j-get" href="javascript:void(0)" @click="report(index,item.id)">发布报道</a>
                    </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</script>

<script>
  new Vue({
        delimiters: ['[[', ']]'],
        el:'#app',
        data:{
            items:'',
            tes:'21',
            currentView:''
        },
      components:{
            mainS:{
                delimiters: ['[[', ']]'],
                template:'#mainScen',
                methods:{
                    report:function (index,id) {
                        localStorage.setItem("index", index);
                        localStorage.setItem("id", id);
                        var a=[index,id];
                        this.$emit('refreshbizlines',a);
                    }
                },
                data:function(){
                    return{
                        dates:'',
                        flag:'1'
                    }
                },
                props:['dir'],
                mounted:function () {
                    this.dates=this.dir;
                }
            },
            makereport:{
                delimiters: ['[[', ']]'],
                template:'#edit',
                props:['dir'],
                data:function () {
                    return{
                        type:1,
                        process:'',
                        tag:false,
                        ispicList:true,
                        picList:new Array(),
                        uploadsDtail:{
                            close:false,
                            mesg:'上传中'
                        },
                        vUrl:''
                    }
                },
                methods:{
                    submit:function () {
                        var data=new FormData(document.getElementById('j-reportform'));
                        data.append('type',this.type);
                        data.append('id',this.dir[0].id);
                        this.$http.post('/Api/makeremake',data).then(function (res) {
                            console.log(res)
                        },function (e) {
                            console.log(e)
                        })
                    },
                    imgUrl:function (e) {
                        console.log()
                        var target=$('#j-row-img').clone(true);
                        var that=this;
                        $('.fn-pt25').hide();
                        var imgUrl= window.URL.createObjectURL(e.target.files[0]);
                        if (this.type==1){
                          //  $('#imgSrc').attr('src',imgUrl);
                            $(e.path[3]).css(
                                {"background":"url(\""+(imgUrl)+"\") no-repeat center",
                                    "background-size":"100% 100%"
                                }
                            );
                            var data=new FormData(document.getElementById('j-reportform'));
                            data.append('act','setUp');
                            data.append('fileType','pic');
                            this.$http.post('/Api/makeremake',data).then(function (res) {
                                 that.picList.push(1);
                                that.uploadsDtail.close=true;
                                this.items=eval('('+res.body+')');
                            },function (e) {
                                console.log(e)
                            })
                        }else{
                       $('#upvideo').attr('src',imgUrl);
                       //video先上传 再回传地址
                            var data=new FormData(document.getElementById('j-reportform'));
                           data.append('act','setUp');
                            data.append('fileType','video');
                            this.$http.post('/Api/makeremake',data,{progress:function (event) {
                                that.tag=true;
                                var size=event.total;
                                that.process=parseInt(event.loaded/size*100)+'%';
                               if(that.process=='100%'){
                                   that.uploadsDtail.close=true;
                                   that.uploadsDtail.mesg='上传完成，大小'+parseInt(size/1024000)+'m';
                               }
                            }}).then(function (res) {
                                this.items=eval('('+res.body+')');
                            },function (e) {
                                console.log(e)
                            })
                       $('#tVideo').attr('autoplay','autoplay');
                        }

                    },
                    back:function () {
                        this.$emit('refreshbizlines','mainS');
                    },
                    preView:function () {
                        console.log('clicked')
                    },
                    close:function () {
                        var that=this;
                        this.$http.post('/Api/makeremake',{act:'del','_token':'{{csrf_token()}}','target':this.items}).then(function (res) {
                            if (res.body=='true'){
                                that.tag=false;


                                that.uploadsDtail.close=false;
                                that.uploadsDtail.mesg='上传中...';
                            }
                        },function (e) {
                            console.log(e)
                        })
                    }
                },
                mounted:function () {
                }
            }
      },
          methods:{
              makeReport:function (a) {
                  if(typeof (a)=='string'){
                      this.currentView='mainS';
                  }else{
                      this.currentView='makereport';
                  }

              }
          },
        mounted:function () {
               this.$http.post('/Api/makerepot',{act:'makereport','_token':'{{csrf_token()}}'}).then(function (res) {
               this.items=eval('('+res.body+')');
               this.currentView='makereport';
            },function (e) {
                console.log(e)
            })
        }
    })
</script>
<script src="/js/jq.min.js"></script>
</body></html>