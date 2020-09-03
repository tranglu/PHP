<?php 
	include("data/data2.php");
 ?>

 <div class="row">
 	<?php 
 		foreach ($arrProduct as $value) {
 			echo "<div class='col-lg-4 col-md-6 col-sm-6'>
                            <div class='product__item'>
                                <div class='product__item__pic set-bg' data-setbg='$value[3]'>
                                    <ul class='product__item__pic__hover'>
                                        <li><a href='#'><i class='fa fa-heart'></i></a></li>
                                        <li><a href='#'><i class='fa fa-retweet'></i></a></li>
                                        <li><a href='#'><i class='fa fa-shopping-cart'></i></a></li>
                                    </ul>
                                </div>
                                <div class='product__item__text'>
                                	<h5>Mã SP: $value[1]</h5>
                                    <h6><a href='#'>Tên SP: $value[2]</a></h6>
                                    <h5>$-$value[4]</h5>
                                </div>
                            </div>
            </div>";
 		}
 	 ?>
                                             
</div>