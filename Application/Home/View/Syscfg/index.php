{:R('Head/index','','Widget')}
{:R('Header/index','','Widget')}
<div class="container">
    <div class="panel panel-default"> 
        <!-- Default panel contents -->
        <div class="panel-heading">系统参数配置</div>
        <div class="panel-body">
            <p>
            <form class="form-horizontal" role="form" method="post" action="{:U('/Home/Syscfg')}">
                <div class="form-group">
                    <label for="logo" class="col-sm-2 control-label">公司LOGO</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="logo" id="logo" value="<?php echo($info['logo']); ?>" placeholder="公司LOGO" />
                    </div>
                    <div class="col-sm-4">
                        <input type="button" id="logo_upload" name="logo_upload" value="选择上传图片"  class="btn btn-info btn-sm"  />
                    </div>
                </div>
                <div class="form-group">
                    <label for="title_1" class="col-sm-2 control-label">主标题</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="title_1" name="title_1"  value="<?php echo($info['title_1']); ?>" placeholder="主标题">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title_2" class="col-sm-2 control-label">副标题</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="title_2" name="title_2" value="<?php echo($info['title_2']); ?>"  placeholder="副标题">
                    </div>
                </div>
                <div class="form-group">
                    <label for="copyright" class="col-sm-2 control-label">版权信息</label>
                    <div class="col-sm-5">
                        <textarea name="copyright" class="form-control" id="copyright" placeholder="版权信息"><?php echo($info['copyright']); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">保存</button>
                    </div>
                </div>
            </form>
            </p>
        </div>
    </div>
</div>
<!-- /container --> 

<include file="Public/foot"/>
<link rel="stylesheet" href="__PUBLIC__/kindeditor/themes/default/default1.css" />
<script charset="utf-8" src="__PUBLIC__/kindeditor/kindeditor-min.js"></script> 
<script charset="utf-8" src="__PUBLIC__/kindeditor/lang/zh_CN.js"></script> 
<script>
    /*var editor;
     KindEditor.ready(function(K) {
     editor = K.create('textarea[name="copyright"]', {
     resizeType : 1,
     allowPreviewEmoticons : false,
     allowImageUpload : false,
     items : [
     'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
     'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
     'insertunorderedlist', '|', 'emoticons', 'image', 'link']
     });
     });*/
</script> 
<script>
    KindEditor.ready(function(K) {

        var editor = K.editor({
            allowFileManager: true
        });

        K.each({
            'plug-align': {
                name: '对齐方式',
                method: {
                    'justifyleft': '左对齐',
                    'justifycenter': '居中对齐',
                    'justifyright': '右对齐'
                }
            },
            'plug-order': {
                name: '编号',
                method: {
                    'insertorderedlist': '数字编号',
                    'insertunorderedlist': '项目编号'
                }
            },
            'plug-indent': {
                name: '缩进',
                method: {
                    'indent': '向右缩进',
                    'outdent': '向左缩进'
                }
            }
        }, function(pluginName, pluginData) {
            var lang = {};
            lang[pluginName] = pluginData.name;
            KindEditor.lang(lang);
            KindEditor.plugin(pluginName, function(K) {
                var self = this;
                self.clickToolbar(pluginName, function() {
                    var menu = self.createMenu({
                        name: pluginName,
                        width: pluginData.width || 100
                    });
                    K.each(pluginData.method, function(i, v) {
                        menu.addItem({
                            title: v,
                            checked: false,
                            iconClass: pluginName + '-' + i,
                            click: function() {
                                self.exec(i).hideMenu();
                            }
                        });
                    })
                });
            });
        });
        K.create('#copyright', {
            themeType: 'qq',
            items: [
                'bold', 'italic', 'underline', 'fontname', 'fontsize', 'forecolor', 'hilitecolor', 'plug-align', 'plug-order', 'plug-indent', 'link'
            ]
        });





        K('#logo_upload').click(function() {
            editor.loadPlugin('image', function() {
                editor.plugin.imageDialog({
                    showRemote: false,
                    imageUrl: K('#logo').val(),
                    clickFn: function(url, title, width, height, border, align) {
                        K('#logo').val(url);
                        editor.hideDialog();
                    }
                });
            });
        });


    });
</script>