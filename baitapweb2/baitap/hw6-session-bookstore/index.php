<?php 
include_once("config/database.php");
 ?>
<?php 
session_start();
if(isset($_SESSION ["Logined"])==false){
	$_SESSION ["Logined"]=false;
	$_SESSION ["LoginName"]="";
}
if(isset($_SESSION ["Logined"])==true){#login thành công
	$isLogin=$_SESSION ["Logined"];
	$name=$_SESSION ["LoginName"];
}
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
$htmlDM="";
while($dongDL=mysqli_fetch_array($data,MYSQLI_ASSOC))
{
	$id=$dongDL["ID"];
	$tenTL=$dongDL["TenTL"];
	$url="<a href='index.php?tl=$id'>$tenTL</a>";
	$htmlDM.="$url<br>";
}
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
	<div class='col-4 my-3'>
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
	$ids=$dongDL1["IDS"];
	$tenS=$dongDL1["TenSach"];
	$linkhinh=$dongDL1["URLHinh"];
	$TL=$dongDL1["TL"];
	$hinhsach="<img src='$linkhinh'>";
	$giaban="Giá: ".$dongDL1["GiaBan"];
	$soluongton="Số lượng tồn: ".$dongDL1["SoLuong"];
	$htmlDMS.="
	
	<div class='col-4 my-3'>
	$hinhsach<br> <h3>$tenS<br></h3> $giaban đ <br> $soluongton quyển<br>
	<a href='xuly.php?masp=$ids''>xem chi tiết</a></span><br> 
	<a href='hieuchinh.php?masp=$ids&tl=$TL''>Chỉnh sửa</a></span> 
	</div>
	";
}
}
# lấy sách từ SQL
	/*$ketnoi=mysqli_connect($server,$dblogin,$dbpass,$dbname,3308);
if (mysqli_connect_errno()==true) {
	$msg=mysqli_connect_error();
	echo "lỗi kết nối";
	exit();
}*/


  ?> <!-- xong phần sách -->

<?php 
#lấy dữ liệu sách theo thể loại
if(isset($_GET["ten"])==true){
		#Nhận dữ liệu
	$kw=$_GET["ten"];
# lấy sách từ SQL
/*$sach1="select* from sach
		where TenSach='$kw'";*/
    $sach1="select* from sach
    where UPPER(TenSach) like UPPER('%$kw%')";
$datasach=mysqli_query($ketnoi,$sach1);
$htmlDMStimkiem="";
while($dongDL1=mysqli_fetch_array($datasach,MYSQLI_ASSOC))
{
  $ids=$dongDL1["IDS"];
  $tenS=$dongDL1["TenSach"];
  $linkhinh=$dongDL1["URLHinh"];
  $hinhsach="<img class='w-100 h-100'src='$linkhinh'>";
  $giaban="Giá: ".$dongDL1["GiaBan"];
  $soluongton="Số lượng tồn: ".$dongDL1["SoLuong"];
  $htmlDMStimkiem.="
  <h1 class='text-center'>$tenS<br></h1>
  <div class='container'>
  <div class='row my-2'>
  <div class='col-6'>
  $hinhsach<br> 
  </div>
  <div class='col-6'>
  $giaban đ <br> $soluongton quyển<br>
   </div>
    </div>
  </div>";
}
 mysqli_close($ketnoi);
}
  ?> <!-- xong phần tìm sách -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	
	<link rel="stylesheet" href="../../vendor/css/bootstrap.css">	
	<script type="text/javascript" src="../../vendor/js/bootstrap.js"></script>
</head>
<body>
<h1 class="text-center bg-info my-5">CHÀO MỪNG ĐẾN VỚI NHÀ SÁCH</h1>
	<?php 
		if($isLogin==true){
			echo "<h3>Chào bạn $name </h3> <br>";
			echo"<a href='logout.php'>Logout</a>";
		

	 }
	 else {
	?>
	<form action="xllogin.php" method="POST">
		Tên login:
		<input type="text" name="txtTenLogin">
		Mật Khẩu:
		<input type="text" name="txtPassword">
		<input type="submit" value="Đăng nhập"/>
	</form>
	<?php 
	}
	?>
		<div class="container my-5">
	 		<BUTTON class="btn-group-lg btn-warning"><a href="Admin/addbook.php">THÊM SÁCH MỚI</a></BUTTON>
				<div class="row">
					<div class="col-4">

					<h2>DANH MỤC ĐẦU SÁCH</h2>

					<?php 
						echo"$htmlDM";
					 ?>
					</div>
					<div class="col-8">
						<div class="timkiem">
							<form action="index.php" method="GET">
							Nhập tên sản phẩm cần tìm:<input type="text" name="ten">
							</form>
						</div>
					<H2>CÁC CUỐN SÁCH TƯƠNG ỨNG:</H2>
					<div class="container">
						<div class="row">
						<?php 
						 	if(isset($_GET["ten"])==true){
						 	echo"$htmlDMStimkiem";
						 	} 
						 	else
						 	{
								echo"$htmlDMS";				
						 	}
					 	?>
						</div>
					</div>
					</div>
				</div>

		</div>
		}
</body>
</html>