{:R('Head/index','','Widget')}
{:R('Header/index','','Widget')}
<div class="container">
    <ul class="nav nav-tabs  mb20" role="tablist">
        <li role="presentation"  class="active"><a href="{:U('/Home/User/Listview')}"><span class="glyphicon glyphicon-list"></span> 用户列表</a></li>
        <li role="presentation"><a href="{:U('/Home/User/Addview')}"><span class="glyphicon glyphicon-plus"></span> 添加</a></li>
    </ul>
    <div class="table-responsive">
        <table class="table table-striped" style="background-color:#fff">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>用户名</th>
                    <th>上一次登陆IP</th>
                    <th>上一次登录时间</th>
                    <th>所属角色</th>
                    <th>状态</th>
                    <th>操作 </th>
                </tr>
            </thead>
            <?php
            foreach ($listview as $key => $val) {
                ?>
                <tr>
                    <td><?php echo $val['u_id']; ?></td>
                    <td><?php echo $val['u_username']; ?></td>
                    <td><?php echo $val['u_loginip']; ?></td>
                    <td><?php echo date('Y-m-d H:i:s', $val['u_logintime']); ?></td>
                    <td><?php echo $val['role'][0]['name']; ?></td>
                    <td><?php echo ($val['u_status'] == 1) ? 'ON' : 'OFF'; ?></td>
                    <td><a  href="<?php echo U('/Home/User/Editview/id/' . $val['u_id']); ?>" class="btn btn-success btn-xs">编辑</a>
                        <?php
                        if ($val['u_username'] != 'superadmin') {
                            ?>
                            <a  href="<?php echo U('/Home/User/Delete/id/' . $val['u_id']); ?>" class="btn btn-danger btn-xs" onclick="javascript:return confirm('确定删除?')">删除</a>
                            <?php
                        }
                        ?></td>
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

{:R('Footer/copyright','','Widget')} <include file="Public/foot"/> 