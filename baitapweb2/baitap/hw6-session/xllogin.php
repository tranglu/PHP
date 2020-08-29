<?php 
session_start();
#lấy dữ liệu truyền
if(isset($_POST["txtTenLogin"])==false||$_POST["txtTenLogin"]=="")#k có login hoặc k nhập gì
{
header("location:index.php");
}

$name=$_POST["txtTenLogin"];

# ghi vao session
$_SESSION ["Logined"]=true;
$_SESSION ["LoginName"]=$name;
#Quay về trang chủ
header("location:index.php");
 ?>