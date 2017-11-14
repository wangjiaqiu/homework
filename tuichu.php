<?php
//即使是注销时，也必须首先开始会话才能访问会话变量
session_start();
//使用一个会话变量检查登录状态
if(isset($_SESSION['id'])){
    //要清除会话变量，将$_SESSION超级全局变量设置为一个空数组
    $_SESSION = array();
    //使用内置session_destroy()函数调用撤销会话
    session_destroy();
}
//location首部使浏览器重定向到另一个页面
$home_url = 'index.php';
header('Location:'.$home_url);
?>