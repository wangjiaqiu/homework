<?php
//使用会话内存储的变量值之前必须先开启会话
session_start();
//使用一个会话变量检查登录状态
$_SESSION['userurl'] = $_SERVER['REQUEST_URI'];
$id = $_GET['id'];
?>
  <?php include("shujuku.php") ?>

    <!DOCTYPE html>
    <html lang="zh-cn">

    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>锐景摄影:修改照片</title>

      <!-- Bootstrap -->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>

      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/main.css" rel="stylesheet">
    </head>

    <body>
      <?php
        include("dingbu.php");
        $username= $_SESSION['username'];
        $sql ="SELECT pictureid,picturename,img,type,say FROM qbank WHERE photographer = '$username' AND pictureid = '$id' ";
        $result = mysqli_query($conn,$sql);
        if(mysqli_affected_rows($conn)>0) {
            mysqli_data_seek($result,0);
            while ($row = mysqli_fetch_array($result)) {
        ?>

        <div class="container">
          <div class="row clearfix">
          <div class="col-xs-12 column margin5">
              <div class="page-header">
                <h3>
                修改照片描述
                </h3>
              </div>
          </div>
          <div class="col-xs-12 column ">
          <form class="form-horizontal" action="dochangepic.php" method="post" enctype="multipart/form-data">
              <fieldset>

              <input id="photographer" name="photographer" value="<?=$_SESSION['username']?>" type="hidden"   required="">
              
                <!-- 文本框-->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="picturename">照片名称</label>
                  <div class="col-md-7">
                    <input id="pictureid" name="pictureid" value="<?=$_GET['id']?>" type="hidden"  required="">
                    <input id="picturename" name="picturename" type="text" placeholder="" value="<?=$row['picturename']?>" class="form-control input-md" required="">
                  </div>
                </div>

                <!-- 文本框-->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="img">照片</label>
                  <div class="col-md-7">
                    <img src="<?=$row['img']?>" class="img-responsive" />
                  </div>
                </div>

                <!-- 文本域 -->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="say">描述</label>
                  <div class="col-md-7">
                    <textarea class="form-control" id="say" name="say"  value="<?=$row['say']?>"></textarea>
                  </div>
                </div>

                <!-- 文本域 -->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="types">所选分类</label>
                  <div class="col-md-7">
                  <p class="form-control-static"><?=$row['type']?></p>
                  </div>
                </div>

                <!-- 选择框 -->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="type">分类</label>
                  <div class="col-md-7">
                    <select id="type" name="type" class="form-control" required>
                      <option value="" disabled selected>请选择...</option>
                      <option value="风景">风景</option>
                      <option value="人物">人物</option>
                      <option value="美食">美食</option>
                      <option value="创意">创意</option>
                    </select>
                  </div>
                </div>

                <!-- 双按钮 -->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="">操作</label>
                  <div class="col-md-8">
                    <input type="submit" class="btn btn-primary"></input>
                    <input type="reset" id="reset" class="btn btn-default"></input>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
          </div>
        </div>

        <?php
        }
        // 释放资源
        mysqli_free_result($result);
    }else{
        echo "<td colspan='6'><p class='text-center'>未上传图片，请上传</p></td></tr>";
    }
          include("weibu.php");
        ?>
    </body>

    </html>