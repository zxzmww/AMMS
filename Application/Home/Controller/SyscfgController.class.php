<?php

namespace Home\Controller;

use Think\Controller;

class SyscfgController extends CommonController {

    public function index() {

        $file = APP_PATH . 'Home/Conf/config_sys.php';

        if (!IS_POST) {
            $this->assign('info', load_config($file));
            $this->display();
        } else {
			
			// print_r($_POST);exit;

            if (write_config($file, $_POST)) {
                $this->success('配置成功！');
            } else {
                $this->error('配置失败');
            }
        }
    }

    // 更新个人信息

    public function PersonInfo() {

        $id = session('u_id');

        if (IS_POST) {
            $user = M("user"); 
            $user->create(); 
            $result_check = $user->where('u_id=' . $id)->save(); 
            // 验证结果		
            if ($result_check === false) {
                $this->error('更新失败，请联系管理员');
            } elseif ($result_check == 0) {
                $this->success('无变化');
            } else {
                $this->success('更新成功！', U('/Home/Syscfg/PersonInfo'));
            }
        } else {


            empty($id) && $this->error('参数不能为空！');

            $user = M('user');
            $result = $user->field(true)->find($id);
            $this->assign('result', $result);

            $this->display();
        }
    }

    public function ChangePwd() {


        if (IS_POST) {

            $password_old = I('post.password_old');
            $password_new = I('post.password_new');

            // 后台再次对旧密码进行验证
            $id = session('u_id');

            $user = M('user');
            $password = $user->where('u_id=' . $id)->getField('u_password');

            if (md5($password_old) != $password) {
                $this->error('旧密码输入有误');
            } else {


                // 旧密码输对了才能干下面的事情，更新密码
                $data['u_password'] = md5($password_new);
                $result_check = $user->where('u_id=' . $id)->save($data);

                if ($result_check === false) {
                    $this->error('更新失败，请联系管理员');
                } else {
                    $this->success('更新成功！', U('/Home/Syscfg/ChangePwd'));
                }
            }
        } else {

            $this->display();
        }
    }

    // 远程验证老密码

    public function ChangePwd_check() {

        $id = session('u_id');

        $user = M('user');
        $password = $user->where('u_id=' . $id)->getField('u_password');
        $password_old = I('param.password_old');


        if (md5($password_old) != $password) {
            $valid = false;
        } else {
            $valid = true;
        }

        echo json_encode(array(
            'valid' => $valid,
        ));
    }

}
