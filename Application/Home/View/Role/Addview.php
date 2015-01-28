{:R('Head/index','','Widget')}
{:R('Header/index','','Widget')}
<div class="container">
  <ul class="nav nav-tabs  mb20" role="tablist">
    <li role="presentation"><a href="{:U('/Home/Role/Listview')}"><span class="glyphicon glyphicon-list"></span> 角色列表</a></li>
    <li role="presentation"  class="active"><a href="{:U('/Home/Role/Addview')}"><span class="glyphicon glyphicon-plus"></span> 添加</a></li>
  </ul>
  <div class="panel panel-default"> 
    <!-- Default panel contents -->
    <div class="panel-heading">添加</div>
    <div class="panel-body">
      <p>
      <form class="form-horizontal" role="form" method="post">
        <div class="form-group">
          <label for="name" class="col-sm-2 control-label">角色名称</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="name" name="name" required placeholder="角色名称">
          </div>
        </div>
        <div class="form-group">
          <label for="remark" class="col-sm-2 control-label">角色描述</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="remark" name="remark" placeholder="角色描述">
          </div>
        </div>
        <div class="form-group">
          <label for="status" class="col-sm-2 control-label">是否开启</label>
          <div class="col-sm-4">
            <label class="radio-inline">
              <input type="radio" name="status" id="inlineRadio1" value="1" checked>
              开启 </label>
            <label class="radio-inline">
              <input type="radio" name="status" id="inlineRadio2" value="0">
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