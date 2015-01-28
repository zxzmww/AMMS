<?php

namespace Home\Controller;

use Think\Controller;

class RoleController extends CommonController {

    public function index() {
        
    }

    function Listview() {

        $User = M("Role"); 
        $count = $User->count();
        $Page = new \Think\Page($count, 10); // 实例化分页类 传入总记录数和每页显示的记录数		
        $pageview = $Page->show(); // 分页显示输出		
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $listview = $User->order('id')
                ->limit($Page->firstRow . ',' . $Page->listRows)
                ->select();
        $this->assign('listview', $listview); // 赋值数据集
        $this->assign('pageview', $pageview); // 赋值分页输出		
        $this->display();
    }

    function Addview() {


        if (IS_POST) {

            $Role = M('Role');
            if ($Role->create()) {
                $result = $Role->add(); 
                if ($result) {
                    // 如果主键是自动增长型 成功后返回值就是最新插入的值
                    $insertId = $result;
                    $this->success('添加成功！');
                }
            }
        } else {
            $this->display();
        }
    }

    function Editview() {


        if (IS_POST) {
            $Role = M("Role");
            $Role->create();
            $result_check = $Role->save();
            // 验证结果
            if ($result_check > 0) {
                $this->success('更新成功！', U('/Home/Role/Listview'));
            } else {
                redirect(U('/Home/Role/Listview'));
            }
        } else {

            $id = I('get.id');
            empty($id) && $this->error('参数不能为空！');
            $data = M('Role')->field(true)->find($id);
            $this->assign('data', $data);
            $this->display();
        }
    }

    function Delete() {

        $id = I('get.id');
        empty($id) && $this->error('参数不能为空！');

        $Role = M('Role');
        $result_check = $Role->delete($id);

        // 验证结果
        if ($result_check > 0) {
            $this->success('删除成功！');
        }
    }

}
