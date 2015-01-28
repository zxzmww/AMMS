{:R('Head/index','','Widget')} 
{:R('Header/index','','Widget')}
<div class="container">
    <ul class="nav nav-tabs  mb20" role="tablist">
        <li role="presentation"  class="active"><a href="{:U('/Home/Node/Listview')}"><span class="glyphicon glyphicon-list"></span> 模块列表</a></li>
        <li role="presentation" ><a href="{:U('/Home/Node/Addview')}"><span class="glyphicon glyphicon-plus"></span> 添加</a></li>
    </ul>

    <!-- data-toggle="modal" data-target="#myModal"-->
    <div class="table-responsive" >
        <table class="table table-striped" style="background-color:#fff">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>名称</th>
                    <th>标识</th>
                    <th>操作 </th>
                </tr>
            </thead>
            <?php echo $listview; ?>
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

<!-- Modal -->
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body"> ... </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
{:R('Footer/copyright','','Widget')} <include file="Public/foot"/> 