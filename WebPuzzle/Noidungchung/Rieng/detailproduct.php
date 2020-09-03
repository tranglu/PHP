<?php 
include_once("config/database.php");
 ?>
 <?php 

#lấy dữ liệu thể loại sách từ BD
#kết nối vào csdl
$ketnoi=mysqli_connect($server,$dblogin,$dbpass,$dbname,3308);
if (mysqli_connect_errno()==true) {
	$msg=mysqli_connect_error();
	echo "lỗi kết nối";
	exit();
}
#viết câu lệnh sql lấy dữ liệu
$sql="select* from hinhghep";

#thực hiện câu lệnh sql qua php
$data=mysqli_query($ketnoi,$sql);

$htmlDMH="
				";
while($dongDL1=mysqli_fetch_array($data,MYSQLI_ASSOC))
{

	$idh=$dongDL1["PID"];
	$tenhinh=$dongDL1["TenHinhGhep"];
	$linkhinh=$dongDL1["URL"];
	$hinhsach="<img class='img-fluid' src='$linkhinh'>";
	$htmlDMH.="
	<div class='col-sm-3 my-3'>
	$hinhsach<br> <h3>$tenhinh<br>
	<p><a href='game.php?masp=$idh'>GHÉP HÌNH</a><p>
	</div>
	";
}

mysqli_close($ketnoi);

  ?> <!-- xong phần sách -->
<?php 
$noidung="
	<H2>CHỌN HÌNH GHÉP:</H2>
         <div class='row'>		 	
					$htmlDMH;				
						 		
		</div>

		";
 ?>