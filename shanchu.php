<?php
header('Content-Type:text/html;charset=utf-8');
//插入连接数据库的相关信息
require_once 'shujuku.php';
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Unable to connect!".mysqli_connect_error());

mysqli_set_charset($conn,"utf8");
$id = $_GET['id'];
$sql = "DELETE FROM `cart` WHERE `cart`.`cartid` = $id";
$resault=mysqli_query($conn,$sql);
if(isset($resault)){
	mysqli_close($conn);
echo '删除成功';
echo "<meta http-equiv='refresh' content='1;url=wode.php'>";	
}else{
	echo errorMessage();
}
?>

