<?php 

$temp = "<h3>MSSV: 1888164</h3>
<h3>Họ tên: PHẠM VĂN LAM SƠN</h3>";

// session_start();

include_once('config/database.php');

$conn = mysqli_connect($server, $login, $pass, $dbname);
if (mysqli_connect_errno()==true) {
	$msg = msqli_connect_error();
	echo "Có lỗi kết nối $msg";
}

mysqli_query($conn, "SET CHARACTER SET utf8");

//có thể bỏ if để thêm nhanh 1 người chơi
if (isset($_SESSION["Loggedin"]) == false || $_SESSION["Loggedin"] == false) {	
	$_SESSION['Loggedin'] = true;
	
	$x = rand(1,10);
	$y = rand(1,10);
	$time = date("Y-m-d H:i:s");	

	$sql = "INSERT INTO `nguoichoi`(`ngaychoi`,`soluongbat`, `toadox`, `toadoy`) VALUES ('$time', 0,$x,$y)";
	
	$data = mysqli_query($conn,$sql);

	//lấy id để cập nhật database khi chơi game
	$_SESSION['LoginId'] = mysqli_insert_id($conn);
}

$sql = "select * from hinhghep;";
$data = mysqli_query($conn,$sql);

$dshinh = array();
while ($hinh = mysqli_fetch_array($data,MYSQLI_ASSOC)) {
	$dshinh[] = $hinh;
}

foreach ($dshinh as $hinh) {
	$name = $hinh['tenhinhghep'];
	$url = $hinh['url'];
}

mysqli_close($conn);

?>