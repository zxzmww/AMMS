<?php

namespace Home\Controller;

use Think\Controller;

class CorpRoleController extends CommonController {

    public function index() {

    }

    public function Listview() {

        import('Common.Org.Tree');

        $crop_cate = M('crop_cate');
        $result = $crop_cate->order('sort')->getField('id,pid,title,sort');

        $listview_tpl = "
			<tr>
			<td>\$id</td>
			<td>\$spacer \$title</td>
			<td>\$sort</td>
			<td>
			
			<a  href='" . U("/Home/CorpRole/Editview/id/\$id") . "' class='btn btn-success btn-xs'>编辑</a>
            <a  href='" . U("/Home/CorpRole/Delete/id/\$id") . "' class='btn btn-danger btn-xs' onclick=return confirm('确定?')>删除</a>
			
			</td>
			</tr>
		 ";

        $my_tree = new \Tree($result);
        $my_tree->icon = array('<img src="' . __APP__ . '/Public/img/1.png" >', 
								'<img src="' . __APP__ . '/Public/img/2.png" >', 
								'<img src="' . __APP__ . '/Public/img/3.png" >', 
								'<img src="/vellme/public/4.png" >');
        $listview = $my_tree->get_tree(0, $listview_tpl);

        $this->assign('listview', $listview);
        $this->display();
    }

    function Addview() {

        import('Common.Org.Tree');

        if (IS_POST) {

            $crop_cate = M('crop_cate');
            // 根据表单提交的POST数据创建数据对象							
            if ($crop_cate->create()) {
                $result = $crop_cate->add(); 
                if ($result) {
                    // 如果主键是自动增长型 成功后返回值就是最新插入的值
                    $insertId = $result;
                    $this->success('添加成功！', U('/Home/CorpRole/Listview'));
                }
            }
        } else {

            $crop_cate = M('crop_cate');
            $result = $crop_cate->where('pid=0')->getField('id,pid,title');




            $Tree = new \Tree($result);
            $Tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
            $Tree->nbsp = '&nbsp;&nbsp;&nbsp;';
            $selectview = $Tree->get_tree(0, "<option value=\$id \$select>\$spacer\$title</option>");

            $this->assign('selectview', $selectview);


            $this->display('view');
        }
    }

    function Editview() {

        import('Common.Org.Tree');

        if (IS_POST) {
            $crop_cate = M("crop_cate"); 
            $crop_cate->create(); 
            $result_check = $crop_cate->save(); 
            // 验证结果
            if ($result_check > 0) {
                $this->success('更新成功！', U('/Home/CorpRole/Listview'));
            } else {
                redirect(U('Home/CorpRole/Listview'));
            }
        } else {

            $id = I('get.id');
            empty($id) && $this->error('参数不能为空！');

            $result = M('crop_cate')->field(true)->find($id);
            $this->assign('result', $result);


            // print_r($result['pid']);exit;

            $crop_cate = M('crop_cate');
            $result_select = $crop_cate->where('pid=0 and id<>' . $id)->getField('id,pid,title');

            $Tree = new \Tree($result_select);
            $Tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
            $Tree->nbsp = '&nbsp;&nbsp;&nbsp;';
            $selectview = $Tree->get_tree(0, "<option value=\$id \$selected>\$spacer\$title</option>", $result['pid']);
            $this->assign('selectview', $selectview);



            $this->display('view');
        }
    }

    function Delete() {

        $id = I('get.id');
        empty($id) && $this->error('参数不能为空！');

        $crop_cate = M('crop_cate');
        $result_check = $crop_cate->delete($id);

        // 把下面的子类也删除掉
        $crop_cate->where('pid=' . $id)->delete();

        // 验证结果
        if ($result_check > 0) {
            $this->success('删除成功！');
        }
    }

    function AjaxGetCate() {
        $bigid = I('get.bigid');
        empty($bigid) && $this->error('参数不能为空！');

        $result = M('crop_cate')->order('sort')->where('pid=' . $bigid)->select();
        echo json_encode($result);
    }

}
