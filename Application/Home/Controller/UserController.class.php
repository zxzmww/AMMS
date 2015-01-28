<?php

namespace Home\Controller;

use Think\Controller;
use Think\Model\RelationModel;

class UserController extends CommonController {

    public function index() {
        
    }

    function Listview() {


        $User = D("User"); // 实例化User对象
        $count = $User->relation(true)->count(); // 查询满足要求的总记录数
        $Page = new \Think\Page($count, 10); // 实例化分页类 传入总记录数和每页显示的记录数(25)		
        $pageview = $Page->show(); // 分页显示输出		
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $listview = $User->order('u_addtime')
                ->limit($Page->firstRow . ',' . $Page->listRows)
                ->field('u_password', true)
                ->relation(true)
                ->select();
        $this->assign('listview', $listview); // 赋值数据集
        $this->assign('pageview', $pageview); // 赋值分页输出		
        $this->display();
    }

    function Addview() {


        if (IS_POST) {

            // 判断注册用户是否存在
            $u_username = I('post.u_username');
            $u_username_check = M('User')->where(array('u_username' => $u_username))->find();
            if (is_array($u_username_check)) {
                $this->error('用户名已存在！');
            }

            // 实例化User模型
            $User = M('User');
            $data = $User->create();
            $data['u_addtime'] = time();
            $data['u_password'] = md5($data['u_password']);

            // print_r($data);exit;

            $result_check = $User->add($data); 
            if ($result_check) {
                // 如果主键是自动增长型 成功后返回值就是最新插入的值
                $insertId = $result_check;

                $data_role['role_id'] = I('post.role_id');
                $data_role['user_id'] = $insertId;
                $role_user = M('role_user');
                $role_user->data($data_role)->add();

                $this->success('添加成功！');
            } else {
                $this->success('添加失败！');
            }
        } else {



            // 保险公司的列表
            $corp = M('corp');
            $select = $corp->getField('c_id,c_name');
            $echo_select_corp = echo_select($select);
            $this->assign('echo_select_corp', $echo_select_corp);




            // 组织机构列表-1select
            $crop_cate = M('crop_cate');
            $select = $crop_cate->where('pid=0')->getField('id,title');
            $echo_select_corp_cate = echo_select($select);
            $this->assign('echo_select_corp_cate', $echo_select_corp_cate);

            // 角色列表select
            $role = M('role');
            $select = $role->getField('id,name');
            $echo_select_role = echo_select($select);
            $this->assign('echo_select_role', $echo_select_role);

            $this->display();
        }
    }

    function Editview() {


        if (IS_POST) {



            // 1更新主表	
            $User = M("User"); 

            if (I('post.u_password') != '') {
                $data['u_password'] = md5(I('post.u_password'));
            }
            $data['u_username'] = I('post.u_username');
            $data['u_status'] = I('post.u_status');
            $data['role_id'] = I('post.role_id');
            $data['u_id'] = I('post.u_id');

            $data['u_corp_id'] = I('post.u_corp_id');
            $data['u_cate_1'] = I('post.u_cate_1');
            $data['u_cate_2'] = I('post.u_cate_2');

            $result_check = $User->save($data); // 根据条件保存修改的数据
            // 2还要更新一下 用户角色关联表
            $role_user = M("role_user"); // 实例化User对象
            $role_user->role_id = $data['role_id'];
            $check_role_user = $role_user->where('user_id=' . $data['u_id'])->save(); // 根据条件更新记录
            // 如果在这张表里找不到记录，则需要添加而不是更新
            if ($check_role_user == 0) {

                $data_role['role_id'] = $data['role_id'];
                $data_role['user_id'] = $data['u_id'];

                $role_user = M('role_user');
                $role_user->data($data_role)->add();
            }


            // 3验证结果
            if ($result_check === false) {
                redirect(U('/Home/User/Listview'));
            } else {
                $this->success('更新成功！', U('/Home/User/Listview'));
            }
        } else {

            $id = I('get.id');
            empty($id) && $this->error('参数不能为空！');

            $User = D('User');
            $data = $User->relation(true)->field(true)->find($id);
            $this->assign('data', $data);
            // print_r($data);exit;
            // 保险公司的列表
            $corp = M('corp');
            $select = $corp->getField('c_id,c_name');
            $echo_select_corp = echo_select($select, $data['u_corp_id']);
            $this->assign('echo_select_corp', $echo_select_corp);



            // 组织机构列表-1select
            $crop_cate = M('crop_cate');
            $select = $crop_cate->where('pid=0')->getField('id,title');
            $echo_select_corp_cate = echo_select($select, $data['u_cate_1']);
            $this->assign('echo_select_corp_cate', $echo_select_corp_cate);

            // 角色列表select
            $role = M('role');
            $select = $role->getField('id,name');
            $echo_select_role = echo_select($select, $data['role'][0]['id']);
            $this->assign('echo_select_role', $echo_select_role);

            $this->display();
        }
    }

    function Delete() {
        $id = I('get.id');
        empty($id) && $this->error('参数不能为空！');

        $User = M('User');
        $result_check = $User->delete($id);

        $role_user = M('role_user');
        $result_check_role_user = $role_user->where('user_id=' . $id)->delete();

        // 验证结果
        if ($result_check > 0) {
            $this->success('删除成功！');
        }
    }

}
