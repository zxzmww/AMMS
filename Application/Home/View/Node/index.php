{:R('Head/index','','Widget')}
{:R('Header/index','','Widget')}
<div class="container">
    <div class="panel panel-default"> 
        <!-- Default panel contents -->
        <div class="panel-heading">权限列表</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="post">
                <div class="app">
                    <?php
//一级分类
                    foreach ($result as $v) {
                        ?>
                        <h3 >
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox<?php echo $v['id']; ?>" level='1' name="access[]" value="<?php echo $v['id']; ?>" 
                                <?php
                                if ($v['access'] == 1) {
                                    echo 'checked';
                                }
                                ?>

                                       >
                                       <?php
                                       echo $v['title'];
                                       ?>
                            </label>
                        </h3>
                        <?php
//二级分类
                        if (count($v['child'] > 0)) {
                            foreach ($v['child'] as $vv) {
                                ?>
                                <hr />
                                <dl class="dl-horizontal">
                                    <dt style="border-right:1px solid #CCC; text-align:center">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox<?php echo $vv['id']; ?>" level='2' name="access[]" value="<?php echo $vv['id']; ?>" 
                                        <?php
                                        if ($vv['access'] == 1) {
                                            echo 'checked';
                                        }
                                        ?>  
                                               >
            <?php
            echo $vv['title'];
            ?>
                                    </label>
                                    </dt>
                                    <dd>
                                        <?php
//三级分类
                                        if (count($vv['child'] > 0)) {
                                            foreach ($vv['child'] as $vvv) {
                                                ?>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" id="inlineCheckbox<?php echo $vvv['id']; ?>" level='3' name="access[]" value="<?php echo $vvv['id']; ?>" 
                    <?php
                    if ($vvv['access'] == 1) {
                        echo 'checked';
                    }
                    ?>

                                                           >
                                                <?php
                                                echo $vvv['title'];
                                                ?>
                                                </label>
                                        <?php
                                    }
                                }
                                ?>
                                    </dd>
                                </dl>
                                <?php
                            }
                        }
                        ?>
    <?php
}
?>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="hidden" name="Rid" id="Rid" value="<?php echo $Rid; ?>" />
                        <button type="submit" class="btn btn-primary">保存</button>
                        <button type="button" class="btn btn-default" onclick="history.back();">返回</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /container --> 

<include file="Public/foot"/>
<link href="__PUBLIC__/iCheck/skins/square/blue.css" rel="stylesheet">
<script src="__PUBLIC__/iCheck/icheck.min.js?v=1.0.2"></script> 
<script>
                            /*$(document).ready(function(){
                             $('input').each(function(){
                             var self = $(this),
                             label = self.next(),
                             label_text = label.text();
                             
                             label.remove();
                             self.iCheck({
                             checkboxClass: 'icheckbox_line',
                             radioClass: 'iradio_line',
                             insert: '<div class="icheck_line-icon"></div>' + label_text
                             });
                             });
                             });*/
</script> 
<script>
    $(document).ready(function() {

        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });

    });
</script> 
