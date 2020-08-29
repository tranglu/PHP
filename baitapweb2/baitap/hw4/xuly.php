<?php 
#kiểm tra việc truyền nhận dữ liệu
	if(isset($_GET["tensanpham"])==true){
		#Nhận dữ liệu
		$kw=$_GET["tensanpham"];
	}
	else{
		$kw="";
	}
	
 ?>
 <?php 
function xuat1SP($tensp,$url,$mota,$gia){
  $html="
        <div class='column1'>
        <h3>$tensp</h3>
        <img src='../../images/$url' alt='' />
        <div class='columnText'>$mota</div>
        <div class='columnLink'>USD $gia <span class='order'>| <a href='xuly.php?tensanpham=$tensp''>xem chi tiết</a></span> </div>
      </div>";
      echo $html;
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="index.php">Quay về trang chủ</a>
<?php 
      #khai báo mang chua du lieu
      include("data.php");

       foreach ($arrSP as $arr)
         
      {
      	if($arr["tensp"]==$kw){
      		 xuat1SP($arr["tensp"],$arr["url"],$arr["mota"],$arr["gia"]);
      		};
       
      };
      ?>
       <div class="clear"></div>
</body>
</html>