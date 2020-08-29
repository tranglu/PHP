<?php 
#lấy dữ liệu sách theo thể loại
if(isset($_GET["ten"])==true){
		#Nhận dữ liệu
	$kw=$_GET["ten"];
# lấy sách từ SQL
  $ketnoi=mysqli_connect($server,$dblogin,$dbpass,$dbname,3308);
if (mysqli_connect_errno()==true) {
  $msg=mysqli_connect_error();
  echo "lỗi kết nối";
  exit();
}
$sach1="select* from sach
    where IDS='$kw'";
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
  ?> <!-- xong phần tìm sách -->