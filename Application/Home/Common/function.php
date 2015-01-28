<?php

/**
 * 为当前的菜单显示高亮
 * @param  array $control 当前控制器的名称
 */
function show_active($control){
	
	if(in_array(CONTROLLER_NAME, $control)){
		echo 'class="active"';
	}
}

/**
 * 写入配置文件
 * @param  array $config 配置信息
 */
function write_config($file, $config){
    if(is_array($config)){
        //读取配置内容
        $conf = file_get_contents($file);
        //替换配置项
        foreach ($config as $key => $value) {
            if (is_string($value) && !in_array($value, array('true','false'))){
                if (!is_numeric($value)) {
                    $value = "'" . $value . "'"; //如果是字符串，加上单引号
                }
            }
            $conf = preg_replace("/'" . $key . "'\s*=\>\s*(.*?),/is", "'".$key."'=>".$value.",", $conf);
        }
        //写入应用配置文件
        if(!IS_WRITE){
            return false;
        }else{
            if(file_put_contents($file, $conf)){
                return true;
            } else {
                return false;
            }
            return '';
        }

    }
}

/**
 * 动态生成下拉菜单
 * @param  array $arr 列表数组 int $selected_id当前被选中ID
 */
function echo_select($arr, $selected_id=0){
	
	$str = '';
	foreach($arr as $key=>$val){
		if($selected_id == $key){	
			$str =$str.'<option value="'.$key.'" selected="selected">'.$val.'</option>';		
		}else{
			$str =$str.'<option value="'.$key.'">'.$val.'</option>';	
		}
	}	
	return $str;	
}


/**
 * 递归重组节点信息为多维数组
 * $node要处理的多维数组
 * $pid父级ID	
 */
function node_merge($node,$access=null,$pid=0){
	$arr=array();
	foreach($node as $v){
		if(is_array($access)){
			$v['access']=in_array($v['id'],$access)?1:0;
		
		}
		if($v['pid']==$pid){
			$v['child']=node_merge($node,$access,$v['id']);
			$arr[]=$v;		
		}
	}
	return $arr;
}