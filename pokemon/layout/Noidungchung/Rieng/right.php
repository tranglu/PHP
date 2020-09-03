<?php 
include_once("config/database.php");

if(defined("key")==false) header("location:../../index.php");
$ketnoi=mysqli_connect($server,$dblogin,$dbpass,$dbname,3308);
if (mysqli_connect_errno()==true) {
	$msg=mysqli_connect_error();
	echo "lỗi kết nối";
	exit();
}
#pokemon
	$sqlpoke="select* from pokemon";
	$datapoke=mysqli_query($ketnoi,$sqlpoke);
	$dspoke=array();
	while ($pokemon = mysqli_fetch_array($datapoke,MYSQLI_ASSOC)) {
	$toadox = $pokemon['ToaDoX'];
	$toadoy = $pokemon['ToaDoY'];
	$url=$pokemon['URLHinh'];
	array_push($dspoke,$pokemon);
	}
	#người chơi
	$id=$_SESSION['LoginId'];


	# cập nhật vị trí
	if ($_POST){		
		$sql="select* from nguoichoi where Id='$id'";
		$data=mysqli_query($ketnoi,$sql);
		$playercu=mysqli_fetch_array($data,MYSQLI_ASSOC);
		$x=$playercu['ToaDoX']+$_POST['toadox'];
		$y=$playercu['ToaDoY']+$_POST['toadoy'];
		if($x<1||$x>11){
			$toadoxmoi=$playercu['ToaDoX'];
		}
		else{
			$toadoxmoi=$x;
		}
		if($y<1||$y>11){
			$toadoymoi=$playercu['ToaDoY'];
		}
		else{
			$toadoymoi=$y;
		}
		$sqlupdate = "UPDATE `nguoichoi` SET `ToaDoX` = '$toadoxmoi', `ToaDoY` = '$toadoymoi' WHERE `nguoichoi`.`Id` = $id;";
		$run = mysqli_query($ketnoi,$sqlupdate);
	
		$sql="select* from nguoichoi where Id='$id'";
		$data=mysqli_query($ketnoi,$sql);
		$player=mysqli_fetch_array($data,MYSQLI_ASSOC);

	#bắt pokemon
	 	foreach($_SESSION["dspokemon"] as $key=>$value){
		if($player['ToaDoX']==$_SESSION["dspokemon"][$key]['ToaDoX']&&$player['ToaDoY']==$_SESSION["dspokemon"][$key]['ToaDoY']){
			$IDplayer=$player['Id'];
			$soluong=$player['SoLuongBat']+1;
			$IDpoke=$_SESSION["dspokemon"][$key]['Id'];
			date_default_timezone_set("Asia/Ho_Chi_Minh");	
			$time= date("Y-m-d h:i:sa");
			$sqldsbat="INSERT INTO `dsbat`(`MaNguoiChoi`, `MaPokemon`, `NgayBat`) VALUES ('$IDplayer','$IDpoke','$time')";
			$sqlupdatesoluong = "UPDATE `nguoichoi` SET `SoLuongBat` = '$soluong'WHERE `nguoichoi`.`Id` = $id;";
					$a=$key;
				unset($_SESSION["dspokemon"][$a]);
			$data=mysqli_query($ketnoi,$sqldsbat);
			$data=mysqli_query($ketnoi,$sqlupdatesoluong);
		}
	};
}
else{
		
	$_SESSION["dspokemon"]=$dspoke;
	$sql="select* from nguoichoi where Id='$id'";
	$data=mysqli_query($ketnoi,$sql);
	$player=mysqli_fetch_array($data,MYSQLI_ASSOC);
		
};
	# giao diện
$noidung="
 <table class='my-5'style='width:100%;border: 1px solid black;'>";
 for ($i=1;$i<11;$i++){
 	$noidung.= "<tr>";
 	for($j=1;$j<11;$j++){
 		 $noidung.="<td>";
 		 foreach($_SESSION["dspokemon"] as $poke){
 		 	$urlpoke=$poke['URLHinh'];
	 		 if($poke['ToaDoX']==$j&& $poke['ToaDoY']==$i){
	 		 	$noidung .= "<img class='poke' src='$urlpoke'>";
	 		 }
 		 }
 		 if($player['ToaDoX']==$j&& $player['ToaDoY']==$i){
	 		 	$noidung .= "<img src='layout/player/player1.png' style='width: 50px !important; height: 50px !important; z-index: 1;overload:hidden !important'>";
	 		 }
 		  $noidung .= "</td>";
 	}

	$noidung .= "</tr>";
}

$noidung .= "</table>";
$noidung .="<div>
			<form active='game.php' method='POST'>
					<h3>	Nhập số bước di chuyển:</h3>
					<h4>trái(-) phải(+)</h4><input type='number'  max=9 min=-9 class='form-control' name='toadox'>
					<h4>trên (-) dưới (+)</h4><input type='number'  max=9 min=-9 class='form-control' name='toadoy'>
					<button type='submit' class='form-control btn btn-success'>di chuyển</button>

				 </div>";
 mysqli_close($ketnoi);
  ?>