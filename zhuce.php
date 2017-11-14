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
                            <form id="loginForm" method="post" action="jiaruyonghu.php">
                                <div class="form-group color1 margin7">
                                    用户名
                                    <input type="text" id="username" class="form-control" name="username" value=""/>
                                </div>
                                <div class="form-group color1">
                                    密码
                                    <input type="text" id="password" class="form-control" name="password">

                                </div>
                                <input type="submit" value="注册" name="submit" class="btn btn-block btn-lg btn-submit"  style="background-color:#0abd9c;color:#ffffff;">
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
