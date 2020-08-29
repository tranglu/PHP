<?php
session_start();

include_once('database.php');

$conn = mysqli_connect($server, $dblogin, $dbpass, $dbname,3308);
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
	echo "<hr>";
	echo __METHOD__.'</br>';
	echo "<pre>";
	var_dump($_SESSION['LoginId']);
	echo "</pre>";
	echo "<hr>";
	die;
}

$sql = "select * from pokemon;";
$data = mysqli_query($conn,$sql);

while ($pokemon = mysqli_fetch_array($data,MYSQLI_ASSOC)) {

	$toadox = $pokemon['toadox'] + rand(-1,1);
	$toadoy = $pokemon['toadoy'] + rand(-1,1);

	if ($toadox>10 ||$toadox<1) {
		$toadox = $pokemon['toadox'];
	}

	if ($toadoy>10 ||$toadoy<1) {
		$toadoy = $pokemon['toadoy'];
	}


	$id = $pokemon['id'];

	$sqlupdate = "UPDATE `pokemon` SET `toadox` = '$toadox', `toadoy` = '$toadoy' WHERE `pokemon`.`id` = $id;";
	$run = mysqli_query($conn,$sqlupdate);

}

mysqli_close($conn);

//Khởi tạo mặc định cho các vùng trong layer
$menu = "";
$StuInfo = "";
$left = "";
$right = "";

if (isset($_GET['fn'])==false) {
	$fn='home';
} else{
		$fn=$_GET['fn'];
}

include_once('noidung/chung/menu.php');
$menu = $temp;

include_once('noidung/chung/StuInfo.php');
$StuInfo = $temp;

switch ($fn) {
	case 'play':		

		include('noidung/rieng/right.php');
		$right = $map;

		include('noidung/rieng/left.php');
		$left = $temp;	

		$webcontent = file_get_contents('Layout.tpl');		
		$webcontent = str_replace('!!menu!!',$menu,$webcontent);
		$webcontent = str_replace('!!StuInfo!!',$StuInfo,$webcontent);
		$webcontent = str_replace('!!left!!',$left,$webcontent);
		$webcontent = str_replace('!!right!!',$right,$webcontent);
		print($webcontent);	
		break;
	
	default:
		include('noidung/rieng/left.php');
		$left = $temp;			

		//include('noidung/rieng/right.php');
		$right = "<h1>Click chọn \"1888164-PLAY\" trên thanh menu để bắt đầu chơi.";

		$webcontent = file_get_contents('Layout.tpl');		
		$webcontent = str_replace('!!menu!!',$menu,$webcontent);
		$webcontent = str_replace('!!StuInfo!!',$StuInfo,$webcontent);
		$webcontent = str_replace('!!left!!',$left,$webcontent);
		$webcontent = str_replace('!!right!!',$right,$webcontent);
		print($webcontent);		

		break;	
}
