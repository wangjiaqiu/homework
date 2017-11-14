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
            <div class="row clearfix">
                <div class="col-xs-12 column margin1">
                    <a href="shangchuan.php"><button type="button" class="btn btn-default">上传</button></a>
                </div>
                <div class="col-xs-12 column">
                    <div class="row clearfix">
                        <?php
                        if(!isset($_SESSION['username'])){
                             echo "<meta http-equiv='refresh' content='0.1;url=denglu.php'>";
                        }
                        else{
                            $username= $_SESSION['username'];
                            $sql ="SELECT * FROM `cart` inner join `picture` on `cart`.`pictureid` = `picture`.`id` where username = $username";
                            $result = mysqli_query($conn,$sql);   
                            if(mysqli_affected_rows($conn)>0) {
                                mysqli_data_seek($result,0);
                                $k = 0;   
                                while ($row = mysqli_fetch_array($result)) {
                                    $pictureid=$row['pictureid'];
                                    $type= $row['type'];
                                    $say= $row['say'];
                                    $img= $row['img'];
                                    $picturename=$row['picturename'];

                                    echo "<div class='col-xs-12 column padding4 list3' align='center'>";
                                        echo "<div class='row clearfix'>";
                                            echo "<div class='col-xs-3 column'>";
                                               echo "<img class='size4' src='" .$img. "'/>";
                                            echo "</div>";
                                            echo "<div class='col-xs-2 column a1'>";
                                               echo "<a href='xiangqing.php?id=" .$pictureid. "'><h5><b>".$picturename."</b></h5></a>";
                                            echo "</div>";
                                            echo "<div class='col-xs-2 column'>";
                                               echo "<h5><b>".$type."</b></h5>";
                                            echo "</div>";
                                            echo "<div class='col-xs-3 column'>";
                                               echo "<h5><b>".$say."</b></h5>";
                                            echo "</div>";
                                            echo "<div class='col-xs-2 column'>";
                                               echo "<a href=\"shanchu.php?id=".$id."\" style=\"color:#333333;cursor: pointer;\"><b>删除</b></h5></a>";
                                            echo "</div>";
                                        echo "</div>";
                                    echo "</div>";
      
                                    $k++;

                                }
                                // 释放资源
                                mysqli_free_result($result);
                                // 关闭连接
                                mysqli_close($conn);
                                }else{
                                     echo "<h3>您尚未上传作品</h3>";
                                }
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
