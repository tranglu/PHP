<?php 
include_once("config/database.php");
 ?>
<?php 
session_start();
#lấy dữ liệu truyền
$ketnoi=mysqli_connect($server,$dblogin,$dbpass,$dbname,3308);
if (mysqli_connect_errno()==true) {
	$msg=mysqli_connect_error();
	echo "lỗi kết nối";
	exit();
}
if(isset($_POST["txtTenLogin"])==false||$_POST["txtTenLogin"]=="")
{
header("location:index.php");
}

$name=$_POST["txtTenLogin"];
$password=$_POST["txtPassword"];

 $user="select* from thongtinnguoidung";
$datauser=mysqli_query($ketnoi,$user);
$htmlDMStimkiem="";
while($dongDL1=mysqli_fetch_array($datauser,MYSQLI_ASSOC))
{
  $username=$dongDL1["Username"];
  $PW=$dongDL1["Password"];
  $lock=$dongDL1["BiLock"];
  if($username==$name&&$PW==$password&& $lock==0){
  	$_SESSION ["Logined"]=true;
	$_SESSION ["LoginName"]=$name;
	header("location:index.php");
  }
  else{
  	header("location:index.php");
  }
};
 
# ghi vao session
/*if()
$_SESSION ["Logined"]=true;
$_SESSION ["LoginName"]=$name;*/
#Quay về trang chủ

mysqli_close($ketnoi);

 ?>