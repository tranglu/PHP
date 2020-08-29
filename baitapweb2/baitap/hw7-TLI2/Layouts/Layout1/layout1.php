<!DOCTYPE html>
<html lang="en">
<head>
	<title>website myclass</title>
	<meta charset="utl-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" type="text/css" href="vendor/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="Layouts/Layout1/style1.css">
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
	<!-- truyền dữ liệu php vào -->
	<?php echo $layout_area1 ?>

</nav>
<div class="jumbotron text-center">
	<h1><?php echo $layout_area2 ?></h1>
	<P>Đội ngũ trẻ - giàu tâm huyết</P>
	<form class="form-inline">
		<input type ="email" class="form-control" size="50" placeholder="Nhập địa chỉ email" required></input>
		<button type="button" class="btn btn-danger">Đăng ký theo dõi</button>		
	</form>
</div>

<div id ="about" class="container-fluid"><!--giới thiệu-->

<?php echo $layout_area3 ?>
</div>
<!-- <div class="container-fluid bg-grey">
<div class="row">
	<div class="col-lg-4">
			<span class="glyphicon glyphicon-globe logo slideanim"></span>
	</div>
	<div class="col-lg-8">
		<h2>Tin tôi đi, cuộc sống là những món quà</h2><br>
		<h4> Cuộc sống là món quà tuyệt vời nhất mỗi chúng ta có được</h4>
		<p><strong>Ở cái tuổi hai mươi mấy </strong>con người ta cô đơn lắm, cô đơn đến nỗi trở thành một con người khác, lạnh lùng, ít nói, ít cười, dường như chẳng còn là mình nữa. Bởi vì ngoài hai mươi, con người ta trưởng thành, phải gánh vác những trọng trách, phải mưu sinh để tồn tại.</p>
		<p><strong>Ở cái tuổi hai mươi mấy</strong> con người ta cần rất nhiều va chạm.</p>
	</div>
</div>
</div> -->
<!-- dịch vụ-->


<div id="map" class="container-fluid">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1003454.1752663706!2d106.13468146605655!3d10.75428931347321!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529292e8d3dd1%3A0xf15f5aad773c112b!2zSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1576508583716!5m2!1svi!2s" width="100%" height="400px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</div>
</body>
</html>