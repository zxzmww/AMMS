{:R('Head/index','','Widget')}
{:R('Header/index','','Widget')}
<div class="container">
    <ul class="nav nav-tabs  mb20" role="tablist">
        <li role="presentation"><a href="{:U('/Home/Node/Listview')}"><span class="glyphicon glyphicon-list"></span> 模块列表</a></li>
        <li role="presentation"  class="active"><a href="{:U('/Home/Node/Addview')}"><span class="glyphicon glyphicon-plus"></span> 添加</a></li>
    </ul>
    <div class="panel panel-default"> 
        <!-- Default panel contents -->
        <div class="panel-heading">添加</div>
        <div class="panel-body">
            <p>
            <form class="form-horizontal" role="form" method="post"  action="<?php echo (U('Home/Node/' . ACTION_NAME)); ?>">
                <div class="form-group">
                    <label for="pid" class="col-sm-2 control-label">上级</label>
                    <div class="col-sm-3">
                        <select class="form-control" id="pid" name="pid">
                            <option value="0">根节点</option>
                            <?php
                            echo $selectview;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="level" class="col-sm-2 control-label">级别</label>
                    <div class="col-sm-3">
                        <select class="form-control" id="level" name="level">
                            <?php
                            echo $echo_select_level;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">名称</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="title" name="title" required value="<?php echo $result['title']; ?>" placeholder="名称">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">标识</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="name" name="name" required value="<?php echo $result['name']; ?>" placeholder="标识">
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">状态</label>
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" name="status" id="inlineRadio1" value="1" <?php if ($result['status'] == 1) {
                                echo 'checked';
                            } ?>  >
                            开启 </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" id="inlineRadio2" value="0" <?php if ($result['status'] == 0) {
                                echo 'checked';
                            } ?> >
                            关闭 </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="hidden" name="id" id="id" value="<?php echo $result['id']; ?>">
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