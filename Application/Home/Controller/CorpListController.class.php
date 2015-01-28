<?php

namespace Home\Controller;

use Think\Controller;

class CorpListController extends CommonController {

    public function index() {
        $row = M('corp')->select();
        $this->assign('row', $row);

        $num_rows = M('corp')->count();
        $this->assign('num_rows', $num_rows);

        $this->display();
    }

    function dataInsert() {

        // 1数据添加
        $corp = M('corp');
        $corp->create();
        $result_check = $corp->add();

        // 2验证结果 插入返回的ID
        if ($result_check > 0) {
            redirect(U('/Home/CorpList'));
        }

        // print_r($_POST);exit;
    }

    function dataUpdate() {

        // print_r($_POST);exit;
		
        // 1数据添加
        $corp = M("corp");
        $corp->create();
        $result_check = $corp->save();

        // 2验证结果 更新的行数
        if ($result_check > 0) {
            redirect(U('/Home/CorpList'));
        }
    }

    function dataDelete() {

        // 1数据删除两步
        $id = I('post.del');
        empty($id) && $this->error('参数不能为空！');

        $corp = M('corp');
        $result_check = $corp->delete($id);

        // 2验证结果 删除的行数
        if ($result_check > 0) {
            redirect(U('/Home/CorpList'));
        }
        // print_r($_POST);exit;
    }

}
