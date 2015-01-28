<?php
namespace Home\Widget;
use Think\Action;


class HeaderWidget extends Action {
	
    public function index(){
		
		#加载系统配置信息
		$file = APP_PATH . 'Home/Conf/config_sys.php';				
		$this->assign('result_config',load_config($file));	
		
		
		#根据SESSION里的用户 ID 获取所有的用户信息		
		$u_id = session('u_id');	
		$role_id = session('role_id');
		
		#加载用户权限用于配置菜单显示
		#如果是保险公司，则简化菜单		
		$user_config['role_id'] = $role_id;
		
		
		#显示用户的角色组和当前区域
		$user_config['role_name'] = M('role')->where('id='.$role_id)->getField('name');		
		
		#$u_cate = M('user')->where('u_id='.$u_id)->getField('u_id,u_cate_1,u_cate_2');	
		$u_cate = M('user')->where('u_id='.$u_id)->field('u_corp_id,u_cate_1,u_cate_2')->find();		
		$user_config['cate_1'] = M('crop_cate')->where('id='.$u_cate['u_cate_1'])->getField('title');
		$user_config['cate_2'] = M('crop_cate')->where('id='.$u_cate['u_cate_2'])->getField('title');
		
		$user_config['corp_name'] = M('corp')->where('c_id='.$u_cate['u_corp_id'])->getField('c_name');
		
		#print_r($user_config);exit;

		#替换用户基本信息
		$this->assign('user_config',$user_config);	
		
		
				
        $this->display('Public:header');
    }
}

