<?php 
if(defined("key")==false) header("location:../../index.php");;
$temp="
 <div class='container'>
		<div class='navbar-header'>
			<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
			<span class='icon-bar'></span>
			<span class='icon-bar'></span>
			<span class='icon-bar'></span>
			</button>
			<a class='navbar-brand' href='index.php?fn=home'>LOGO</a>
		</div>
		
		<div class='collapse navbar-collapse'id='myNavbar'>
			<ul class='nav navbar-nav navbar-right'>
				<li><a href='index.php?fn=home'>HOME</a></li>
				<li><a href='index.php?fn=member'>SERVICES</a></li>
				<li><a href='index.php?fn=product'>PRODUCTS</a></li>
				<li><a href='index.php?fn=contact'>LIÊN HỆ</a></li>				
			</ul>
		
		</div>
	</div>";
 ?>