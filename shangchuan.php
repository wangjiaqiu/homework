<?php
//使用会话内存储的变量值之前必须先开启会话
session_start();
//使用一个会话变量检查登录状态
$_SESSION['userurl'] = $_SERVER['REQUEST_URI']; 
?>
<?php include("shujuku.php") ?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>锐景摄影</title>

    <!-- Bootstrap -->
    <script src="js/jquery.min.js"></script>    
    <script src="js/bootstrap.min.js"></script> 
      
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
</head>
<body>
<?php
    include("dingbu.php");
?>

<div class="container">
    <div class="row clearfix">
        <div class="col-xs-12 column span1 margin5">
            
        </div>
    </div>
</div>

<?php
    include("weibu.php");
?>
</body>
</html>
