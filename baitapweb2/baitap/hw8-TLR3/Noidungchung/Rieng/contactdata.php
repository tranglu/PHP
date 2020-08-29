<?php 
if(defined("key")==false) header("location:../../index.php");;
$noidung= "
<div id='contact' class='container-fluid bg-grey'> <!--liên hệ-->
	<h2 class='text-center'>LIÊN HỆ</h2>
	<div class='row'>
		<div class='col-lg-5'>
			<h5>Hãy liên hệ với chúng tôi, chúng tôi sẽ trả lời trong vòng 8 giờ</h5>
			<p><span class='glyphicon glyphicon-map-marker'></span>Hồ Chí Minh, Vietnam</p>
			<p><span class='glyphicon glyphicon-phone'></span>0123456</p>
			<p><span class='glyphicon glyphicon-envelope'></span>iop@gmail.com</p>
		</div>
		<div class='col-lg-7'>
			<div class = 'row'>
				<div class='col-lg-6'>
					<input class='form-control' id='name' placeholder='tên'></input>								
				</div>
				<div class='col-lg-6'>
					<input class='form-control' id='email' placeholder='Email'></input>	
				</div>
			</div>
			<br>
			<textarea class='form-control' id='comments' name='coments' placeholder='coments'></textarea>
			<div class = 'row'>
			<div class='col-lg-10'></div>
			<div class='col-lg-2'>
			<br>
			<button type='button' class='btn btn-default'>Gửi yêu cầu</button>
			</div>
			</div>
		</div>
	</div>
</div>";
?>