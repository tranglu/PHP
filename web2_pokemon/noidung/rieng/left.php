<?php 

$temp = "";

include_once("database.php");

$conn = mysqli_connect($server, $dblogin, $dbpass, $dbname,3308);
if (mysqli_connect_errno()==true) {
	$msg = msqli_connect_error();
	echo "Có lỗi kết nối $msg";

}

mysqli_query($conn, "SET CHARACTER SET utf8");

$sql = "select * from nguoichoi ORDER BY ngaychoi DESC;";

$data = mysqli_query($conn,$sql);

$players = "";
while ($dongDuLieu = mysqli_fetch_array($data,MYSQLI_ASSOC)) {
	$id = $dongDuLieu['id'];
	$ngaychoi = $dongDuLieu['ngaychoi'];
	$soluongbat = $dongDuLieu['soluongbat'];
	$toadox = $dongDuLieu['toadox'];
	$toadoy = $dongDuLieu['toadoy'];
	$players .= "<div>
				    <p>Người chơi thứ: $id, ngày chơi: $ngaychoi, bắt được $soluongbat pokemon, tọa độ hiện tại là: [$toadox, $toadoy] </p>
				  </div>";

}

mysqli_close($conn);

$temp = $players;
// echo "<hr>";
// echo "<pre>";
// var_dump($players);
// echo "</pre>";
// echo "<hr>";
// die;

?>