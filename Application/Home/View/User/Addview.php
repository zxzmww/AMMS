{:R('Head/index','','Widget')}
{:R('Header/index','','Widget')}
<div class="container">
    <ul class="nav nav-tabs  mb20" role="tablist">
        <li role="presentation" ><a href="{:U('/Home/User/Listview')}"><span class="glyphicon glyphicon-list"></span> 用户列表</a></li>
        <li role="presentation" class="active"><a href="{:U('/Home/User/Addview')}"><span class="glyphicon glyphicon-plus"></span> 添加</a></li>
    </ul>
    <div class="panel panel-default"> 
        <!-- Default panel contents -->
        <div class="panel-heading">添加</div>
        <div class="panel-body">
            <p>
            <form class="form-horizontal" role="form" method="post">
                <div class="form-group">
                    <label for="u_username" class="col-sm-2 control-label">用户名</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="u_username" name="u_username" required placeholder="用户名称">
                    </div>
                </div>
                <div class="form-group">
                    <label for="u_password" class="col-sm-2 control-label">密码</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="u_password" name="u_password" required placeholder="密码">
                    </div>
                </div>
                <div class="form-group" >
                    <label class="col-sm-2 control-label" for="exampleInputPassword2">所属角色</label>
                    <div class="col-sm-3">
                        <select class="form-control" id="role_id" name="role_id">
                            <?php
                            echo $echo_select_role;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" >
                    <label  for="u_corp_id" class="col-sm-2 control-label" >保险公司</label>
                    <div class="col-sm-3">
                        <select class="form-control" id="u_corp_id" name="u_corp_id">
                            <option value="0">请选择</option>
                            <?php
                            echo $echo_select_corp;
                            ?>
                        </select>
                        <span class="help-block">如果角色为保险公司则选择该项</span> </div>
                </div>
                <div class="form-group" >
                    <label  for="u_cate_1" class="col-sm-2 control-label" >一级机构</label>
                    <div class="col-sm-3">
                        <select class="form-control" id="u_cate_1" name="u_cate_1">
                            <?php
                            echo $echo_select_corp_cate;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" >
                    <label  for="u_cate_2"  class="col-sm-2 control-label">二级机构</label>
                    <div class="col-sm-3">
                        <select class="form-control" id="u_cate_2" name="u_cate_2">
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="u_status" class="col-sm-2 control-label">是否开启</label>
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" name="u_status" id="inlineRadio1" value="1" checked>
                            开启 </label>
                        <label class="radio-inline">
                            <input type="radio" name="u_status" id="inlineRadio2" value="0">
                            关闭 </label>
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

<!--联动二级下拉菜单--> 
<script>
function getSelectVal() {
    $.getJSON("{:U('/Home/CorpRole/AjaxGetCate')}", {bigid: $("#u_cate_1").val()}, function(json) {
        var small_id = $("#u_cate_2");
        $("option", small_id).remove(); //清空原有的选项 
        $.each(json, function(index, array) {
            var option = "<option value='" + array['id'] + "'>" + array['title'] + "</option>";
            small_id.append(option);
        });
    });
}

$(function() {
    getSelectVal();
    $("#u_cate_1").change(function() {
        getSelectVal();
    });

});
</script> 
