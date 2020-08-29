<?php 
#kiểm tra việc truyền nhận dữ liệu
	if(isset($_GET["keyword"])==true){
		#Nhận dữ liệu
		$kw=$_GET["keyword"];
		$maso=$_GET["masp"];
		$backlinkURL="index.php?oldkeyword=$kw";
	}
	else{
		$kw="";
		$maso="";
		$backlinkURL="index.php";
	}
	
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="<?php echo $backlinkURL?>">Home</a>
<h1>Nhận và xử lý dữ liệu</h1>

 Từ khóa tìm kiếm:
 <?php 
 echo "Từ khóa tìm kiếm:$kw - Mã số SP: $maso";
  ?>
  <hr>
  Kết quả tìm kiếm:
</body>
</html>