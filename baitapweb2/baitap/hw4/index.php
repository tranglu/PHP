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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Universal</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
 
  <div class="clear"></div>
  <div id="header">
    <div id="logo"></div>
    <div id="menu2">
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
  <a href="..\..\index.html">Home</a>
<div class="timkiem">
	<form action="index.php" method="GET">
		Nhập tên sản phẩm cần tìm:<input type="text" name="ten">
	</form>
</div>
  <div class="clear"></div>
  <div class="welCome">
     <div id="columZone">
     	<?php 
#kiểm tra việc truyền nhận dữ liệu
	if(isset($_GET["ten"])==true){
		#Nhận dữ liệu
		$kw=$_GET["ten"];
		include("data.php");
       foreach ($arrSP as $arr)  
      {
      	if($arr["tensp"]==$kw||$arr["mota"]==$kw||$arr["gia"]==$kw){
      		 xuat1SP($arr["tensp"],$arr["url"],$arr["mota"],$arr["gia"]);
      		};
      };
	}
	else{
      #khai báo mang chua du lieu
      include("data.php");
       foreach ($arrSP as $arr)     
      {
        xuat1SP($arr["tensp"],$arr["url"],$arr["mota"],$arr["gia"]);
      };
	}	
 ?>
      <!-- <?php 
      #khai báo mang chua du lieu
      include("data.php");
       foreach ($arrSP as $arr)     
      {
        xuat1SP($arr["tensp"],$arr["url"],$arr["mota"],$arr["gia"]);
      };
      ?>-->
       <div class="clear"></div>
      } 
    </div> 
  </div>
</body>
</html>
