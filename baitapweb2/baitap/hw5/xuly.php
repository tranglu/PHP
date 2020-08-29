<?php 
include_once("config/database.php");
 ?>

<?php 
#lấy dữ liệu sách theo thể loại
if(isset ($_GET["masp"])==true){
  $ids=$_GET["masp"];
}
else{
  $ids="*";
}
# lấy sách từ SQL
  $ketnoi=mysqli_connect($server,$dblogin,$dbpass,$dbname,3308);
if (mysqli_connect_errno()==true) {
  $msg=mysqli_connect_error();
  echo "lỗi kết nối";
  exit();
}
$sach1="select* from sach
    where IDS='$ids'";
$datasach=mysqli_query($ketnoi,$sach1);
$htmlDMS="";
while($dongDL1=mysqli_fetch_array($datasach,MYSQLI_ASSOC))
{
  $ids=$dongDL1["IDS"];
  $tenS=$dongDL1["TenSach"];
  $linkhinh=$dongDL1["URLHinh"];
  $hinhsach="<img class='w-100 h-100'src='$linkhinh'>";
  $giaban="Giá: ".$dongDL1["GiaBan"];
  $soluongton="Số lượng tồn: ".$dongDL1["SoLuong"];
  $htmlDMS.="
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
 ?> <!-- xong phần sách -->
<?php 
#lấy dữ liệu sách theo thể loại
if(isset ($_GET["masp"])==true){
  $ids=$_GET["masp"];
}
else{
  $ids="*";
}
$sach1="SELECT * FROM binhluan LEFT JOIN thongtinnguoidung ON binhluan.CuaUser = thongtinnguoidung.Username
    where thuocsach='$ids'
    ";
$datasach=mysqli_query($ketnoi,$sach1);
$htmlDMBL="";
while($dongDL1=mysqli_fetch_array($datasach,MYSQLI_ASSOC))
{
  $ids=$dongDL1["ID"];
  $loibl=$dongDL1["LoiBL"];
  $ngayBL=$dongDL1["NgayBL"];
  $user=$dongDL1["CuaUser"];
   $user1=$dongDL1["TenND"];
  $url="<a href='xulyuser.php?userid=$user'>$user1</a>";
  $htmlDMBL.="
  <p>$url $ngayBL </p>
  <i>$loibl </i>
  ";
}
 mysqli_close($ketnoi);
  ?> <!-- xong phần bình luận-->
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <script type="text/javascript" src="../../vendor/js/bootstrap.js"></script>
  <link rel="stylesheet" href="../../vendor/css/bootstrap.css">
</head>
<body>
	<a href="index.php">Quay về trang chủ</a>
    <div class="container">
        <div class="row">
          <?php 
        echo"$htmlDMS";
        echo "$htmlDMBL";
       ?>
        </div>
    </div>
</body>
</html>