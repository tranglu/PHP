<?php 

include_once("database.php");

$conn = mysqli_connect($server, $dblogin, $dbpass, $dbname,3308);
if (mysqli_connect_errno()==true) {
	$msg = msqli_connect_error();
	echo "Có lỗi kết nối $msg";

}

mysqli_query($conn, "SET CHARACTER SET utf8");

//cập nhật vị trí người chơi
$id = $_SESSION['LoginId'];

$selectplayer = "select * from nguoichoi where id=$id limit 1;";
$player = mysqli_fetch_array(mysqli_query($conn,$selectplayer),MYSQLI_ASSOC);


$toadoxCu = $player['toadox'];//tọa độ cũ và limit phục vụ cho form validation bên dưới
$toadoyCu = $player['toadoy'];

$limitup = 10-$toadoyCu;
$limitdown = -($toadoyCu-1);
$limitleft = 10-$toadoxCu;
$limitright = -($toadoxCu-1);

if ((isset($_GET['moveLeftRight']))&&(isset($_GET['moveUpDow']))) {

	$toadox = $player['toadox'] + $_GET['moveLeftRight'];
	if ($toadox>10) {
		$toadox = 10;
	}
	if ($toadox<1) {
		$toadox = 1;
	}

	$toadoy = $player['toadoy'] + $_GET['moveUpDow'];
	if ($toadoy>10) {
		$toadoy = 10;
	}
	if ($toadoy<1) {
		$toadoy = 1;
	}

	$sqlUpdateToaDo = "UPDATE `nguoichoi` SET `toadox` = '$toadox', `toadoy` = '$toadoy' WHERE `nguoichoi`.`id` = $id;";
	$player = mysqli_query($conn,$sqlUpdateToaDo);	
}//cập nhật vị trí xong

//Kiểm tra và cập nhật bắt pokemon

$selectplayer = "select * from nguoichoi where id=$id limit 1;";
$player = mysqli_fetch_array(mysqli_query($conn,$selectplayer),MYSQLI_ASSOC);//lấy thông tin hiện tại của người chơi

$sql = "select * from pokemon;";

$data = mysqli_query($conn,$sql);

$pokemon = array();
while ($dongDuLieu = mysqli_fetch_array($data,MYSQLI_ASSOC)) {	
	$pokemon[]= $dongDuLieu;
}

foreach ($pokemon as $pk) {
	if ($pk['toadox']==$player['toadox']&&$pk['toadoy']==$player['toadoy']) {
		$time = date("Y-m-d H:i:s");
		$playerid = $player['id'];
		$playersoluongbat = $player['soluongbat']+1;
		$pkid = $pk['id'];

		$sqlbat = "INSERT INTO `dsbat`(`manguoichoi`, `mapokemon`, `ngaybat`) VALUES ($playerid,$pkid,'$time');";
		mysqli_query($conn,$sqlbat);
		$sqlsoluongbat = "UPDATE `nguoichoi` SET `soluongbat` = $playersoluongbat WHERE `nguoichoi`.`id` = $playerid";
		mysqli_query($conn,$sqlsoluongbat);
	}
}//cập nhật xong danh sách bắt



//lấy thông tin người chơi để chuẩn bị hiển thị trên bản đồ; pokemon đã lấy thông tin bên trên
$sql = "select * from nguoichoi;";

$data = mysqli_query($conn,$sql);

$players = array();
while ($dongDuLieu = mysqli_fetch_array($data,MYSQLI_ASSOC)) {
	$id = $dongDuLieu['id'];
	$ngaychoi = $dongDuLieu['ngaychoi'];
	$soluongbat = $dongDuLieu['soluongbat'];
	$toadox = $dongDuLieu['toadox'];
	$taodoy = $dongDuLieu['toadoy'];	
	$players[]= $dongDuLieu;
}

//Vẽ bản đồ
//Thay vì dùng echo thì dùng nối chuỗi sẽ được đoan html;
$map = "</br>";

$map .= "<table style='width:auto; margin: 0px auto;'>";

for ($i=1; $i < 11; $i++) { 
	$map .= "<tr>";

	for ($j=1; $j < 11; $j++) { 
		$map .= "<th style='width: 50px !important; height: 50px !important; overload: hidden; text-align: center; 
    vertical-align: middle;'>";

			foreach ($pokemon as $pk) {
				$urlhinh = $pk['urlhinh'];
				//dong if quy định gốc tọa độ dưới cùng bên trái
				if ($pk['toadoy']== (11-$i) && $pk['toadox']== $j) {
					$map .= "<img style='width: 24px; height: 24px; z-index: 0;' src='$urlhinh'>";
				}
			}

			foreach ($players as $pl) {
				$randomImg = (int)$pl['id'] % 7 + 1;
				
				$urlhinh = 'player/player'.$randomImg.'.png';

				//dong if quy định gốc tọa độ dưới cùng bên trái
				if ($pl['toadoy']== (11-$i) && $pl['toadox']== $j) {
					$map .= "<img style='width: 24px; height: 24px; z-index: 0;' src='$urlhinh'>";
					//echo 'player '.$pl['id'];
				}
			}

		$map .= "</th>";
	}

	$map .= "</tr>";
}

$map .= "</table>";

//form di chuyển
$map .= "
<form action='index.php' method='get' style='text-align: center;'>
	<div>Nhập số bước cần di chuyển: </div>
	<input type='hidden' name='fn' value='play'>
	<fieldset class='form-group' style='border: 0; padding: 0; display: ;'>
		<label for='moveUpDow' style='color: black; font-size: inherit;'>(+) lên trên (-) xuống dưới</label>
		<input type='number' class='form-control' id='moveUpDow' name='moveUpDow' min='$limitdown' max='$limitup' value='0' style='border: 0; margin: 0; width: auto;'>
		<span> bước</span>
	</fieldset>
	<fieldset class='form-group' style='border: 0; padding: 0; display: ;'>
		<label for='moveLeftRight' style='color: black; font-size: inherit;'>(+) sang phải (-) sang trái</label>
		<input type='number' class='form-control' id='moveLeftRight' name='moveLeftRight' min='$limitright' max='$limitleft' value='0' style='border: 0; margin: 0; width: auto;'>
		<span> bước</span>
	</fieldset>	
	<input type='submit' value='Di chuyển'>
</form>
";

mysqli_close($conn);


?>