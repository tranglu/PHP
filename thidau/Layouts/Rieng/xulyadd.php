<?php
session_start();
if(isset($_SESSION ["Login"])==false||$_SESSION ["Login"]==false)
{#echo "Bạn chưa login";
header("location:../../index.php");
}
?>
<?php 
$backURL="../../index.php?fn=list";
 ?>
<?php 
include_once("../../config/database.php");

$doi=$_SESSION['doi'];
$emailthisinh=$_POST["email"];
$hotethisinh=$_POST["hoten"];


#kết nối SQL
$ketnoi=mysqli_connect($server,$dblogin,$dbpass,$dbname,3308);
if (mysqli_connect_errno()==true) {
  $msg=mysqli_connect_error();
  echo "lỗi kết nối";
  exit();
}
$sql="select* from dsthisinh";
$datathisinh=mysqli_query($ketnoi,$sql);
$dlthisinh=array();
$biendem=0;
$bienkiememail=0;
while($dongDL=mysqli_fetch_array($datathisinh,MYSQLI_ASSOC))
{
	$bientam=array();
	$email=$dongDL["Email"];
	$ten=$dongDL["HoTen"];
	$tendoi=$dongDL["TenDoiThi"];
	if($emailthisinh==$email){
		$bienkiememail++;
	};
	if($dongDL["TenDoiThi"]==$doi){
		$biendem++;
	array_push($bientam,$email);
	array_push($bientam,$ten);
	array_push($bientam,$tendoi);
	array_push($dlthisinh,$bientam);
	};	
}
if($bienkiememail!=0){
	echo"thí sinh đã tồn tại <br>";
	echo"<a href='../../index.php?fn=add'>Quay lại trang thêm Thí Sinh</a>";
}
else if($biendem==3){
	echo"đội đã đủ 3 thành viên<br>";
	echo"<a href='../../index.php?fn=add'>Quay lại trang thêm Thí Sinh</a>";
}
else{
	$addthisinh="INSERT INTO dsthisinh(Email, TenDoiThi, HoTen) VALUES ('$emailthisinh','$doi',  '$hotethisinh')";
	$datats=mysqli_query($ketnoi,$addthisinh);
	header("location:$backURL");
}
 mysqli_close($ketnoi);
 ?>
<?php 
$backURL="../../index.php?fn=list";
 ?>