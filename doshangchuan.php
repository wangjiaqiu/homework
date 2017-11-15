<?php
header('Content-Type:text/html;charset=utf-8');
//插入连接数据库的相关信息
require_once 'shujuku.php';
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Unable to connect!".mysqli_connect_error());

mysqli_set_charset($conn,"utf8");
if(!isset($_SESSION['username'])){
    echo "<meta http-equiv='refresh' content='0.1;url=denglu.php'>";
}else{
    $picturename = $_POST['picturename'];
    $type = $_POST['type'];
    $say = $_POST['say'];
    $photographer = $_POST['photographer'];
    
    //$pic = $_POST['pic'];
    $upload_dir = "image/";
    $name = time();
    $ext = ".jpg";
    $upload_src= $upload_dir . $name .$ext;
    move_uploaded_file($_FILES["img"]["tmp_name"],$upload_src);
    //move_uploaded_file($_FILES["pic"]["tmp_name"], "uploads/" . $_FILES["pic"]["name"]);
    $sql = "INSERT INTO `picture` (`pictureid`,`picturename`,`img`,`type`,`say`,`photographer`) VALUES (null,'$picturename', '$upload_src','$type','$say','$photographer')";
    
    $resault = mysqli_query($conn,$sql);
    
    if(isset($resault)){
        mysqli_close($conn);
    echo '添加成功';
    echo "<meta http-equiv='refresh' content='1;url=wode.php'>";	
    }else{
        echo errorMessage();
    }
}

?>
