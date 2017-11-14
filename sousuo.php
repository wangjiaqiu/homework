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
        <div class="col-xs-12 column span1">
            <div class="row clearfix">
                <div class="col-xs-12 column margin1">
                    <div class="row clearfix">
                        <?php
                        $sql = "select * from picture where concat(picturename,type,photographer) like '%".$_GET['query']."%'";
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_affected_rows($conn)>0) {
                            for($i=1;$i<5;$i++){
                                mysqli_data_seek($result,0);
                                echo "<div class='col-xs-3 column padding1' align='center'>";
                                    $k = 1;   
                                    while ($row = mysqli_fetch_array($result)) {
                                        $pictureid=$row['pictureid'];
                                        $img= $row['img'];
                                        $picturename=$row['picturename'];
                                        $type=$row['type'];
                                        $photographer=$row['photographer'];
                                        if((($k%4==$i)&&($i!=4))||(($k%4==0)&&($i==4))){
                                            echo "<a href='xiangqing.php?id=" .$pictureid. "' style='color:#32373a;'>";
                                              echo "<div class='col-xs-12 column margin3'>";
                                                  echo "<div class='row clearfix card'>";
                                                      echo "<div class='col-xs-12 column padding1' align='center'>";
                                                         echo "<img class='img-responsive' src='" .$img. "'/>";
                                                      echo "</div>";
                                                      echo "<h5><b>".$picturename."</b></h5>";
                                                      echo "<h5>分类：".$type."</h5>";
                                                      echo "<h5>作者：".$photographer."</h5>";
                                                  echo "</div>";
                                              echo "</div>";
                                            echo "</a>";  
                                            // ((($k%4==$i)&&($i=!4))||(($k%4==0)&&($i=4)))
                                        }  
                                    $k++;

                                    }
                                echo"</div>";
                            }   
                            // 释放资源
                            mysqli_free_result($result);
                             // 关闭连接
                            mysqli_close($conn);
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include("weibu.php");
?>
</body>
</html>
