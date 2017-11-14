<?php
//使用会话内存储的变量值之前必须先开启会话
session_start();
$_SESSION['userurl'] = $_SERVER['REQUEST_URI']; 
//使用一个会话变量检查登录状态
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
                <div class="col-xs-12 column">
                    <div class="row clearfix">
                        <?php
                         $sql = "SELECT * FROM picture";
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_affected_rows($conn)>0) {
                            for($i=0;$i<4;$i++){
                                mysqli_data_seek($result,0);
                                echo "<div class='col-xs-3 column padding1' align='center'>";
                                    $k = 1;   
                                    while ($row = mysqli_fetch_array($result)) {
                                        $id=$row['id'];
                                        $img= $row['img'];
                                        $picturename=$row['picturename'];
                                        $describe=$row['describe'];
                                        $price= $row['price'];
                                        if($k%4==$i){
                                            echo "<a href='xiangqing.php?id=" .$id. "' style='color:#32373a;'>";
                                              echo "<div class='col-xs-12 column padding1' align='center'>";
                                                  echo "<div class='row clearfix list1'>";
                                                      echo "<div class='col-xs-12 column'>";
                                                         echo "<img class='size1 img-thumbnail' src='" .$img. "'/>";
                                                      echo "</div>";
                                                      echo "<div class='col-xs-12 column'>";
                                                         echo "<h5><b>".$picturename."</b></h5>";
                                                      echo "</div>";
                                                      echo "<div class='col-xs-12 column padding6'>";
                                                         echo "价格：".$price."元";
                                                      echo "</div>";
                                                  echo "</div>";
                                              echo "</div>";
                                            echo "</a>";  
                                        }  
                                    $k++;

                                    }
                                echo"</div>";
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
    </div>
</div>
<?php
    include("weibu.php");
?>
</body>
</html>
