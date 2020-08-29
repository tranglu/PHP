<?php 
#nhận dữ liệu cũ nếu có
if(isset ($_GET["oldkeyword"])==true){
	$oldkw=$_GET["oldkeyword"];
}
else{
	$oldkw="Hãy nhập từ khóa";
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<a href="..\..\index.html">Home</a>
	<h1>Truyền dữ liệu</h1>
	<form action="xuly.php" method="GET">
		<input type="hidden" value="123" name="masp">
		Nhập vào giá trị tìm kiếm:<input type="text" name="keyword" value="<?php echo $oldkw; ?>">
		<input type="submit" value="Search">
	</form>
</body>
</html>