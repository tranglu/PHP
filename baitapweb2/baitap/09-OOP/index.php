<?php

require_once('Classes/CTheLoai.php');
require_once('Classes/CSach.php');

$title = "Đây là title";
$navbar = "Đây là navbar";
$category = "Đây là categorylist";
$booklist = "Đây là booklist";
$bookDetail = "Đây là bookDetail";
$footer = "Đây là footer";
$webContent = "Đây là body";

#Điều khiển chức năng
	if (isset($_GET["fn"])&&isset($_GET["id"]) == false) {
		$fn = "home";
	} else {
		$fn = $_GET["fn"];
		$id = $_GET["id"];
	}

	#Nạp dữ liệu cho vùng navbar
	include('NoiDung/Chung/navbar.php');
	$navbar = $navbar; #menu	

	#Điều khiển dữ liệu của các trang web
	switch ($fn) {
		case 'category':			
			$theloai = new CTheLoai();
			$theloai = $theloai->LayTheLoai($id);
			$title = "Thể loại ".$theloai->TenTL; #title

			$category = $theloai->DSTheLoai();
			$booklist = $theloai->LaySach($id);

			$webContent = file_get_contents('Layouts/LayoutChung.tpl');
			$webContent = str_replace('!!category!!',$category,$webContent);
			$webContent = str_replace('!!booklist!!',$booklist,$webContent);
			break;

		case 'book':
			
			$sach = new CSach();
			$sach = $sach->LaySach($id);			

			// $theloai = new CTheLoai();
			// $theloai = $theloai->LayTheLoai($sach->ObjTL->ID);
			// $category = $theloai->DSTheLoai();	

			$title = $sach->TenSach; #title
			$bookDetail = $sach->showData();

			$webContent = file_get_contents('Layouts/BookDetail.tpl');
			$webContent = str_replace('!!bookDetail!!',$bookDetail,$webContent);

			break;		

		default:
			$title = "Trang chủ";
			$theloai = new CTheLoai();
			$category = $theloai->DSTheLoai();
			$sach = new CSach();
			$booklist = $sach->DSSach();

			$webContent = file_get_contents('Layouts/LayoutChung.tpl');
			$webContent = str_replace('!!category!!',$category,$webContent);
			$webContent = str_replace('!!booklist!!',$booklist,$webContent);
			break;
	}

	
	$webContent = str_replace('!!title!!',$title,$webContent);
	$webContent = str_replace('!!navbar!!',$navbar,$webContent);	
	$webContent = str_replace('!!footer!!',$footer,$webContent);
	print($webContent);

	#Nạp dữ liệu cho vùng footer
	include('NoiDung/Chung/footer.php');
	$layout_area1 = $footer; #menu

?>