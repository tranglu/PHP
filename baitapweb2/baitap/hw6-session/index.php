<?php 
session_start();
if(isset($_SESSION ["Logined"])==false){
	$_SESSION ["Logined"]=false;
	$_SESSION ["LoginName"]="";
}
if(isset($_SESSION ["Logined"])==true){#login thành công
	$isLogin=$_SESSION ["Logined"];
	$name=$_SESSION ["LoginName"];
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Trang chủ</h1>
	<div>
		<a href="index.php">Trang chủ</a>
		<a href="quantri.php">Quản trị</a>
	</div>
	<?php 
		if($isLogin==true){
			echo "<h3>Chào bạn $name </h3> <br>";
			echo"<a href='logout.php'>Logout</a>";
		}
	 
	 else {
	?>
	<form action="xllogin.php" method="POST">
		Tên login:
		<input type="text" name="txtTenLogin">
		<input type="submit" value="Đăng nhập"/>
		
	</form>
	<?php 
	}
	?>
</body>
</html>