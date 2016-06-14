<!-- 用户书籍记录 -->
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Manage Users</title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>source/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<!-- 导航栏================================================== -->
<div class="navbar-wrapper">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- 标题的头部 -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                            aria-expanded="false" aria-controls="navbar">
                        <!--  <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar">zjw</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span> -->
                    </button>
                    <!-- 标题的名字 -->
                    <a class="navbar-brand" href="<?php echo site_url(); ?>">Book Share</a>
                </div>
                <!-- 副标题 -->
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <!-- 登录 -->
                        <!--
                        <script type="text/javascript">
                        signinFuc();
                        haveSigned(zjw);
                        // 如果没有登录了，调用这个方法
                        function signinFuc() {
                          document.write("<li><a href=/"
                            login.html / ">Sign in</a></li>");
                        }
                        //如果已经登录，那么调用这个方法
                        function haveSigned(username) {
                          document.write("<li><a href=/"
                            login.html / ">" + username + "</a></li>");
                        }
                        </script>
                        <li onloadstart="signinFuc()">
                        </li> -->
                        <?php
                        if (isset($_SESSION['user'])) {
                            $user = $_SESSION['user']; ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false"><?php echo $user->username ?><span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo site_url('book/add'); ?>">Share my books</a></li>
                                    <li><a href="<?php echo site_url('user'); ?>">My books</a></li>
                                    <li><a href="<?php echo site_url('user/history'); ?>">History</a></li>
                                    <?php if ($user->role == 'admin') { ?>
                                        <li><a href="<?php echo site_url('book/manage'); ?>">Manage Books</a></li>
                                        <li><a href="<?php echo site_url('user/manage'); ?>">Manage Users</a></li>
                                    <?php } ?>
                                    <li role="separator" class="divider"></li>
                                    <!-- 如果是管理员，那么跳到管理员的界面 -->
                                    <!-- 如果不是没有效果 -->
                                    <li><a href="<?php echo site_url('user/logout'); ?>">Log Out</a></li>
                                </ul>
                            </li>
                        <?php } else {
                            ?>
                            <li><a href="<?php echo site_url('user/login'); ?>">Sign in</a></li>
                        <?php } ?>
                        <!-- 搜索图书-->
                        <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!11 -->
                        <li><a href="<?php echo site_url('about'); ?>">About</a></li>
                        <form action="<?php echo site_url('book/search');?>" method="post" class="navbar-right navbar-form " role="search">
                            <div class="form-group">
                                <input name="key" type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default">Search</button>
                        </form>
                    </ul>
                    <!-- dropdown  -->
                </div>
        </nav>
    </div>
</div>
<h2 style="text-align: center;">Manage Users</h2>
<br>
<div class="container">
    <table class="table table-striped">
        <tr>
            <!-- 流水号 -->
            <th>No.</th>
            <th>User name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>role</th>
            <th>credits</th>
            <th>manage</th>
        </tr>
        <!-- 成功分享，没有被借阅 -->
        <?php $i=1; foreach ($users as $user){?>
            <tr>
                <td><?php echo $i++;?></td>
                <td><a href="<?php echo site_url('user').'/'.$user->username;?>"><?php echo $user->username;?></a></td>
                <td><?php echo $user->phone;?></td>
                <td><?php echo $user->address;?></td>
                <td><?php echo $user->role;?></td>
                <td><?php echo $user->credits;?></td>
                <td>
                    <a href="<?php echo site_url('user/change_credits').'/'.'10'.'/'.$user->username;?>" type="button" class="btn btn-success">加10分</a>
                    <a href="<?php echo site_url('user/change_credits').'/'.'-10'.'/'.$user->username;?>" type="button" class="btn btn-warning">减10分</a>
                    <?php if ($user->role != 'admin') { ?>
                    <a href="<?php echo site_url('user/defriend').'/'.$user->username;?>" type="button" class="btn btn-danger">拉黑</a>
                    <?php } ?>
                </td>
            </tr>
        <?php }?>
    </table>
    <br>
    <br>
    <!-- 返回按钮 -->
    <script type="text/javascript">
        function goBack() {
            history.back();
        }
    </script>
    <button onclick=" goBack() " class="glyphicon glyphicon-arrow-left btn-lg "></button>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js "></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js "></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url();?>source/js/bootstrap.min.js "></script>
</body>

</html>