<?php 
define("key","@abc");
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
		
		$layout_area2="TRANG CHỦ";
		include("Noidungchung/Rieng/homedata.php");
		$layout_area3=$noidung;
		break;
	case 'contact':

		$layout_area2="LIÊN HỆ";
		include("Noidungchung/Rieng/contactdata.php");
		$layout_area3=$noidung;
		break;
	case 'member':
		$layout_area2="SERVICES";
		include("Noidungchung/Rieng/servicesdata.php");
		$layout_area3=$noidung;
		break;
	case 'product':
		$layout_area2="PRODUCTS";
		include("Noidungchung/Rieng/detailproduct.php");
		$layout_area3=$noidung;
		break;
	default:
		# code...
		break;
}
#nhận giao diện

$webhtml=file_get_contents("Layouts/Layout2/shop.tpl");
$webhtml=str_replace("[Vùng 2]",$layout_area2,$webhtml);
$webhtml=str_replace("[Vùng 1]",$layout_area1,$webhtml);
$webhtml=str_replace("[Vùng 3]",$layout_area3,$webhtml);
print($webhtml);
 ?>