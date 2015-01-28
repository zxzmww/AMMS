{:R('Head/index','','Widget')}
{:R('Header/index','','Widget')}
<div class="container">
    <ul class="nav nav-tabs  mb20" role="tablist">
        <li role="presentation"  class="active"><a href="{:U('/Home/Syscfg/PersonInfo')}">个人信息配置</a></li>
        <li role="presentation"><a href="{:U('/Home/Syscfg/ChangePwd')}">密码修改</a></li>
    </ul>
    <div class="panel panel-default"> 
        <!-- Default panel contents -->
        <div class="panel-heading">个人信息配置</div>
        <div class="panel-body">
            <p>
            <form class="form-horizontal" role="form" method="post">
                <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">用户名</label>
                    <div class="col-sm-4">
                        <p class="form-control-static"> 用户名 </p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="u_nickname" class="col-sm-2 control-label">昵称</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="u_nickname" name="u_nickname" required value="<?php echo $result['u_nickname']; ?>" placeholder="昵称">
                    </div>
                </div>
                <div class="form-group">
                    <label for="u_email" class="col-sm-2 control-label">邮箱地址</label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" id="u_email" name="u_email" value="<?php echo $result['u_email']; ?>"  placeholder="邮箱地址">
                    </div>
                </div>
                <div class="form-group">
                    <label for="u_mobile" class="col-sm-2 control-label">手机号码</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="u_mobile" name="u_mobile"  value="<?php echo $result['u_mobile']; ?>"  placeholder="手机号码">
                    </div>
                </div>               
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="hidden" name="hiddenField" id="hiddenField" />
                        <button type="submit" class="btn btn-primary">保存</button>
                    </div>
                </div>
            </form>
            </p>
        </div>
    </div>
</div>
<!-- /container --> 

{:R('Footer/copyright','','Widget')} <include file="Public/foot"/> 