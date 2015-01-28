<?php

namespace Home\Controller;

use Think\Controller;

class ServiceController extends CommonController {

    public function index() {
        
    }

    public function View() {

        $this->display();
    }

    // 专门给保险公司展示的页面
    public function Listview2Insu() {


        // // // 设定默认搜索条件// // // 
        // ===保险公司的情况
        // 1只显示该保险公司的记录，标识字段：s_corp_insu
        // 2只显示所属一二级区域的数据，标识字段：s_corp_insu2 s_corp_insu3
        // 3如果是公司的总部，则要将二级区域的数据全部显示，解决方法 ：为corp增加areaid 用于标识总部
        // ===维修公司的情况
        // 1如果是公司的总部，则要将二级区域的数据全部显示，解决方法 ：为corp增加areaid 用于标识总部
        // 2只显示所属一二级区域的数据，标识字段：s_corp_insu2 s_corp_insu3
        // ===如果是管理员的情况
        // 1显示所有
        // 从
        // print_r($user_config);exit;
        // 根据SESSION里的用户 ID 获取所有的用户信息		
        $u_id = session('u_id');
        $role_id = session('role_id');

        // 加载用户权限用于配置菜单显示
        // 如果是保险公司，则简化菜单
        // 角色ID及角色的中文名		
        $user_config['role_id'] = $role_id;
        $user_config['role_name'] = M('role')->where('id=' . $role_id)->getField('name');

        // 一二级地域ID及中文名
        $u_cate = M('user')->where('u_id=' . $u_id)->field('u_corp_id,u_cate_1,u_cate_2')->find();

        $user_config['cate_1'] = M('crop_cate')->where('id=' . $u_cate['u_cate_1'])->getField('title');
        $user_config['cate_2'] = M('crop_cate')->where('id=' . $u_cate['u_cate_2'])->getField('title');

        // 保险公司的名称
        $user_config['corp_name'] = M('corp')->where('c_id=' . $u_cate['u_corp_id'])->getField('c_name');


        // 设置搜索的查询条件
        $map = array();
        $map_sql = array();
        $info_search = '';

        // 1通用查询部分
        $map['s_kws'] = I('param.s_kws', '');
        $map['s_kws_type'] = I('param.s_kws_type', 0);
        switch ($map['s_kws_type']) {
            case 1:
                $map_sql['s_corp_insu'] = $map['s_kws'];
                break;
            case 2:
                $map_sql['s_salesman'] = $map['s_kws'];
                break;
            case 3:
                $map_sql['s_loseman'] = $map['s_kws'];
                break;
            case 4:
                $map_sql['s_number'] = $map['s_kws'];
                break;
            case 5:
                $map_sql['s_car_num'] = $map['s_kws'];
                break;
        }


        // 2专业查询部分
        if ($role_id == 3) {

            $map['s_cid'] = I('param.s_cid', $u_cate['u_corp_id']);
            $map['s_c1'] = I('param.s_c1', $u_cate['u_cate_1']);
            $map['s_c2'] = I('param.s_c2', $u_cate['u_cate_2']);


            $map_sql['s_corp_insu'] = $map['s_cid'];
            $map_sql['s_corp_insu2'] = $map['s_c1'];
            $map_sql['s_corp_insu3'] = $map['s_c2'];

            $info_search .= '【<strong>筛选条件</strong> / 保险公司： ' . $user_config['corp_name'] . ' / 地域：' . $user_config['cate_1'] . $user_config['cate_2'] . ' 】 ';
        }

        $this->assign('info_search', $info_search);


        // 维持查询条件1 只能针对搜索是文字的地方，如果地域使用了ID则不行
        $this->assign('map', $map);
        $this->assign('user_config', $user_config);

        // 维持查询条件2
        $select = array(2 => '业务员', 3 => '定损员', 4 => '报案号', 5 => '车牌号');
        $echo_select_s_kws_type = echo_select($select, $map['s_kws_type']);
        $this->assign('echo_select_s_kws_type', $echo_select_s_kws_type);
        $this->assign('select', $select);
		// print_r($map_sql);

        $service = M("service"); 
        $count = $service->where($map_sql)->count(); 
        $Page = new \Think\Page($count, 2); // 实例化分页类 传入总记录数和每页显示的记录数
        // 保证POST查询后不丢失查询条件
        // 分页跳转的时候保证查询条件
        foreach ($map as $key => $val) {
            $Page->parameter[$key] = urlencode($val);
        }

        $pageview = $Page->show(); // 分页显示输出		
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $listview = $service->order('s_id')
                ->where($map_sql)
                ->limit($Page->firstRow . ',' . $Page->listRows)
                ->select();
        $this->assign('listview', $listview); // 赋值数据集
        $this->assign('pageview', $pageview); // 赋值分页输出	
        
        // 显示一些统计信息
        $info_all = '共计 <b>' . $count . '</b> 条记录';
        $this->assign('info_all', $info_all);

        $corp = M('corp');
        $result_corp = $corp->getField('c_id,c_name');
        $this->assign('result_corp', $result_corp);
        $this->display();
    }

    public function Listview() {

        // 根据SESSION里的用户 ID 获取所有的用户信息		
        $u_id = session('u_id');
        $role_id = session('role_id');

        // 加载用户权限用于配置菜单显示
        // 如果是保险公司，则简化菜单
        // 角色ID及角色的中文名		
        $user_config['role_id'] = $role_id;
        $user_config['role_name'] = M('role')->where('id=' . $role_id)->getField('name');

        // 一二级地域ID及中文名
        $u_cate = M('user')->where('u_id=' . $u_id)->field('u_corp_id,u_cate_1,u_cate_2')->find();

        $user_config['cate_1'] = M('crop_cate')->where('id=' . $u_cate['u_cate_1'])->getField('title');
        $user_config['cate_2'] = M('crop_cate')->where('id=' . $u_cate['u_cate_2'])->getField('title');

        // 保险公司的名称
        $user_config['corp_name'] = M('corp')->where('c_id=' . $u_cate['u_corp_id'])->getField('c_name');


        // 设置搜索的查询条件
        $map = array();
        $map_sql = array();
        $info_search = '';

        // 1通用查询部分
        $map['s_kws'] = I('param.s_kws', '');
        $map['s_kws_type'] = I('param.s_kws_type', 0);
        switch ($map['s_kws_type']) {
            case 1:
                $map_sql['s_corp_insu'] = $map['s_kws'];
                break;
            case 2:
                $map_sql['s_salesman'] = $map['s_kws'];
                break;
            case 3:
                $map_sql['s_loseman'] = $map['s_kws'];
                break;
            case 4:
                $map_sql['s_number'] = $map['s_kws'];
                break;
            case 5:
                $map_sql['s_car_num'] = $map['s_kws'];
                break;
        }

        // 2专业查询部分
        if ($role_id != 1) {

            $map['s_c1'] = I('param.s_c1', $u_cate['u_cate_1']);
            $map['s_c2'] = I('param.s_c2', $u_cate['u_cate_2']);


            $map_sql['s_corp_1'] = $map['s_c1'];
            $map_sql['s_corp_2'] = $map['s_c2'];

            $info_search .= '【<strong>筛选条件</strong> / 地域：' . $user_config['cate_1'] . $user_config['cate_2'] . ' 】 ';
        }

        $this->assign('info_search', $info_search);


        // 维持查询条件1 只能针对搜索是文字的地方，如果地域使用了ID则不行
        $this->assign('map', $map);
        $this->assign('user_config', $user_config);

        // 维持查询条件2
        $select = array(2 => '业务员', 3 => '定损员', 4 => '报案号', 5 => '车牌号');
        $echo_select_s_kws_type = echo_select($select, $map['s_kws_type']);
        $this->assign('echo_select_s_kws_type', $echo_select_s_kws_type);

        $service = M("service"); 
        $count = $service->where($map_sql)->count(); 
        $Page = new \Think\Page($count, 10); 
        // 保证POST查询后不丢失查询条件
        // 分页跳转的时候保证查询条件
        foreach ($map as $key => $val) {
            $Page->parameter[$key] = urlencode($val);
        }

        $pageview = $Page->show(); // 分页显示输出		
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $listview = $service->order('s_id')
                ->where($map_sql)
                ->limit($Page->firstRow . ',' . $Page->listRows)
                ->select();
        $this->assign('listview', $listview); // 赋值数据集
        $this->assign('pageview', $pageview); // 赋值分页输出	
        // 显示一些统计信息
        $info_all = '共计 <b>' . $count . '</b> 条记录';
        $this->assign('info_all', $info_all);



        $corp = M('corp');
        $result_corp = $corp->getField('c_id,c_name');
        $this->assign('result_corp', $result_corp);


        $this->display();
    }

    function Addview() {


        if (IS_POST) {

            $service = M('Service');
            $data = $service->create();
            if ($data) {
                $insertId = $service->add();
                if ($insertId) {
                    // 如果主键是自动增长型 成功后返回值就是最新插入的值
                    
					// 这个时候添加配件的信息
                    $parts = M('parts');
                    
					// 批量添加数据
                    $dataList = array();

                    $p_name_array = I('post.p_name');
                    $p_pricew_array = I('post.p_pricew');
                    $p_pricey_array = I('post.p_pricey');
                    $p_pricex_array = I('post.p_pricex');

                    // 如果配件都没有名字，则不保存
                    $p_name_array = array_filter($p_name_array);

                    foreach ($p_name_array as $key => $val) {
                        $dataList[] = array('p_name' => $val,
                            'p_pricew' => $p_pricew_array[$key],
                            'p_pricey' => $p_pricey_array[$key],
                            'p_pricex' => $p_pricex_array[$key],
                            'p_sid' => $insertId);
                    }
                    $parts->addAll($dataList);
                    $this->success('添加成功！');
                }
            }
        } else {

            // 组织机构列表-1
            $crop_cate = M('crop_cate');
            $select = $crop_cate->where('pid=0')->getField('id,title');
            $echo_select_corp_cate = echo_select($select);
            $this->assign('echo_select_corp_cate', $echo_select_corp_cate);

            // 组织机构列表-2 共用上一个
            $echo_select_corpinsu_cate = echo_select($select);
            $this->assign('echo_select_corpinsu_cate', $echo_select_corpinsu_cate);

            // 保险公司的列表
            $corp = M('corp');
            $select = $corp->getField('c_id,c_name');
            $echo_select_corp = echo_select($select);
            $this->assign('echo_select_corp', $echo_select_corp);
            // print_r($select);exit;


            $this->display();
        }
    }

    function Editview() {


        if (IS_POST) {

            $Service = M("Service"); 
            $Service->create(); 
            $result_check = $Service->save(); 
            // 验证结果
            if ($result_check === false) {

                $this->error('更新出错，请联系管理员！', U('/Home/Service/Listview'));
            } else {


                // 这里的代码用于更新配件部分

                $parts = M('parts');

                // 先把配件表里的所有信息全部删除
                $s_id = I('post.s_id');
                $parts->where('p_sid=' . $s_id)->delete();

                // 然后重新添加数据到PARTS表中
                $dataList = array();

                $p_name_array = I('post.p_name');
                $p_pricew_array = I('post.p_pricew');
                $p_pricey_array = I('post.p_pricey');
                $p_pricex_array = I('post.p_pricex');

                // 如果配件都没有名字，则不保存
                $p_name_array = array_filter($p_name_array);

                // print_r( I('post.'));exit;

                foreach ($p_name_array as $key => $val) {
                    $dataList[] = array('p_name' => $val,
                        'p_pricew' => $p_pricew_array[$key],
                        'p_pricey' => $p_pricey_array[$key],
                        'p_pricex' => $p_pricex_array[$key],
                        'p_sid' => $s_id); // 注意这里与Addview中不同
                }
                $parts->addAll($dataList);

                $this->success('更新成功！', U('/Home/Service/Listview'));
            }
        } else {

            $id = I('get.id');
            empty($id) && $this->error('参数不能为空！');



            $data = M('Service')->field(true)->find($id);
            $this->assign('data', $data);


            // 组织机构列表-1
            $crop_cate = M('crop_cate');
            $select = $crop_cate->where('pid=0')->getField('id,title');
            $echo_select_corp_cate = echo_select($select, $data['s_corp_1']);
            $this->assign('echo_select_corp_cate', $echo_select_corp_cate);

            // 组织机构列表-2 共用上一个
            $echo_select_corpinsu_cate = echo_select($select, $data['s_corp_insu2']);
            $this->assign('echo_select_corpinsu_cate', $echo_select_corpinsu_cate);

            // 保险公司的列表
            $corp = M('corp');
            $select = $corp->getField('c_id,c_name');
            $echo_select_corp = echo_select($select, $data['s_corp_insu']);
            $this->assign('echo_select_corp', $echo_select_corp);

            // 加载配件的信息
            $parts = M('parts');
            $result_parts = $parts->where('p_sid=' . $id)->order('p_id')->select();
            $this->assign('result_parts', $result_parts);

            // print_r($result_parts);

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
