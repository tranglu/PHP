<?php 
include_once("../config/database.php");

if(isset($_POST["bookID"])==false){
	header("location:../index.php");
}
$bookID=$_POST["bookID"];
/*$bookTS=$_POST["bookTS"];
$bookGB=$_POST["bookGB"];
$bookSL=$_POST["bookSL"];
$bookTL=$_POST["bookTL"];
$bookURL=$_POST["bookURL"];*/
/*var_dump($bookID);
var_dump($_POST);*/
#kết nối SQL
$ketnoi=mysqli_connect($server,$dblogin,$dbpass,$dbname,3308);
if (mysqli_connect_errno()==true) {
  $msg=mysqli_connect_error();
  echo "lỗi kết nối";
  exit();
}
#update thông tin sách
$sachUpdate="DELETE FROM sach 
    		where IDS=$bookID;";
    		/*var_dump($sachUpdate);
    		die;*/
$datasach=mysqli_query($ketnoi,$sachUpdate);
 mysqli_close($ketnoi);
 ?>
<?php 
header("location:../index.php");
 ?>
