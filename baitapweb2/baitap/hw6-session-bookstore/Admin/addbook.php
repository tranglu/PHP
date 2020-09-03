<?php
session_start();
if(isset($_SESSION ["Logined"])==false||$_SESSION ["Logined"]==false)
{#echo "Bạn chưa login";
header("location:../index.php");
}
?>
<?php 
include_once("../config/database.php");
 ?>

<?php 
#lấy dữ liệu sách theo thể loại
# lấy sách từ SQL
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
$htmlTL="";
while($dongDL=mysqli_fetch_array($data,MYSQLI_ASSOC))
{
  $id=$dongDL["ID"];
  $tenTL=$dongDL["TenTL"];
  $htmlTL.="<option selected value='$id'>$tenTL</option>";
}
mysqli_close($ketnoi);
   ?> <!-- danh muc the loai sach -->
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script type="text/javascript" src="../../../vendor/js/bootstrap.js"></script>
  <link rel="stylesheet" href="../../../vendor/css/bootstrap.css">
</head>
<body>
  <button class="btn-lg btn-link m-2"><a href="index.php">Quay về trang chủ</a> </button>
    <div class="container">
      <h1 class="display-block text-center bg-warning text-white py-3">THÊM SÁCH</h1>
          <form action="xulyaddbook.php" method="POST">
            <!-- <input type="hidden" name="bookID"> -->
            <div class="row">
            <div class="col-3">Tên Sách:</div>
                   <div class="col-9"><input class="form-control" type="text" name="bookTS" ></div>
            <div class="col-3">Giá bán:</div>
            <div class="col-9">
              <input class="form-control" type="text" name="bookGB"></div>
            <div class="col-3">Số lượng:</div>
                 <div class="col-9"> <input type="text"  class="form-control" name="bookSL" ></div>
            <div class="col-3">Thể loại:</div>
                 <!-- <div class="col-9"> <input class="form-control" type="text" name="bookTL"value="<?php echo $TL?>"></div> -->
                 <div class="col-9"><select class="form-control" name="bookTL"><?php echo $htmlTL?></select></div>
            <div class="col-3">Hình ảnh:</div>
                  <div class="col-9"><input class="form-control" type="text" name="bookURL" ></div>
            </div>
            <p>
              <input type="submit" class="btn-lg display-5" value="Lưu"> - <button class="btn-lg display-5"><a href="../index.php">HỦY</a></button>
            </p>
          </form>
        
    </div>
</body>
</html>