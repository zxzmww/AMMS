{:R('Head/index','','Widget')}
{:R('Header/index','','Widget')}
<div class="container">
    <ul class="nav nav-tabs  mb20" role="tablist">
        <li role="presentation"><a href="{:U('/Home/Service/Listview')}"><span class="glyphicon glyphicon-list"></span> 信息列表</a></li>
        <li role="presentation"  class="active"><a href="{:U('/Home/Service/Addview')}"><span class="glyphicon glyphicon-plus"></span> 添加</a></li>
    </ul>
    <form class="form-inline" role="form" method="post" action="{:U('/Home/Service/Addview')}">
        <div class="panel panel-default">
            <div class="panel-heading"> 基本信息 </div>
            <div class="panel-body">
                <div class="form-group">
                    <label  for="s_corp_1">公司：</label>
                    <select class="form-control" id="s_corp_1" name="s_corp_1">
                        <?php
                        echo $echo_select_corp_cate;
                        ?>
                    </select>
                </div>
                <div class="form-group" >
                    <label  for="s_corp_2">分公司：</label>
                    <select class="form-control" id="s_corp_2" name="s_corp_2">
                    </select>
                </div>
                <hr />
                <div class="form-group">
                    <label  for="s_salesman">业务员：</label>
                    <input type="text" class="form-control" id="s_salesman" name="s_salesman" placeholder="业务员">
                </div>
                <div class="form-group">
                    <label for="s_salesman_tel">电话：</label>
                    <input type="text" class="form-control" id="s_salesman_tel" name="s_salesman_tel" placeholder="电话">
                </div>
                <hr />
                <div class="form-group">
                    <label  for="s_time_start">开始日期：</label>
                    <div class="input-group" >
                        <input type="text" class="form-control" id="s_time_start" name="s_time_start" placeholder="开始日期">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar" id="xxxx"></span></span> </div>
                </div>
                <div class="form-group">
                    <label for="s_time_end">结束日期：</label>
                    <div class="input-group" >
                        <input type="text" class="form-control" id="s_time_end" name="s_time_end" placeholder="结束日期">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span> </div>
                </div>
                <hr />
                <div class="form-group">
                    <label for="s_time_reg">登记日期：</label>
                    <div class="input-group" >
                        <input type="text" class="form-control" id="s_time_reg" name="s_time_reg" value="<?php echo date("Y-m-d"); ?>" placeholder="登记日期">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span> </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"> 保险信息 </div>
            <div class="panel-body">
                <div class="form-group">
                    <label  for="s_corp_insu">保险公司：</label>
                    <select class="form-control" id="s_corp_insu" name="s_corp_insu">
                        <?php echo $echo_select_corp; ?>
                    </select>
                </div>
                <div class="form-group" >
                    <label for="s_number">报案号：</label>
                    <input type="text" class="form-control" id="s_number" name="s_number" placeholder="报案号">
                </div>
                <hr />
                <div class="form-group">
                    <label  for="s_corp_insu2">二级机构：</label>
                    <select class="form-control" id="s_corp_insu2" name="s_corp_insu2">
                        <?php
                        echo $echo_select_corpinsu_cate;
                        ?>
                    </select>
                </div>
                <div class="form-group" >
                    <label for="s_corp_insu3">三级机构：</label>
                    <select class="form-control" id="s_corp_insu3" name="s_corp_insu3">
                    </select>
                </div>
                <hr />
                <div class="form-group">
                    <label  for="s_loseman">定损员：</label>
                    <input type="text" class="form-control" id="s_loseman" name="s_loseman" placeholder="定损员">
                </div>
                <div class="form-group">
                    <label for="s_loseman_tel">电话：</label>
                    <input type="text" class="form-control" id="s_loseman_tel" name="s_loseman_tel" placeholder="电话">
                </div>
                <hr />
                <div class="form-group">
                    <label for="s_fours">4S店/修理厂：</label>
                    <input name="s_fours" type="text" class="form-control" id="s_fours" placeholder="4S店/修理厂" value="">
                </div>
                <div class="form-group">
                    <label for="s_fours_person">联系人：</label>
                    <input type="text" class="form-control" id="s_fours_person" name="s_fours_person" placeholder="联系人">
                </div>
                <div class="form-group">
                    <label for="s_fours_tel">4S店/修理厂电话：</label>
                    <input type="text" class="form-control" id="s_fours_tel" name="s_fours_tel" placeholder="4S店/修理厂电话">
                </div>
                <hr />
                <div class="form-group">
                    <label for="s_fours_address">4S店/修理厂地址：</label>
                    <input type="text" class="form-control" id="s_fours_address" name="s_fours_address" placeholder="4S店/修理厂地址">
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"> 车辆信息 </div>
            <div class="panel-body">
                <div class="form-group">
                    <label  for="s_car_master">车主：</label>
                    <input type="text" class="form-control" id="s_car_master" name="s_car_master" placeholder="车主">
                </div>
                <div class="form-group" >
                    <label for="s_car_tel">电话：</label>
                    <input type="text" class="form-control" id="s_car_tel" name="s_car_tel" placeholder="电话">
                </div>
                <hr />
                <div class="form-group">
                    <label  for="s_car_num">车牌：</label>
                    <input type="text" class="form-control" id="s_car_num" name="s_car_num" placeholder="车牌">
                </div>
                <div class="form-group" >
                    <label  for="s_car_corp">汽车厂商：</label>
                    <input type="text" class="form-control" id="s_car_corp" name="s_car_corp" placeholder="汽车厂商">
                </div>
                <hr />
                <div class="form-group">
                    <label  for="s_car_brand">汽车品牌：</label>
                    <input type="text" class="form-control" id="s_car_brand" name="s_car_brand" placeholder="汽车品牌">
                </div>
                <div class="form-group">
                    <label for="s_car_model">汽车型号：</label>
                    <input type="text" class="form-control" id="s_car_model" name="s_car_model" placeholder="汽车型号">
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading clearfix"> 维修信息 <span class="pull-right ">
                    <input type="button" id="but" class="btn btn-primary  btn-xs" value="增加配件"/>
                </span> </div>
            <div class="panel-body">
                <table id="tab" class="table " >
                    <thead>
                        <tr>
                            <th>序号</th>
                            <th>配件名称</th>
                            <th>维修金额</th>
                            <th>原件金额</th>
                            <th>降赔金额</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"> 财务信息 </div>
            <div class="panel-body">
                <div class="form-group">
                    <label  for="s_print_all">合计维修金额：</label>
                    <input type="text" class="form-control" id="s_print_all" name="s_print_all" placeholder="合计维修金额">
                </div>
                <div class="form-group" >
                    <label for="s_print2_all">合计降赔金额：</label>
                    <input type="text" class="form-control" id="s_print2_all" name="s_print2_all" placeholder="合计降赔金额">
                </div>
                <hr />
                <div class="form-group">
                    <label  for="s_bill_flag">是否开票：</label>
                    <select class="form-control" id="s_bill_flag" name="s_bill_flag">
                        <option value="1">是</option>
                        <option value="0">否</option>
                    </select>
                </div>
                <div class="form-group" >
                    <label for="s_bill_time">开票日期：</label>
                    <div class="input-group" >
                        <input type="text" class="form-control" id="s_bill_time" name="s_bill_time" placeholder="开票日期">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span> </div>
                </div>
                <hr />
                <div class="form-group">
                    <label  for="s_bill_complete">是否结清：</label>
                    <select class="form-control" id="s_bill_complete" name="s_bill_complete">
                        <option value="1">是</option>
                        <option value="0">否</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="s_bill_completetime">结账日期：</label>
                    <div class="input-group" >
                        <input type="text" class="form-control" id="s_bill_completetime" name="s_bill_completetime" placeholder="结账日期">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span> </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"> 提醒间隔 </div>
            <div class="panel-body">
                <div class="form-group">
                    <label  for="s_alert_time">提醒间隔：</label>
                    <input type="text" class="form-control" id="s_alert_time" name="s_alert_time" placeholder="提醒间隔">
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"> 备注 </div>
            <div class="panel-body">
                <div class="form-group" style="width:100%">
                    <label class="sr-only" for="s_remark">备注</label>
                    <textarea type="text" class="form-control"  id="s_remark" name="s_remark" style=" width:100%" rows="3"></textarea>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">保存</button>
        <button type="button" class="btn btn-default" onclick="history.back();">返回</button>
    </form>
</div>
<!-- /container --> 

{:R('Footer/copyright','','Widget')} <include file="Public/foot"/> 

<!--加载时间框--> 
<!-- this should go after your </body> -->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/datetimepicker/jquery.datetimepicker.css"/ >
<script src="__PUBLIC__/datetimepicker/jquery.datetimepicker.js"></script> 
<script>
            $(function() {
                jQuery('#s_time_start,#s_time_end,#s_time_reg,#s_bill_time,#s_bill_completetime').datetimepicker(
                        {lang: 'zh', format: 'Y-m-d', timepicker: false, closeOnDateSelect: true});
            });
</script> 

<!--联动二级下拉菜单--> 
<script>
    function getSelectVal() {
        $.getJSON("{:U('/Home/CorpRole/AjaxGetCate')}", {bigid: $("#s_corp_1").val()}, function(json) {
            var small_id = $("#s_corp_2");
            $("option", small_id).remove(); //清空原有的选项 
            $.each(json, function(index, array) {
                var option = "<option value='" + array['id'] + "'>" + array['title'] + "</option>";
                small_id.append(option);
            });
        });
    }
    function getSelectVal_2() {
        $.getJSON("{:U('/Home/CorpRole/AjaxGetCate')}", {bigid: $("#s_corp_insu2").val()}, function(json) {
            var small_id = $("#s_corp_insu3");
            $("option", small_id).remove(); //清空原有的选项 
            $.each(json, function(index, array) {
                var option = "<option value='" + array['id'] + "'>" + array['title'] + "</option>";
                small_id.append(option);
            });
        });
    }
    $(function() {
        getSelectVal();
        $("#s_corp_1").change(function() {
            getSelectVal();
        });
        getSelectVal_2();
        $("#s_corp_insu2").change(function() {
            getSelectVal_2();
        });
    });



</script> 
<script>
    $(document).ready(function() {
        //<tr/>居中
        //$("#tab tr").attr("align","center");

        //增加<tr/>
        $("#but").click(function() {
            var _len = $("#tab tr").length;
            if (_len <= 10) {

                $("#tab").append("<tr id=" + _len + " >"
                        + "<td>" + _len + "</td>"
                        + "<td><input type='text' class='form-control' name='p_name[]' id='p_name" + _len + "' /></td>"
                        + "<td><input type='text' class='form-control' name='p_pricew[]' id='p_pricew" + _len + "' /></td>"
                        + "<td><input type='text' class='form-control' name='p_pricey[]' id='p_pricey" + _len + "' /></td>"
                        + "<td><input type='text' class='form-control' name='p_pricex[]' id='p_pricex" + _len + "' /></td>"
                        + "<td><input type=button value=删除 onclick=\'deltr(" + _len + ")\' /></td>"
                        + "</tr>");
            } else {
                alert('最多10个配件');
            }
        })
    })

    //删除<tr/>
    var deltr = function(index)
    {
        var _len = $("#tab tr").length;
        $("tr[id='" + index + "']").remove();//删除当前行
        for (var i = index + 1, j = _len; i < j; i++)
        {
            var nextTxtVal_a = $("#p_name" + i).val();
            var nextTxtVal_b = $("#p_pricew" + i).val();
            var nextTxtVal_c = $("#p_pricey" + i).val();
            var nextTxtVal_d = $("#p_pricex" + i).val();
            $("tr[id=\'" + i + "\']")
                    .replaceWith("<tr id=" + (i - 1) + " >"
                            + "<td>" + (i - 1) + "</td>"
                            + "<td><input type='text' class='form-control' name='p_name[]' value='" + nextTxtVal_e + "' id='p_name" + (i - 1) + "'/></td>"
                            + "<td><input type='text' class='form-control' name='p_pricew[]' value='" + nextTxtVal_a + "' id='p_pricew" + (i - 1) + "'/></td>"
                            + "<td><input type='text' class='form-control' name='p_pricey[]' value='" + nextTxtVal_b + "' id='p_pricey" + (i - 1) + "'/></td>"
                            + "<td><input type='text' class='form-control' name='p_pricex[]' value='" + nextTxtVal_c + "' id='p_pricex" + (i - 1) + "'/></td>"
                            + "<td><input type=button value=删除 onclick=\'deltr(" + (i - 1) + ")\' /></td>"
                            + "</tr>");
        }

    }
</script>