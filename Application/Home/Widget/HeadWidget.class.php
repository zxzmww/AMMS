<?php
namespace Home\Widget;
use Think\Action;


class HeadWidget extends Action {
	
    public function index(){
		
		$file = APP_PATH . 'Home/Conf/config_sys.php';		
			
		$this->assign('result_config',load_config($file));	
				
        $this->display('Public:head');
    }
}

