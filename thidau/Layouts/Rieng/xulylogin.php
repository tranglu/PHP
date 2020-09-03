<?php 
include_once("../../config/database.php");
 ?>
<?php 
//session_start();
#lấy dữ liệu truyền
$ketnoi=mysqli_connect($server,$dblogin,$dbpass,$dbname,3308);
if (mysqli_connect_errno()==true) {
	$msg=mysqli_connect_error();
	echo "lỗi kết nối";
	exit();
}
// if(isset($_POST["txtTenLogin"])==false||$_POST["txtTenLogin"]=="")
// {
// header("location:index.php");
// }

$name=$_POST["txtTenLogin"];
$password=$_POST["txtPassword"];
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
 $sql="select* from huanluyenvien";
$datahlv=mysqli_query($ketnoi,$sql);
$dlhlv=array();
while($dongDL=mysqli_fetch_array($datahlv,MYSQLI_ASSOC))
{
  $bientam=array();
  $id=$dongDL["MaHLV"];
  $ten=$dongDL["Hoten"];
  $email=$dongDL["Email"];
  $pw=$dongDL["password"];
  $tentruong=$dongDL["tentruong"];
  array_push($bientam,$id);
  array_push($bientam,$ten);
  array_push($bientam,$email);
  array_push($bientam,$pw);
  array_push($bientam,$tentruong);
  array_push($dlhlv,$bientam);
 
};
foreach($dlhlv as $key){
   if($name==$key[2]&&$password==$key[3]){
  //   $_SESSION ["Logined"]=true;
  // $_SESSION ["LoginName"]=$name;
  header("location:../../index.php?fn=login");
  //echo"đăng nhập thành công";
  }
  else{
   //header("location:../../index.php");
   echo"thất bại";
  }
}
 
# ghi vao session
/*if()
$_SESSION ["Logined"]=true;
$_SESSION ["LoginName"]=$name;*/
#Quay về trang chủ

mysqli_close($ketnoi);

 ?>