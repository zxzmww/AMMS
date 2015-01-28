{:R('Head/index','','Widget')}
{:R('Header/index','','Widget')}
<div class="container">
    <ul class="nav nav-tabs  mb20" role="tablist">
        <li role="presentation"  class="active"><a href="{:U('/Home/Role/Listview')}"><span class="glyphicon glyphicon-list"></span> 角色列表</a></li>
        <!--<li role="presentation"><a href="{:U('/Home/Role/Addview')}"><span class="glyphicon glyphicon-plus"></span> 添加</a></li>-->
    </ul>
    <div class="table-responsive">
        <table class="table table-striped" style="background-color:#fff">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>角色名</th>
                    <th>角色描述</th>
                    <th>状态</th>
                    <th>操作 </th>
                </tr>
            </thead>
            <?php
            foreach ($listview as $key => $val) {
                ?>
                <tr>
                    <td><?php echo $val['id']; ?></td>
                    <td><?php echo $val['name']; ?></td>
                    <td><?php echo $val['remark']; ?></td>
                    <td><?php echo ($val['status'] == 1) ? 'ON' : 'OFF'; ?></td>
                    <td><!--<a  href="<?php echo U('/Home/Role/Editview/id/' . $val['id']); ?>" class="btn btn-success btn-xs">编辑</a>--> 
                      <!--<a  href="<?php echo U('/Home/Role/Delete/id/' . $val['id']); ?>" class="btn btn-danger btn-xs">删除</a>--> 
                        <a  href="<?php echo U('/Home/Node/index/Rid/' . $val['id']); ?>" class="btn btn-primary btn-xs">权限</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <nav  class="text-center">
        <ul class="pagination">
            <?php
            echo $pageview;
            ?>
        </ul>
    </nav>
</div>
<!-- /container --> 

<include file="Public/foot"/> 