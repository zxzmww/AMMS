<?php

namespace Home\Controller;

use Think\Controller;
use Org\Util\Rbac;

class LoginController extends Controller {

    public function index() {

        // 加载一些配置信息
        $file = APP_PATH . 'Home/Conf/config_sys.php';
        $this->assign('result_config', load_config($file));

        $this->display();
    }

    function LoginCheck() {

        if (empty($_POST['username'])) {
            $this->error('帐号错误！');
        } elseif (empty($_POST['password'])) {
            $this->error('密码必须！');
        }/* elseif (empty($_POST['verify'])){
          $this->error('验证码必须！');
          } */

        // 生成认证条件
        $map = array();
        // 支持使用绑定帐号登录
        $map['u_username'] = $_POST['username'];
        $map["u_status"] = array('gt', 0);
        /* if(session('verify') != md5($_POST['verify'])) {
          $this->error('验证码错误！');
          } */
        $authInfo = Rbac::authenticate($map);
        // 使用用户名、密码和状态的方式进行认证
        if (false === $authInfo) {
            $this->error('帐号不存在或已禁用！');
        } else {
            if ($authInfo['u_password'] != md5($_POST['password'])) {
                $this->error('密码错误！');
            }
			
			// 存放一些配置信息到session备用
			// session('u_username', $authInfo['u_username']);
            // session('u_id', $authInfo['u_id']);
            // session('role_id', M('role_user')->where('user_id=' . $authInfo['u_id'])->getField('role_id'));		
			
			$_SESSION['u_username'] = $authInfo['u_username'];
			$_SESSION['u_id'] = $authInfo['u_id'];
			$_SESSION['role_id'] = M('role_user')->where('user_id=' . $authInfo['u_id'])->getField('role_id');
			
            $_SESSION[C('USER_AUTH_KEY')] = $authInfo['u_id'];
            $_SESSION['u_username']		=	$authInfo['u_username'];
            $_SESSION['lastLoginTime'] = $authInfo['last_login_time'];
            $_SESSION['login_count'] = $authInfo['login_count'];
			
            if ($authInfo['u_username'] == 'superadmin') {
                $_SESSION['administrator'] = true;
            }

            // 保存登录信息
            $User = M('User');
            $ip = get_client_ip();
            $time = time();
            $data = array();
            $data['u_id'] = $authInfo['u_id'];
            $data['u_logintime'] = $time;
            $data['u_logincount'] =	array('exp','u_logincount+1');
            $data['u_loginip'] = $ip;
            $User->save($data);

            // 缓存访问权限
            Rbac::saveAccessList();


            if (session('role_id') == 2 || session('role_id') == 1 || $_SESSION['administrator'] == true) {
                $this->success('登录成功！', U('/Home/Index'));
            } else {
                $this->success('登录成功！', U('/Home/Service/Listview2Insu'));
            }
        }
    }

    // 登出进程
    public function Logout() {
        if (isset($_SESSION[C('USER_AUTH_KEY')])) {
            unset($_SESSION[C('USER_AUTH_KEY')]);
            unset($_SESSION);
            session_destroy();
            $this->success('登出成功！', U('/Home/login'));
        } else {
            $this->error('已经登出！');
        }
    }

}
