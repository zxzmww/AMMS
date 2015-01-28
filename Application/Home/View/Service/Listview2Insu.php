{:R('Head/index','','Widget')}
{:R('Header/index','','Widget')}
<div class="container">
    <ul class="nav nav-tabs  mb20" role="tablist">
        <li role="presentation"  class="active"><a href="{:U('/Home/Service/Listview2Insu')}"><span class="glyphicon glyphicon-list"></span> 维修记录</a></li>
    </ul>
    <div class="panel panel-default"> 
        <!-- Default panel contents -->
        <div class="panel-body ">
            <div class="row">
                <div class="col-md-7">
                    <p class="form-control-static"> <?php echo $info_search; ?> <?php echo $info_all; ?> </p>
                </div>
                <div class="col-md-5 text-right">
                    <form id="form1" name="form1" method="post" class="form-inline" action="">
                        <div class="form-group"> </div>
                        <div class="form-group">
                            <label class="sr-only" for="s_kws">输入关键词</label>
                            <input type="text" class="form-control" id="s_kws" name="s_kws" value="<?php echo $map['s_kws']; ?>" placeholder="输入关键词">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="s_kws_type" id="s_kws_type">
                                <option value="0">查询类型</option>
                                <?php
                                echo $echo_select_s_kws_type;
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">搜索</button>
                        <!--<button type="button" class="btn btn-default">导出</button>-->

                    </form>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-striped" style="background-color:#fff">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>业务员</th>
                        <th>开始日期</th>
                        <th>结束日期</th>
                        <th>保险公司</th>
                        <th>费用</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listview as $key => $val) {
                        ?>
                        <tr >
                            <td><?php echo $val['s_id']; ?></td>
                            <td><?php echo $val['s_salesman']; ?></td>
                            <td><?php echo $val['s_time_start']; ?></td>
                            <td><?php echo $val['s_time_end']; ?></td>
                            <td><?php echo $result_corp[$val['s_corp_insu']]; ?></td>
                            <td><?php echo $val['s_print_all']; ?></td>
                            <td><a target="_blank" href="<?php echo U('/Home/Service/View/id/' . $val['s_id']); ?>" class="btn btn-info btn-xs">查看</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
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