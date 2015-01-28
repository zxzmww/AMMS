<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="{:U('/Home/Index')}"><strong><?php echo $result_config['title_1']; ?></strong></a> </div>
        <div id="navbar" class="collapse navbar-collapse"> 

            <?php
			#这里权限不同，显示的菜单也不同
            #如果是 维修公司或管理组或超级管理员
            if ($user_config['role_id'] == 2 || $user_config['role_id'] == 1 || $_SESSION['administrator'] == 1) {
                ?>
                <ul class="nav navbar-nav">
                	<li <?php show_active(array('Index'));?>><a href="{:U('/Home/Index')}"><span class="glyphicon glyphicon-globe"></span> 控制台</a></li>
                    <li <?php show_active(array('Service'));?>><a href="{:U('/Home/Service/Listview')}"><span class="glyphicon glyphicon-wrench"></span> 维修记录</a></li>
                    <li <?php show_active(array('CorpRole','CorpList','User','Role','Node','Syscfg',));?> class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> 系统配置<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{:U('/Home/CorpRole/Listview')}">组织机构管理</a></li>
                            <li><a href="{:U('/Home/CorpList')}">保险公司管理</a></li>
                            <li class="divider"></li>
                            <li><a href="{:U('/Home/User/Listview')}">用户管理</a></li>
                            <li><a href="{:U('/Home/Role/Listview')}">角色管理</a></li>
                            <li><a href="{:U('/Home/Node/Listview')}">模块管理</a></li>
                            <li class="divider"></li>
                            <li><a href="{:U('/Home/Syscfg')}">系统参数</a></li>
                        </ul>
                    </li>
                </ul>
                <?php
            } else {
                ?>
                <ul class="nav navbar-nav">
                    <li <?php show_active(array('Service'));?>><a href="{:U('/Home/Service/Listview2Insu')}" class="active"><span class="glyphicon glyphicon-wrench"></span> 维修记录</a></li>
                </ul>
                <?php
            }
            ?>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="glyphicon glyphicon-user"></span> <?php echo session('u_username'); ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{:U('/Home/Syscfg/PersonInfo')}"><span class="glyphicon glyphicon-user"></span> 个人信息</a></li>
                        <li><a href="{:U('/Home/Syscfg/ChangePwd')}"><span class="glyphicon glyphicon-eye-open"></span> 修改密码</a></li>
                        <li><a href="{:U('/Home/Login/Logout')}"><span class="glyphicon glyphicon-share-alt"></span> 退出</a></li>
                    </ul>
                </li>
            </ul>
            <p class="navbar-text navbar-right"> <strong>角色：</strong><?php echo $user_config['role_name']; ?> &nbsp;|&nbsp;
                <?php
                if ($user_config['role_id'] == 3) {
                    ?>
                    <strong>公司：</strong><?php echo $user_config['corp_name']; ?> &nbsp;|&nbsp;
                    <?php
                }
                ?>
                <strong>区域：</strong> <?php echo $user_config['cate_1']; ?><?php echo $user_config['cate_2']; ?> </p>
        </div>
        <!--/.nav-collapse --> 
    </div>
</nav>
