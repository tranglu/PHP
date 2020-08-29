<?php 
define("key","@abc");
session_start();
$_SESSION["mangchon"]=array();
$_SESSION["mangmanhconlai"]=array();
#Khỏi tạo các biến giao diện
$layout_area1="";
$layout_area2="";
$layout_area3="";

# điều khiển chức năng
if(isset($_GET["fn"])==false)
	$fn="home";
else
	$fn=$_GET["fn"];
#nạp vùng dữ liệu cho nội dung chung
include("Noidungchung/Chung/menudata.php");
$layout_area1=$temp;
#điều khiển dữ liệu của trang web
switch ($fn) {
	case 'home':
		include("Noidungchung/Rieng/homedata.php");
		$layout_area2=$noidung;
		include("Noidungchung/Rieng/detailproduct.php");
		$layout_area3=$noidung;
		break;
	case 'manhghep':

	$layout_area2="LIÊN HỆ";
	include("Noidungchung/Rieng/manhghep.php");
	$layout_area3=$noidung;
		break;
	
	default:
		# code...
		break;
}
#nhận giao diện
include("Layout/index.php");
 ?>