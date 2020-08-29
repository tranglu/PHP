<?php 
include_once("config/database.php");
 ?>

<?php 
#lấy dữ liệu sách theo thể loại
if(isset ($_GET["masp"])==true){
  $ids=$_GET["masp"];
}
else{
  header("location:index.php");
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
  $TL=$dongDL1["TL"];
  $hinhsach="<img class='w-100 h-100'src='$linkhinh'>";
  $giaban=$dongDL1["GiaBan"];
  $soluongton=$dongDL1["SoLuong"];
}
 
  ?> <!-- xong phần sach-->
  <?php 
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
 
$checked=($id===$TL)?("selected"):("");

  $htmlTL.="<option $checked value='$id'>$tenTL</option>";
}
mysqli_close($ketnoi);
   ?> <!-- danh muc the loai sach -->
   <?php 
$backURL="index.php?tl=$TL";
 ?>
<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript" src="../../vendor/js/bootstrap.js"></script>
  <link rel="stylesheet" href="../../vendor/css/bootstrap.css">
</head>
<body>
	<button class="btn-lg btn-link m-2"><a href="index.php">Quay về trang chủ</a> </button>

    <div class="container">
      <h1 class="display-block text-center bg-success text-white py-3">CHỈNH SỬA THÔNG TIN SÁCH</h1>
         <form action="Admin/bookeditsave.php" method="POST"> 
          
            <input type="hidden" name="bookID" value="<?php echo $ids?>">
            <div class="row">
            <div class="col-3">Tên Sách:</div>
                   <div class="col-9"><input class="form-control" type="text" name="bookTS" value="<?php echo $tenS?>"></div>
            <div class="col-3">Giá bán:</div>
            <div class="col-9">
              <input class="form-control" type="text" name="bookGB" value="<?php echo $giaban?>"></div>
            <div class="col-3">Số lượng:</div>
                 <div class="col-9"> <input type="text"  class="form-control" name="bookSL" value="<?php echo $soluongton?>"></div>
            <div class="col-3">Thể loại:</div>
                 <!-- <div class="col-9"> <input class="form-control" type="text" name="bookTL"value="<?php echo $TL?>"></div> -->
                 <div class="col-9"><select class="form-control" name="bookTL"><?php echo $htmlTL?></select></div>
            <div class="col-3">Hình ảnh:</div>
                  <div class="col-9"><input class="form-control" type="text" name="bookURL" value="<?php echo $linkhinh?>"></div>
            </div>
            <p>
              <input type="submit" class="btn-lg display-5" value="Lưu"> - <button class="btn-lg display-5"><a href="<?php echo $backURL ?>">HỦY</a></button>
            </p>
          </form>
          <form action="" method="POST" id="delete">
                <input type="hidden" name="bookID" value="<?php echo $ids?>">
              <button type="submit" class="btn-lg btn-danger display-block text-center" onclick="myFunction()">XÓA SÁCH</button>
             <!--  <button onclick="myFunction()">Try it</button> -->
              </form>    
    </div>

<script>
function myFunction() {
  var txt;
  var r = confirm("Press a button!");
  if (r == true) {
    txt = "Admin/deletebook.php";
  } else {
    txt = "#";
  }
  document.getElementById("delete").setAttribute("action", txt);
  console.log(txt);
}
</script>
</body>
</html>