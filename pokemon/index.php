<?php 
include_once("database.php");
session_start();
$ketnoi=mysqli_connect($server,$dblogin,$dbpass,$dbname,3308);
if (mysqli_connect_errno()==true) {
	$msg=mysqli_connect_error();
	echo "lỗi kết nối";
	exit();
}
		echo "<pre>";
		var_dump($_SESSION);
		echo "</pre>";
define("key","@abc");
if (empty($_SESSION['Loggedin'])) {
	$_SESSION['Loggedin'] = true;
	echo "<pre>";
		var_dump($_SESSION);
		echo "</pre>";
	$x=rand(1,10);
	$y=rand(1,10);
	date_default_timezone_set("Asia/Ho_Chi_Minh");	
	$time= date("Y-m-d h:i:sa");

	$sql="INSERT INTO nguoichoi ( `NgayChoi`, `SoLuongBat`, `ToaDoX`, `ToaDoY`) VALUES ('$time',0,'$x','$y')";	
	$data=mysqli_query($ketnoi,$sql);
	$_SESSION['LoginId'] = mysqli_insert_id($ketnoi);
	#cập nhật tọa độ pokemon
	$sqlpoke="select* from pokemon";
	$datapoke=mysqli_query($ketnoi,$sqlpoke);
	while ($pokemon = mysqli_fetch_array($datapoke,MYSQLI_ASSOC)) {

	$toadox = $pokemon['ToaDoX'] + rand(-1,1);
	$toadoy = $pokemon['ToaDoY'] + rand(-1,1);

	if ($toadox>10 ||$toadox<1) {
		$toadox = $pokemon['ToaDoX'];
	}

	if ($toadoy>10 ||$toadoy<1) {
		$toadoy = $pokemon['ToaDoY'];
	}


	$id = $pokemon['Id'];

	$sqlupdate = "UPDATE `pokemon` SET `ToaDoX` = '$toadox', `ToaDoY` = '$toadoy' WHERE `pokemon`.`Id` = $id;";
	$run = mysqli_query($ketnoi,$sqlupdate);

}
	# ngắt kết nối
	mysqli_close($ketnoi);	
}


#Khởi tạo các biến giao diện
$layout_area1="";
$layout_area2="";
$layout_area3=""; 
$layout_area4="";
if(isset($_GET["fn"])==false)
	$fn="home";
else
	$fn=$_GET["fn"];
#nạp vùng dữ liệu cho nội dung chung
include("Layout/Noidungchung/Chung/menudata.php");
$layout_area1=$temp;
$layout_area2="Lữ Thị Thùy Trang - 1888180";

#điều khiển dữ liệu của trang web
switch ($fn) {
	case 'home':
		include("Layout/Noidungchung/Chung/left.php");
		$layout_area3=$noidung;
		$layout_area4="Click chọn Play trên thanh menu để bắt đầu chơi";
		break;
	case 'play':
		include("Layout/Noidungchung/Rieng/left.php");
		$layout_area3=$noidung;
		include("Layout/Noidungchung/Rieng/right.php");
		$layout_area4=$noidung;
	default:
		# code...
		break;
}
#nhận giao diện
$webhtml=file_get_contents("Layout/index.tpl");
$webhtml=str_replace("[Vùng 1]",$layout_area1,$webhtml);
$webhtml=str_replace("[Vùng 2]",$layout_area2,$webhtml);
$webhtml=str_replace("[Vùng 3]",$layout_area3,$webhtml);
$webhtml=str_replace("[Vùng 4]",$layout_area4,$webhtml);
print($webhtml);


 ?>