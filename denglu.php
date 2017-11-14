<?php
//插入连接数据库的相关信息
require_once 'shujuku.php';

//开启一个会话
session_start();

$error_msg = "";
//如果用户未登录，即未设置$_SESSION['id']时，执行以下代码
if(!isset($_SESSION['id'])){
    if(isset($_POST['submit'])){//用户提交登录表单时执行如下代码
        $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        $user_username = mysqli_real_escape_string($dbc,trim($_POST['user']));
        $user_password = mysqli_real_escape_string($dbc,trim($_POST['password']));

        if(!empty($user_username)&&!empty($user_password)){
            //MySql中的SHA()函数用于对字符串进行单向加密
            $query = "SELECT id, username FROM user WHERE username = '$user_username' AND "."password = '$user_password'";
            $data = mysqli_query($dbc,$query);
            //用用户名和密码进行查询，若查到的记录正好为一条，则设置SESSION，同时进行页面重定向
            if(mysqli_num_rows($data)==1){
                $row = mysqli_fetch_array($data);
                $_SESSION['id']=$row['id'];
                $_SESSION['username']=$row['username'];
                if (isset ($_SESSION['userurl'])) {
                  $home_url = $_SESSION['userurl']; 
                }
                else{
                  $home_url = 'index.php';    
                }
                header('Location: '.$home_url);
            }else{//若查到的记录不对，则设置错误信息
                $error_msg = '请正确输入用户名和密码！';
            }
        }else{
            $error_msg = '请输入用户名和密码';
        }
    }
}else{//如果用户已经登录，则直接跳转到已经登录页面
    $home_url = 'index.php';
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
    <style type="text/css">
        .form-control{
            background-color: transparent;
            border: none;
            border-bottom: 1px solid #ffffff;
            -webkit-transition: none;
            -webkit-box-shadow: none;
            border-radius: 0px;
        }
    </style>
</head>
<body  class="background3">
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="row clearfix">
                <div class="col-xs-offset-4 col-xs-5 column margin4">        
                    <div class="row clearfix">
                        <div class="col-xs-12 column">
                            <img src="image/logo.png" class="img-responsive">
                            <?php
                            if(!isset($_SESSION['user_id'])){
                                echo '<p class="error color1">'.$error_msg.'</p>';
                            }
                            ?>
                            <!-- $_SERVER['PHP_SELF']代表用户提交表单时，调用自身php文件 -->
                            <form id="loginForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="form-group color1">
                                    用户名
                                    <input type="text" id="userL" class="form-control color1" name="user" placeholder=""/>
                                </div>
                                <div class="form-group color1">
                                    密码
                                    <input type="text" id="passwordL" class="form-control color1" name="password" placeholder="">

                                </div>
                                <input type="submit" value="登录" name="submit" class="btn btn-block btn-lg btn-submit" style="background-color: #0abd9c;color:#ffffff;"></button>
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
