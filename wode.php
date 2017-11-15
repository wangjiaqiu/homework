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
                <div class="col-xs-12 column">
                    <div class="row clearfix">
                    <div class="col-xs-12 column span1 margin5">
              <div class="page-header">
              <a href="shangchuan.php"><button type="button" class="btn btn-success pull-right">上传</button></a>
                <h3>
                试题列表
                </h3>
              </div>
              <div class="col-md-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>照片名称</th>
                      <th>照片</th>
                      <th>类型</th>
                      <th>描述</th>
                      <th>操作</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <!-- ... -->
                      <?php
                      if(!isset($_SESSION['username'])){
                        echo "<meta http-equiv='refresh' content='0.1;url=denglu.php'>";
                   }
                   else{
                        $username= $_SESSION['username'];
                        $sql ="SELECT pictureid,picturename,img,type,say FROM picture WHERE photographer = '$username' ";
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_affected_rows($conn)>0) {
                            mysqli_data_seek($result,0);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <td>
                                <?=$row['pictureid']?>
                                </td>
                                <td>
                                <a href="xiangqing.php?id=<?=$row['pictureid']?>"><?=$row['picturename']?></a>
                                </td>
                                <td>
                                <img src="<?=$row['img']?>" class="size4" />
                                </td>
                                <td>
                                <?=$row['type']?>
                                </td>
                                <td>
                                <?=$row['say']?>
                                </td>
                                <td>
                                <a href="changepic.php?id=<?=$row['pictureid']?>"><button type="button" class="btn btn-primary">修改</button></a>
                                <a href="shanchu.php?id=<?=$row['pictureid']?>"><button type="button" class="btn btn-danger">删除</button></a>
                                </td>
                            </tr>

                            <?php
                            }
                            echo "</tr>";
                            // 释放资源
                            mysqli_free_result($result);
                        }else{
                            echo "<td colspan='6'><p class='text-center'>未上传图片，请上传</p></td></tr>";
                        }
                    }
                        ?>


                      <!-- </tr> -->

                  </tbody>
                </table>

              </div>
            </div>
                      
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
