<?php 

include_once("config/database.php");
//session_start();

 ?>

 <?php 
#lấy dữ liệu người chơi từ BD
#kết nối vào csdl
$ketnoi=mysqli_connect($server,$dblogin,$dbpass,$dbname,3308);
if (mysqli_connect_errno()==true) {
	$msg=mysqli_connect_error();
	echo "lỗi kết nối";
	exit();
}
$id=$_SESSION['LoginId'];
#viết câu lệnh sql lấy dữ liệu
$sql="select* from nguoichoi where Id='$id'";

#thực hiện câu lệnh sql qua php
$data=mysqli_query($ketnoi,$sql);

$htmlDMNC="";
while($dongDL=mysqli_fetch_array($data,MYSQLI_ASSOC))
{
	$id=$dongDL["Id"] ;
	$NgayChoi=$dongDL["NgayChoi"];
	$soluongbat=$dongDL["SoLuongBat"];
	$ToaDoX=$dongDL["ToaDoX"];
	$ToaDoY=$dongDL["ToaDoY"];
	$htmlDMNC.="
	<div>
	Người chơi: $id, <br> ngày chơi: $NgayChoi, <br> số lượng bắt: $soluongbat,<br> tọa độ:($ToaDoX,$ToaDoY)
	</div>";
}

mysqli_close($ketnoi);

  ?> <!-- xong phần sách -->
<?php 
$noidung="
<div class='container'>
	<div class='row'>
		
			<H2>NGƯỜI CHƠI HIỆN TẠI:</H2>
			<div class='container'>
				<div class='row'>
					$htmlDMNC;				
						 	
					
				</div>
			</div>
		</div>
</div>

		";
 ?>