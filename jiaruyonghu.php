<?php
session_start();
header('Content-Type:text/html;charset=utf-8');
//插入连接数据库的相关信息
require_once 'shujuku.php';
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Unable to connect!".mysqli_connect_error());

mysqli_set_charset($conn,"utf8");

$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT username FROM user where username = '$username'";
$data = mysqli_query($conn,$query);
            //用用户名和密码进行查询，若查到的记录正好为一条，则设置SESSION，同时进行页面重定向
            if(mysqli_num_rows($data)==1){
                echo '用户名重复，请重新填写';
                echo '<meta http-equiv="refresh" content="1;url=zhuce.php">';
            }else{//若查到的记录不对，则设置错误信息
                $sql = "INSERT INTO `user` (`username`,`password`) VALUES ('$username', '$password');";
                mysqli_query($conn,$sql);
                $_SESSION['id']=mysqli_insert_id($conn);
                $_SESSION['username']=$username;
                mysqli_close($conn);
                echo '注册成功!';
                echo '<meta http-equiv="refresh" content="1;url=index.php">';
            }
?>

