{:R('Head/index','','Widget')}{:R('Header/index','','Widget')}
<div class="container">
    <div class="panel panel-default"> 
        <!-- Default panel contents -->
        <div class="panel-heading">管理保险公司</div>
        <?php
        if (isset($_REQUEST['editTbl'])) {
            $editTbl = $_REQUEST['editTbl'];
        } else {
            $editTbl = 0;
        }

        if (isset($_REQUEST['newTbl'])) {
            $newTbl = $_REQUEST['newTbl'];
        } else {
            $newTbl = 0;
        }
        if (isset($_REQUEST['rowNo'])) {
            $rowNo = $_REQUEST['rowNo'];
        } else {
            $rowNo = 0;
        }
        if (isset($_REQUEST['curpage'])) {
            $curpage = $_REQUEST['curpage'];
        } else {
            $curpage = 0;
        }
        if ($curpage == 0) {
            $curpage = 1;
        }

        /* 配置信息 */
        $name_cn = array("ID", "名称");
        $name_en = array("c_id", "c_name");

        $rowLower = 0;
        $rowUpper = $num_rows;
        $colLower = 1;
        $colUpper = count($name_cn); //和$name_cn和数量一致
        ?>
        <form name="tmpFrm" method="post">
            <input type="hidden" name="editTbl" value="1">
            <input type="hidden" name="newTbl" value="1">
            <input type="hidden" name="rowNo">
        </form>
        <form name="dgridFrm" method="post" action="<?php echo U('/Home/CorpList/dataUpdate'); ?>">
            <input type="hidden" name="del">
            <?php
            echo '<table class="table table-striped" style="background-color:#fff">';

//第一行开始
            echo "<thead><tr id='0'>";


            foreach ($name_cn as $key => $val) {
                echo '<th>' . $val . '</th>';
            }
            echo '<th>编辑</th>';
            echo '<th>删除</th>';
            echo "</tr></thead>";
//第一行结束

            for ($r = $rowLower; $r < $rowUpper; $r++) {

                echo "<tr id='" . $r . "'>";

                echo "<td class='tdInset'>";
                echo $row[$r][$name_en[0]];
                echo "</td>";

                /* 当某一行被编辑的时候 */
                if ($row[$r][$name_en[0]] == $rowNo) {
                    for ($i = $colLower; $i < $colUpper; $i++) {

                        $my_keyname = $name_en[$i];

                        echo "<td class='tdInset'>";
                        echo "<input type='text' name='" . $name_en[$i] . "' taborder='0' value='" . trim($row[$r][$my_keyname]) . "'>";
                        echo "</td>";
                    }
                    echo "<td>";
                    echo "<a href='JavaScript:document.dgridFrm.submit();'>保存</a>";
                    echo "</td>";
                    echo "<td class='tdInset'>";
                    echo " <a href='JavaScript:cancel();'>取消</a>";
                    echo("<input type='hidden' name='" . $name_en[0] . "' taborder='0' value='" . trim($row[$r][$name_en[0]]) . "'>");
                    echo "</td>";
                }
                /* 当没有编辑选项时 */ else {
                    for ($i = $colLower; $i < $colUpper; $i++) { //Table Header
                        $my_keyname = $name_en[$i];
                        echo "<td class='tdInset'>";
                        echo trim($row[$r][$my_keyname]);
                        echo "</td>";
                    }
                    echo "<td class='tdInset'>";
                    echo "<a href='JavaScript:check(" . $row[$r][$name_en[0]] . ");'>编辑</a>";
                    echo "</td>";
                    echo "<td class='tdInset'>";
                    echo "<a href='JavaScript:deleteYesNo(" . $row[$r][$name_en[0]] . ");'>删除</a>";
                    echo "</td>";
                }

                echo "</tr>";
            }



            /* 当添加未被选中的时候 */
            if ($newTbl == 0) {
                echo "<tr id='" . $num_rows . "'>";

                echo "<td class='tdInset'>";
                echo "<a href='JavaScript:checkNew(" . ($r + 1) . ");'>添加</a>";
                echo "</td>";
                for ($c = $colLower; $c < $colUpper + 2; $c++) {
                    echo "<td class='tdInset'>&nbsp;</td>";
                }
                echo "</tr>";
            }
            /* 当添加被选中的时候 */
            if ($newTbl == 1) {
                #$dgrid->RowStart($num_rows + 1);
                echo "<tr id='" . ($num_rows + 1) . "'>";

                echo "<td class='tdInset'>&nbsp;</td>";

                for ($c = $colLower; $c < $colUpper; $c++) {
                    echo "<td class='tdInset'>";
                    echo "<input type='text' name='" . $name_en[$c] . "' taborder='0'>";
                    echo "</td>";
                }

                echo "<td class='tdInset'>";
                echo "<a href='JavaScript:newRecord();'>保存</a>";
                echo "</td>";
                echo "<td class='tdInset'>";
                echo " <a href='JavaScript:cancel();'>取消</a>";
                echo "</td>";

                echo "</tr>";
            }

            echo "</table>";
            ?>
        </form>
    </div>
</div>
<!-- /container --> 

<script type="text/javascript">
    function cancel()
    {
        document.tmpFrm.rowNo.value = 0;
        document.tmpFrm.editTbl.value = 0;
        document.tmpFrm.newTbl.value = 0;
        document.tmpFrm.submit();
    }//end of check
    function check(i)
    {
        document.tmpFrm.rowNo.value = i;
        document.tmpFrm.newTbl.value = 0;
        document.tmpFrm.submit();
    }//end of check
    function checkNew(i)
    {
        document.tmpFrm.rowNo.value = 0;
        document.tmpFrm.editTbl.value = 0;
        document.tmpFrm.submit();
    }//end of check
    function deleteYesNo(i)
    {
        var ok;
        ok = confirm("确定删除?");
        if (ok)
        {
            document.dgridFrm.del.value = i;
            document.dgridFrm.action = "<?php echo U('/Home/CorpList/dataDelete'); ?>";
            document.dgridFrm.submit();
        }//end if
    }//end of deleteYesNo()
    function newRecord()
    {
        document.dgridFrm.action = "<?php echo U('/Home/CorpList/dataInsert'); ?>";
        document.dgridFrm.submit();

    }//end of deleteYesNo()
</script> 
{:R('Footer/copyright','','Widget')} <include file="Public/foot"/> 