<?php 
include_once("config/database.php");
 ?>

 <?php 
#lấy dữ liệu thể loại sách từ BD
#kết nối vào csdl
// $ketnoi = new mysqli($server,$dblogin,$dbpass,$dbname,3308);
$ketnoi=mysqli_connect($server,$dblogin,$dbpass,$dbname,3308);
if (mysqli_connect_errno()==true) {
	$msg=mysqli_connect_error();
	echo "lỗi kết nối";
	exit();
}
#viết câu lệnh sql lấy dữ liệu
$sql="select* from theloaisach order by TenTL";

#thực hiện câu lệnh sql qua php
$data=mysqli_query($ketnoi,$sql);

#nhận và xử lý dữ liệu nếu có

#ngắt kết nối
/*mysqli_close($ketnoi);*/
  ?> <!-- xong phần thể loại sách -->
<!-- phần sách -->
<?php 
#lấy dữ liệu sách theo thể loại
if(isset ($_GET["tl"])==true){
	$tl=$_GET["tl"];
	$sach1="select* from sach
		where TL='$tl'";
$datasach=mysqli_query($ketnoi,$sach1);
$htmlDMS="";
while($dongDL1=mysqli_fetch_array($datasach,MYSQLI_ASSOC))
{
	$ids=$dongDL1["IDS"];
	$tenS=$dongDL1["TenSach"];
	$linkhinh=$dongDL1["URLHinh"];
	$TL=$dongDL1["TL"];
	$hinhsach="<img src='$linkhinh'>";
	$giaban="Giá: ".$dongDL1["GiaBan"];
	$soluongton="Số lượng tồn: ".$dongDL1["SoLuong"];
	$htmlDMS.="
	<div class='col-sm-4 my-3'>
	$hinhsach<br> <h3>$tenS<br></h3> $giaban đ <br> $soluongton quyển<br>
	<a href='xuly.php?masp=$ids''>xem chi tiết</a></span> <br>
	<a href='hieuchinh.php?masp=$ids&tl=$TL''>Hiệu chỉnh</a></span> 
	</div>";
}
}
else{
	$sach1="select* from sach order by TenSach";
$datasach=mysqli_query($ketnoi,$sach1);
$htmlDMS="
				";
while($dongDL1=mysqli_fetch_array($datasach,MYSQLI_ASSOC))
{
	echo "<pre>";
		var_dump($dongDL1);
		echo "</pre>";
# lấy sách từ SQL
	$ids=$dongDL1["IDS"];
	$tenS=$dongDL1["TenSach"];
	$linkhinh=$dongDL1["URLHinh"];
	$TL=$dongDL1["TL"];
	$hinhsach="<img src='$linkhinh'>";
	$giaban="Giá: ".$dongDL1["GiaBan"];
	$soluongton="Số lượng tồn: ".$dongDL1["SoLuong"];
	$htmlDMS.="
	<div class='col-sm-3 my-3'>
	$hinhsach<br> <h3>$tenS<br></h3> $giaban đ <br> $soluongton quyển<br>
	</div>
	";
}
}
		
	/*$ketnoi=mysqli_connect($server,$dblogin,$dbpass,$dbname,3308);
if (mysqli_connect_errno()==true) {
	$msg=mysqli_connect_error();
	echo "lỗi kết nối";
	exit();
}*/
mysqli_close($ketnoi);

  ?> <!-- xong phần sách -->
<?php 
$noidung="
	<div class='row'>
		
			<H2>CÁC CUỐN SÁCH TƯƠNG ỨNG:</H2>
			<div class='container'>
				<div class='row'>
					<?php 
						 	
					echo'$htmlDMS';				
						 	
					?>
				</div>
			</div>
		</div>


		";
 ?>