<?php 
include_once("database.php");
session_start();
define("key","@abc");


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
include("Layout/Noidungchung/Rieng/left.php");
$layout_area3=$noidung;
#điều khiển dữ liệu của trang web
switch ($fn) {
	case 'home':
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