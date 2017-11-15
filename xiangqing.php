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
        <div class="col-xs-12 column margin6 border1">
            <div class="row clearfix">
                <?php 
                $id= $_GET['id'];
                $sql = "SELECT * FROM picture where pictureid='$id'";
                $result = mysqli_query($conn,$sql);
                if(mysqli_affected_rows($conn)>0) {
                    mysqli_data_seek($result,0);
                    $k = 0;   
                    while ($row = mysqli_fetch_array($result)) {
                        $pictureid=$row['pictureid'];
                        $img= $row['img'];
                        $picturename=$row['picturename'];
                        $say=$row['say'];
                        $photographer=$row['photographer'];
                        $type= $row['type'];
                        echo "<div class='list1'>";     
                            echo "<div class='col-xs-12 column'>";
                                echo "<div class='row clearfix'>";
                                    echo "<div class='col-xs-4 column'>";
                                       echo "<img class='img-responsive size3' src='" .$img. "'/>";
                                    echo "</div>";
                                    echo "<div class='col-xs-offset-2 col-xs-6 column'>";
                                        echo "<div class='col-xs-12 column'>";
                                           echo "<h3><b>".$picturename."</b></h3>";
                                           echo "<hr>";
                                           echo "<h4><b>分类:</b><a href='sousuo.php?query=".$type."' style='color:#F39800;'>".$type."(点击查看该种类下更多)</a></h4>";
                                           echo "<h4><b>作者:</b><a href='sousuo.php?query=".$photographer."' style='color:#F39800;'>".$photographer."(点击查看该作者作品)</a></h4>";
                                           echo "<h4><b>描述:</b>".$say."</h4>";
                                        echo "</div>";
                                    echo "</div>";    
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";    
                    }
                    // 释放资源
                    mysqli_free_result($result);
                     // 关闭连接
                    mysqli_close($conn);
                    }else{
                        echo "尚无数据";
                    }
                    ?>
            </div>
        </div>
    </div>
</div>


<?php
    include("weibu.php");
?>
</body>
</html>
