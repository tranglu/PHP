<?php 
require_once("Class/TlSach.php");
require_once("Class/Sach.php");

define("key","@abc");
#Khỏi tạo các biến giao diện
$layout_area1="";
$layout_area2="";
$layout_area3="";
$layout_area4="";

# điều khiển chức năng
if(isset($_GET["fn"])==false)
	$fn="home";
else
	$fn=$_GET["fn"];
// if (isset($_GET["fn"])&&isset($_GET["id"]) == false) {
// 		$fn = "home";
// 	} else {
// 		$fn = $_GET["fn"];
// 		$id = $_GET["id"];
// 	}
#nạp vùng dữ liệu cho nội dung chung
include("Noidungchung/Chung/menudata.php");
$layout_area1=$temp;
#điều khiển dữ liệu của trang web
switch ($fn) {
	case 'home':
		
		$layout_area2="TRANG CHỦ";
		$theloai = new TLSACH();
		// $theloai = $theloai->LayTheLoai($id);
		$category = $theloai->DSTheLoai();
		$layout_area3=$category;
		$sach = new SACH();
		// $sach = $sach->LaySach($id);
		$dssach = $sach->DSSach();
		$layout_area4=$dssach;
		break;
	case 'contact':

		$layout_area2="LIÊN HỆ";
		include("Noidungchung/Rieng/contactdata.php");
		$layout_area3=$noidung;
		break;
	case 'member':
		$layout_area2="SERVICES";
		$sach = new SACH();
		$sach = $sach->LaySach($id);
		$category = $sach->DSSach();
		$layout_area3=$category;
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

$webhtml=file_get_contents("Layouts/Layout1/layout1.tpl");
$webhtml=str_replace("[Vùng 2]",$layout_area2,$webhtml);
$webhtml=str_replace("[Vùng 1]",$layout_area1,$webhtml);
$webhtml=str_replace("[Vùng 3]",$layout_area3,$webhtml);
$webhtml=str_replace("[Vùng 4]",$layout_area4,$webhtml);
print($webhtml);
 ?>