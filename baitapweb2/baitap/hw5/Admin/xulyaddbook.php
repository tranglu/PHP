<?php 
include_once("../config/database.php");

// $bookID=$_POST["bookID"];
$bookTS=$_POST["bookTS"];
$bookGB=$_POST["bookGB"];
$bookSL=$_POST["bookSL"];
$bookTL=$_POST["bookTL"];
$bookURL=$_POST["bookURL"];

// var_dump($_POST);

#kết nối SQL
$ketnoi=mysqli_connect($server,$dblogin,$dbpass,$dbname,3308);
if (mysqli_connect_errno()==true) {
  $msg=mysqli_connect_error();
  echo "lỗi kết nối";
  exit();
}
#update thông tin sách
$sachUpdate="INSERT INTO sach(TenSach, URLHinh, GiaBan, SoLuong, TL) VALUES ('$bookTS', '$bookURL', '$bookGB', '$bookSL', '$bookTL')";
    		// var_dump($sachUpdate);
    		// die;
$datasach=mysqli_query($ketnoi,$sachUpdate);
 mysqli_close($ketnoi);
 ?>
<?php 
$backURL="../index.php?tl=$bookTL";
header("location:$backURL");
 ?>