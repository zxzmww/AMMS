{:R('Head/index','','Widget')}
{:R('Header/index','','Widget')}
<div class="container">
    <ul class="nav nav-tabs  mb20" role="tablist">
        <li role="presentation"><a href="{:U('/Home/Syscfg/PersonInfo')}">个人信息配置</a></li>
        <li role="presentation"  class="active"><a href="{:U('/Home/Syscfg/ChangePwd')}">密码修改</a></li>
    </ul>
    <div class="panel panel-default"> 
        <!-- Default panel contents -->
        <div class="panel-heading">密码修改</div>
        <div class="panel-body">
            <p>
            <form id="changepwd_form"  class="form-horizontal" role="form" method="post">
                <div class="form-group">
                    <label for="password_old" class="col-sm-2 control-label">原密码</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="password_old" id="password_old" required placeholder="原密码" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="password_new" class="col-sm-2 control-label">新密码</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control"  name="password_new" id="password_new" required placeholder="新密码">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password_new_again" class="col-sm-2 control-label">新密码确认</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="password_new_again" id="password_new_again" required placeholder="新密码确认">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">保存</button>
                        <button type="button" class="btn btn-default" onclick="history.back();">返回</button>
                    </div>
                </div>
            </form>
            </p>
        </div>
    </div>
</div>
<!-- /container --> 

{:R('Footer/copyright','','Widget')} <include file="Public/foot"/>
<link rel="stylesheet" href="__PUBLIC__/bootstrapvalidator/bootstrapValidator.min.css"/>
<script type="text/javascript" src="__PUBLIC__/bootstrapvalidator/bootstrapValidator.min.js"></script> 
<script type="text/javascript">
$(document).ready(function() {
    $('#changepwd_form').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            password_old: {
                validators: {
                    notEmpty: {message: '不能为空'},
                    remote: {
                        url: '<?php echo U('/Home/Syscfg/ChangePwd_check'); ?>',
                        message: '您输入的旧密码有误'
                    },
                    different: {
                        field: 'password_new',
                        message: '旧密码与新密码相同'
                    }
                }
            },
            password_new: {
                validators: {
                    notEmpty: {message: '不能为空'},
                    identical: {
                        field: 'password_new_again',
                        message: '新密码和确认密码不同'
                    },
                    different: {
                        field: 'password_old',
                        message: '旧密码与新密码相同'
                    }
                }
            },
            password_new_again: {
                validators: {
                    notEmpty: {message: '不能为空'},
                    identical: {
                        field: 'password_new'
                    },
                    different: {
                        field: 'password_old',
                        message: '旧密码与新密码相同'
                    }
                }
            }//结束符
        }
    });
});
</script> 
