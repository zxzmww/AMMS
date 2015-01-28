<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title><?php echo $result_config['title_1']; ?></title>
        <!-- Bootstrap -->
        <link href="__PUBLIC__/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                      <script src="__PUBLIC__/js/html5shiv.min.js"></script>
                      <script src="__PUBLIC__/js/respond.min.js"></script>
                    <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container">
                <div class="navbar-header"> <a class="navbar-brand" href="#"><?php echo $result_config['title_1']; ?></a> </div>
                <!--/.nav-collapse --> 
            </div>
        </nav>
        <div class="container">
            <h2 class="text-center"> <?php echo $result_config['title_2']; ?> </h2>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-xs-12 col-md-4">
                    <form class="form-signin" role="form" method="post" action="{:U('/Home/Login/LoginCheck')}">
                        <h2 class="form-signin-heading"></h2>
                        <input type="username" name="username" class="form-control" placeholder="账号" required autofocus>
                        <br>
                        <input type="password" name="password"  class="form-control" placeholder="密码" required>
                        <br>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">登 录</button>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <!-- /container --> 

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <!-- Include all compiled plugins (below), or include individual files as needed --> 
        <script src="__PUBLIC__/js/jquery.min.js"></script> 
        <script src="__PUBLIC__/dist/js/bootstrap.min.js"></script>
    </body>
</html>