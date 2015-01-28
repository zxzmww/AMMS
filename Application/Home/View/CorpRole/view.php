{:R('Head/index','','Widget')}
{:R('Header/index','','Widget')}
<div class="container">
    <?php if (ACTION_NAME == 'Addview') {
        ?>
        <ul class="nav nav-tabs  mb20" role="tablist">
            <li role="presentation"><a href="{:U('/Home/CorpRole/Listview')}"><span class="glyphicon glyphicon-list"></span> 公司组织机构列表</a></li>
            <li role="presentation" class="active"><a href="{:U('/Home/CorpRole/Addview')}" ><span class="glyphicon glyphicon-plus"></span> 添加</a></li>
        </ul>
        <?php
    } else {
        ?>
        <ul class="nav nav-tabs  mb20" role="tablist">
            <li role="presentation" class="active"><a href="{:U('/Home/CorpRole/Listview')}"><span class="glyphicon glyphicon-list"></span> 公司组织机构列表</a></li>
            <li role="presentation"><a href="{:U('/Home/CorpRole/Addview')}" ><span class="glyphicon glyphicon-plus"></span> 添加</a></li>
        </ul>
        <?php
    }
    ?>
    <div class="panel panel-default"> 
        <!-- Default panel contents -->
        <div class="panel-heading">添加一个角色</div>
        <div class="panel-body">
            <p>
            <form class="form-horizontal" role="form" method="post"  action="<?php echo (U('Home/CorpRole/' . ACTION_NAME)); ?>">
                <div class="form-group">
                    <label for="pid" class="col-sm-2 control-label">所属ID</label>
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
                    <label for="title" class="col-sm-2 control-label">名称</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="title" name="title" required value="<?php echo $result['title']; ?>" placeholder="名称">
                    </div>
                </div>
                <div class="form-group">
                    <label for="sort" class="col-sm-2 control-label">排序</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="sort" name="sort" required value="<?php echo $result['sort']; ?>" 
                        placeholder="排序"  onkeyup="value=value.replace(/[^\d]/g,'')"/>
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