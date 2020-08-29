<?php

/**
 * Lấy dữ liệu từ DataBase
 */
class CDataBase
{
	private static $hostname = "localhost";
	private static $DBname = "ql_bansach1";
	private static $login = "root";
	private static $pass = "";

	protected static function GoiSQL($lenhSQL){

		// 1. Kết nối vào DB
		$ketnoi = mysqli_connect(CDataBase::$hostname, CDataBase::$login, CDataBase::$pass, CDataBase::$DBname,3308);
		if (mysqli_connect_errno()==true) {
			$msg = mysqli_connect_error();
			echo "<p style='color:red'>Có lỗi kết nối đến database $msg</p> ";
		}

		mysqli_query($ketnoi,"SET CHARACTER SET utf8");

		// 2. Viết câu lệnh SQL lấy dữ liệu
		//$sql = "select * from theloaisach where ID = 'TC';";		

		// 3. Thực hiện lệnh SQL qua PHP
		$data = mysqli_query($ketnoi,$lenhSQL);

		// echo "<hr>";
		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		// echo "<hr>";
		// die;

		// 4. Nhận / xử lý dữ liệu nếu có
		$htmlBookDetail = array();
		while ($dongDuLieu = mysqli_fetch_array($data,MYSQLI_ASSOC)) {
			array_push($htmlBookDetail, $dongDuLieu);
			//$htmlBookDetail[] = $dongDuLieu;
		}
		// $htmlBookDetail = "";
		// while ($dongDuLieu = mysqli_fetch_array($data,MYSQLI_ASSOC)) {			
		// 	$bookID = $dongDuLieu["IDS"];
		// 	$bookName = $dongDuLieu["TenSach"];
		// 	$bookImgUrl = $dongDuLieu["URLHinh"];
		// 	$bookPrice = $dongDuLieu["GiaBan"];
		// 	$bookQuality = $dongDuLieu["SoLuong"];
		// 	$bookCategory = $dongDuLieu["TL"];		
		// 	$htmlBookDetail .= "<div style='height:110px'>
		// 							<img style='float:left; width:100px;' src='$bookImgUrl'>
		// 							<div style='float:left; clear:right'>
		// 								<h2>$bookName</h2>
		// 								<div>Giá bán: $bookPrice</div>
		// 								<div>Số lượng: $bookQuality</div>
		// 								<div>Thể loại: $bookCategory</div>								
		// 								<h5><a href='Admin/bookEdit.php?ids=$bookID&tl=$bookCategory'>Hiệu chỉnh</a></h5>
		// 							</div>
																	
		// 						</div>
		// 						<div style='clear:both'></div> <br>";		
		// }
		// 5. Ngắt kết nối dữ liệu
		mysqli_close($ketnoi);

		$temp = $htmlBookDetail;

		return $temp;
		//return $data = array('haha' => hihi);
	}
}

?>