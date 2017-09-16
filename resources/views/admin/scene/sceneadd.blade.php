<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>创建现场</title>
    <link rel="stylesheet" href="/css/main/datetimepicker.css">
    <link rel="stylesheet" href="/css/main/ui.css">
</head>
<body>

<div class="fn-pl40 fn-pr40 fn-pt30 fn-pb30 fn-clear">
    <div class="pz-form">
        <form id="j-sceneform" enctype="multipart/form-data">
            {{csrf_filed()}}
            <div class="wrap fn-clear">
                <div class="group2">
                    <div class="row xcy-row">
                        <div class="row-title">标题</div>
                        <div class="row-content" data-field="topic"><input type="text" maxlength="30" name="topic" required=""></div>
                    </div>
                    <div class="row xcy-row">
                        <div class="row-title">摘要<p class="j-remark-length fn-right"><span>0</span>/300</p></div>
                        <div class="row-content" data-field="remark"><textarea name="remark" class="j-remark fn-h140"></textarea></div>
                    </div>
                </div>
                <div class="group2 fn-pl40">
                    <div class="row xcy-row">
                        <div class="row-title">现场类型</div>
                        <div class="row-content" data-field="type"><div><label><input type="radio" name="type" value="4" checked=""> 视频直播</label><label><input type="radio" name="type" value="1"> 图文直播</label></div></div>
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
                                        <input type="file" accept="image/gif,image/jpeg,image/jpg,image/png">
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


</body></html>