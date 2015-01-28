<?php
namespace Home\Widget;
use Think\Action;


class FooterWidget extends Action {
	
    public function copyright(){
		
		$file = APP_PATH . 'Home/Conf/config_sys.php';		
			
		$this->assign('result_config',load_config($file));	
				
        $this->display('Public:footer');
    }
}

