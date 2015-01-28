<?php

return array(
    'URL_HTML_SUFFIX' => '',
    'TMPL_TEMPLATE_SUFFIX' => '.php',
    'SESSION_OPTIONS' => array(
        'type' => 'db', //session采用数据库保存
        'expire' => 1440, //session过期时间，如果不设就是php.ini中设置的默认值
    ),
    'SESSION_TABLE' => 'think_session', //必须设置成这样，如果不加前缀就找不到数据表，这个需要注意
    'URL_MODEL' => 2, // 如果你的环境不支持PATHINFO 请设置为3
    'DB_TYPE' => 'mysql',
    'DB_HOST' => 'localhost',
    'DB_NAME' => 'tb_amms',
    'DB_USER' => 'root',
    'DB_PWD' => '123456',
    'DB_PORT' => '3306',
    'DB_PREFIX' => 'think_',
    'APP_AUTOLOAD_PATH' => '@.TagLib',
    'SESSION_AUTO_START' => true,
    #'TMPL_ACTION_ERROR' => 'Public:success', // 默认错误跳转对应的模板文件
    #'TMPL_ACTION_SUCCESS' => 'Public:success', // 默认成功跳转对应的模板文件
    'USER_AUTH_ON' => true,
    'USER_AUTH_TYPE' => 2, // 默认认证类型 1 登录认证 2 实时认证
    'USER_AUTH_KEY' => 'key_zhousuo', // 用户认证SESSION标记
    'ADMIN_AUTH_KEY' => 'administrator',
    'USER_AUTH_MODEL' => 'user', // 默认验证数据表模型
    'AUTH_PWD_ENCODER' => 'md5', // 用户认证密码加密方式
    'USER_AUTH_GATEWAY' => '/Home/login', // 默认认证网关
    'NOT_AUTH_MODULE' => '/Home/login', // 默认无需认证模块
    'REQUIRE_AUTH_MODULE' => '', // 默认需要认证模块
    'NOT_AUTH_ACTION' => '', // 默认无需认证操作
    'REQUIRE_AUTH_ACTION' => '', // 默认需要认证操作
    'GUEST_AUTH_ON' => false, // 是否开启游客授权访问
    'GUEST_AUTH_ID' => 0, // 游客的用户ID
    'DB_LIKE_FIELDS' => 'title|remark',
    'RBAC_ROLE_TABLE' => 'think_role',
    'RBAC_USER_TABLE' => 'think_role_user',
    'RBAC_ACCESS_TABLE' => 'think_access',
    'RBAC_NODE_TABLE' => 'think_node',
    'SHOW_PAGE_TRACE' => 0
);
