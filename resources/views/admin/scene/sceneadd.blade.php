<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>创建现场</title>
    <link rel="stylesheet" href="/css/main/datetimepicker.css">
    <link rel="stylesheet" href="/css/main/ui.css">
    <script src="/js/jq.min.js"></script>
</head>
<body>

<div class="fn-pl40 fn-pr40 fn-pt30 fn-pb30 fn-clear">
    <div class="pz-form">
        <form id="j-sceneform" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="wrap fn-clear">
                <div class="group2">
                    <div class="row xcy-row">
                        <div class="row-title">标题</div>
                        <div class="row-content" data-field="topic"><input type="text" maxlength="30" name="topic" required=""></div>
                    </div>
                    <div class="row xcy-row">
                        <div class="row-title">摘要<p class="j-remark-length fn-right"><span>0</span>/300</p></div>
                        <div class="row-content" data-field="remark"><textarea name="remark" required class="j-remark fn-h140"></textarea></div>
                    </div>
                </div>
                <div class="group2 fn-pl40">
                    <div class="row xcy-row">
                        <div class="row-title">现场类型</div>
                        <div class="row-content" data-field="type"><div><label><input type="radio" required name="type" value="4" checked=""> 视频直播</label><label><input type="radio" name="type" value="1"> 图文直播</label></div></div>
                    </div>
                    <div class="row xcy-row">
                        <div class="row-title">封面<em>（750px * 422px）</em></div>
                        <div class="row-content">
                            <div id="j-cover" class="xcy-cutimg">
                                <label class="upbtn">
                                    <div class="imgbar fn-hide"></div>
                                    <div class="fn-pt25">
                                        <i class="pz-icon icon-img"></i>
                                        <p class="fn-textcenter fn-mt5">点击选择封面图片</p>
                                    </div>
                                    <div class="j-file-input fn-hide">
                                        <input required type="file" id="image" name="image" accept="image/gif,image/jpeg,image/jpg,image/png">
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="actions actions-transparent fn-pt20">
                <input type="submit" class="pz-btn btn-success btn-big" value="发布现场">
            </div>

        </form>
    </div>
</div>
<script>
    var test=parent.document.getElementById('j-org');

    $(function(e){
        $('#image').on('change',function(e){
            console.log(e);
            $('.fn-pt25').hide();
            var imgUrl= window.URL.createObjectURL(this.files[0]);
            $('#imgSrc').attr('src',imgUrl);
           $('.upbtn').css(
               {"background":"url(\""+(imgUrl)+"\") no-repeat center",
                   "background-size":"100% 100%"
               }
               );
        })

        $("#j-sceneform").on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url: "{{url('Api/sceneAdd')}}",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                // 显示加载图片
                success: function (data) {
                  if(data==1){
                      alert('添加成功');
                      parent.document.getElementById('inframe').src="/admin/scene/scenelist"
                  }else{
                      alert('添加失败！请重新检查')
                  }
                },
                error: function(){}
            });
        });
    })
</script>


</body></html>