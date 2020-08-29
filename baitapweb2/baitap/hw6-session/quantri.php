<?php
session_start();
if(isset($_SESSION ["Logined"])==false||$_SESSION ["Logined"]==false)
{#echo "Bạn chưa login";
header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Trang quản trị</h1>
	<div>
		<a href="index.php">Trang chủ</a>
		<a href="quantri.php">Quản trị</a>

	</div>
</body>
</html>