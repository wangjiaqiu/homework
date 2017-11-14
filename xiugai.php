<?php
//插入连接数据库的相关信息
require_once 'shujuku.php';

//开启一个会话
session_start();

$error_msg = "";
if(!isset($_SESSION['id'])){
    if(isset($_POST['submit'])){
        $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        $user_username = mysqli_real_escape_string($dbc,trim($_POST['user']));
        $user_password = mysqli_real_escape_string($dbc,trim($_POST['password']));
        $user_newpassword = mysqli_real_escape_string($dbc,trim($_POST['newpassword']));
        if(!empty($user_username)&&!empty($user_password)){
            //MySql中的SHA()函数用于对字符串进行单向加密
            $query = "SELECT id, username FROM user WHERE username = '$user_username' AND "."password = '$user_password'";
            $data = mysqli_query($dbc,$query);
            //用用户名和密码进行查询，若查到的记录正好为一条，则设置SESSION，同时进行页面重定向
            if(mysqli_num_rows($data)==1){
                $row = mysqli_fetch_array($data);
                $id=$row['id'];
                mysqli_free_result($data);
                $query = "UPDATE `picture`.`user` SET `password` = '$user_newpassword' WHERE `user`.`id` = '$id';";
                $data = mysqli_query($dbc,$query);
                mysqli_close($dbc);
                $home_url = 'denglu.php';
                header('Location: '.$home_url);
            }else{//若查到的记录不对，则设置错误信息
                $error_msg = '请正确输入用户名和密码！';
            }
        }else{
            $error_msg = '请输入用户名和密码';
        }
    }
}else{
    $home_url = 'denglu.php';
    header('Location: '.$home_url);
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>锐景摄影</title>
        <!-- Bootstrap -->
        <script src="js/jquery.min.js"></script>    
        <script src="js/bootstrap.min.js"></script>  
         
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
    </head>
<body  class="background3">
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="row clearfix">
                <div class="col-xs-offset-4 col-xs-5 column margin4 background7">        
                    <div class="row clearfix">
                        <div class="col-xs-12 column">
                            <img src="image/logo.png" class="img-responsive">
                            <?php
                            if(!isset($_SESSION['user_id'])){
                                echo '<p class="error">'.$error_msg.'</p>';
                            }
                            ?>
                            <!-- $_SERVER['PHP_SELF']代表用户提交表单时，调用自身php文件 -->
                            <form id="loginForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="form-group">
                                    <input type="text" id="userL" class="form-control" name="user" value="<?php if(!empty($user_username)) echo $user_username; ?>" placeholder="用户名"/>
                                </div>
                                <div class="form-group">
                                    <input type="password" id="passwordL" class="form-control" name="password" placeholder="密码">

                                </div>
                                <div class="form-group">
                                    <input type="password" id="passwordL" class="form-control" name="newpassword" placeholder="新密码">

                                </div>
                                <input type="submit" value="修改" name="submit" class="btn btn-block btn-lg btn-submit" style="background-color:#fe6600;color:#ffffff;"></button>
                                <h6 align="right"><a href="denglu.php" style="color:#32373a;">返回登录&nbsp;&nbsp;</a<a href="zhuce.php" style="color:#32373a;">&nbsp;&nbsp;免费注册</a></h6>
                            </form>
                        </div>
                    </div>      
                </div>
            </div>    
        </div>
    </div>
</div>
</body>
</html>