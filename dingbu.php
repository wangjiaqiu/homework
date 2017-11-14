<!-- 导航 -->
<div class="container top">
	<div class="row clearfix">
		<div class="col-xs-12 column padding3">
			<div class="row clearfix">
                <div class="col-xs-6 column padding1">
                    <img src="image/logo.png" class="img-responsive">
                </div>
            <?php
            //判断用户是否登录，显示不同提示
                    if(!isset($_SESSION['username'])){
                        echo'<div class="col-xs-6 column padding1" align="right">
						    <h6><a href="denglu.php"><font class="color3">&nbsp;&nbsp;登录&nbsp;&nbsp;</font></a>&nbsp;|&nbsp;<a href="zhuce.php"><font class="color3">&nbsp;&nbsp;注册&nbsp;&nbsp;</font></a>&nbsp;|&nbsp;<a href="wode.php"><font class="color3">&nbsp;&nbsp;我的作品&nbsp;&nbsp;</font></a></h6>
						</div>';
                        }
                    else{
                        $username= $_SESSION['username'];
                        echo '<div class="col-xs-6 column padding1" align="right">';
					    echo "<h6>&nbsp;&nbsp;您好,<font class='color3'>&nbsp;".$username."&nbsp;</font>会员&nbsp;&nbsp&nbsp;|&nbsp;<a href='tuichu.php'><font class='color3'>&nbsp;&nbsp;退出&nbsp;&nbsp;</font></a>&nbsp;|&nbsp;<a href='wode.php'><font class='color3'>&nbsp;&nbsp我的作品&nbsp;&nbsp</font></a></h6>
						</div>";
                        }
                    ?>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid search">
    <div class="container">
    	<div class="row clearfix">
    		<div class="col-xs-12 column">
    			<div class="row clearfix">
    			    <form class="navbar-form  padding1" role="search" action="sousuo.php" method="get">
                    <div class="form-group col-xs-offset-2  col-xs-7 column" align="right">
                        <input id="query" name="query" type="text" placeholder="搜索..." class="form-control" />
                    </div> 
                    <button id="" name="" type="submit" class="btn size2 button1"><font class="glyphicon glyphicon-search"></font></button>
                    </form>
    			</div>
    		</div>
    	</div>
    </div>
</div>
<hr class="hr1">	
<div class="container-fluid background2">
<div class="container">
	<div class="row clearfix">
		<div class="col-xs-12 column padding3">
			<div class="row clearfix">
                <div class="col-xs-2 column" align="center">
                    <a href="index.php">首页</a>
                </div>
                <div class="col-xs-2 column" align="center">
                    <a href="sousuo.php?query=风景">风景</a>
                </div>
                <div class="col-xs-2 column" align="center">
                    <a href="sousuo.php?query=人物">人物</a>
                </div>
                <div class="col-xs-2 column" align="center">
                    <a href="sousuo.php?query=美食">美食</a>
                </div>
                <div class="col-xs-2 column" align="center">
                    <a href="sousuo.php?query=创意">创意</a>
                </div>
                <div class="col-xs-2 column" align="center">
                    <a href="wode.php">我的作品</a>
                </div>
            </div>
		</div>
	</div>
</div>
</div>
