<?php

namespace Home\Controller;

use Think\Controller;

class NodeController extends CommonController {

    public function index() {




        if (IS_POST) {

            $Rid = I('post.Rid');

            // 1删除之前所有的权限
            $access = M('access');
            $access->where(array('role_id' => $Rid))->delete();

            // 2组合新权限
            $data_insert = array();
            $access_array = I('post.access');
            foreach ($access_array as $val) {
                // $tmp=explode('_',$v);
                $data_insert[] = array(
                    'role_id' => $Rid,
                    'node_id' => $val
                        // 'level'=>$tmp[1]
                );
            }
            // 3检查结果
            if ($access->addAll($data_insert)) {
                $this->success('配置成功！', U('/Home/Role/Listview'));
            } else {
                $this->error('配置失败！');
            }
        } else {


            $Rid = I('get.Rid');
            // 读取用户原有权限
            $access = M('access')->where(array('role_id' => $Rid))->getField('node_id', true);

            $node = M('node');
            $result = $node->field('id,name,title,pid')->select();
            $result = node_merge($result, $access);

            // print_r($result);exit;		
            $this->assign('Rid', $Rid);
            $this->assign('result', $result);
            $this->display();
        }
    }

    public function Listview() {

        import('Common.Org.Tree');


        $node = M('node');
        $result = $node->getField('id,pid,title,name');

        $listview_tpl = "
			<tr>
			<td>\$id</td>
			<td>\$spacer \$title</td>
			<td>\$name</td>
			<td>
			
			<a  href='" . U("/Home/Node/Editview/id/\$id") . "' class='btn btn-success btn-xs'>编辑</a>
            <a  href='" . U("/Home/Node/Delete/id/\$id") . "' class='btn btn-danger btn-xs' onclick=return confirm('确定?')>删除</a>
			
			</td>
			</tr>
		 ";

        // 加载树型列表
        $my_tree = new \Tree($result);
        $my_tree->icon = array('<img src="' . __APP__ . '/Public/img/1.png" >', '<img src="' . __APP__ . '/Public/img/2.png" >', '<img src="' . __APP__ . '/Public/img/3.png" >', '<img src="' . __APP__ . '/Public/img/4.png" >');
        $listview = $my_tree->get_tree(0, $listview_tpl, 0, '');

        $this->assign('listview', $listview);
        $this->display();
    }

    function Addview() {

        import('Common.Org.Tree');

        if (IS_POST) {

            $node = M('node');
            if ($node->create()) {
                $result = $node->add();
                if ($result) {
                    // 如果主键是自动增长型 成功后返回值就是最新插入的值
                    $insertId = $result;
                    $this->success('添加成功！', U('/Home/Node/Listview'));
                }
            }
        } else {

            $node = M('node');

            $result = $node->where('pid=0 or pid=1')->getField('id,pid,title');
            $result = $node->select();


            $echo_select_level = echo_select(array(1 => '模块', 2 => '控制器', 3 => '操作'), 0);
            $this->assign('echo_select_level', $echo_select_level);

            $Tree = new \Tree($result);
            $Tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
            $selectview = $Tree->get_tree(0, "<option value=\$id \$select>\$spacer\$title</option>");

            $this->assign('selectview', $selectview);


            $this->display('view');
        }
    }

    function Editview() {

        import('Common.Org.Tree');

        if (IS_POST) {
            $node = M("node"); 
            $node->create(); 
            $result_check = $node->save();	
            // 验证结果
            if ($result_check > 0) {
                $this->success('更新成功！', U('/Home/Node/Listview'));
            } else {
                redirect(U('Home/Node/Listview'));
            }
        } else {

            $id = I('get.id');
            empty($id) && $this->error('参数不能为空！');

            $result = M('node')->field(true)->find($id);
            $this->assign('result', $result);

            $echo_select_level = echo_select(array(1 => '模块', 2 => '控制器', 3 => '操作'), $result['level']);
            $this->assign('echo_select_level', $echo_select_level);

            // print_r($result['pid']);exit;

            $node = M('node');
            $result_select = $node->where('(pid=0 or pid=1) and id<>' . $id)->getField('id,pid,title');

            // print_r($result_select);exit;

            $Tree = new \Tree($result_select);
            $Tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
            $selectview = $Tree->get_tree(0, "<option value=\$id \$selected>\$spacer\$title</option>" . chr(10), $result['pid']);
            $this->assign('selectview', $selectview);

            $this->display('view');
        }
    }

    public function Delete() {

        $id = I('get.id');
        empty($id) && $this->error('参数不能为空！');

        $node = M('node');
        $result_check = $node->delete($id);

        // 把下面的子类也删除掉
        // 需要一个getChild的方法-待改进
        $node->where('pid=' . $id)->delete();

        // 验证结果
        if ($result_check > 0) {
            $this->success('删除成功！');
        }
    }

}
