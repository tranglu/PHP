<?php 
include_once("config/database.php");
 ?>

<?php 
#lấy dữ liệu sách theo thể loại
if(isset ($_GET["userid"])==true){
  $id=$_GET["userid"];
}
else{
  $id="*";
}
# lấy sách từ SQL
  $ketnoi=mysqli_connect($server,$dblogin,$dbpass,$dbname,3308);
if (mysqli_connect_errno()==true) {
  $msg=mysqli_connect_error();
  echo "lỗi kết nối";
  exit();
}
$user="select* from thongtinnguoidung
    where Username='$id'";
$datasach=mysqli_query($ketnoi,$user);
$htmlDMS="";
while($dongDL1=mysqli_fetch_array($datasach,MYSQLI_ASSOC))
{
  $ids=$dongDL1["Username"];
  $tenS=$dongDL1["TenND"];
  $linkhinh=$dongDL1["URLAvatar"];
  $hinhsach="<img class='w-100 h-100'src='$linkhinh'>";
  $htmlDMS.="
  
  <div class='container'>
  <div class='row my-2'>
  <div class='col-6'>
  $hinhsach<br> 
  </div>
  <div class='col-6'>
  <h1 class='text-center'>$tenS<br></h1>
   </div>
    </div>
  </div>";
}
 mysqli_close($ketnoi);
  ?> <!-- xong phần sách -->

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
       ?>
        </div>
    </div>
</body>
</html>