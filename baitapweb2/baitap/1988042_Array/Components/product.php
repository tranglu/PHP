<?php
include("data/data2.php");
?>
<!-- tittle heading -->
<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>M</span>obiles
				<span>&</span>
				<span>C</span>omputers</h3>
<!-- //tittle heading -->
<?php
    $Chuoi_HTML="";
    foreach($products as $product){
       $Chuoi_HTML.="<img src='$product[4]'>";
   };
?>


<!-- <div class='product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4'>
        <div class='row'>
            <div class='col-md-4 product-men'>
                <div class='men-pro-item simpleCart_shelfItem'>
                    <div class='men-thumb-item text-center'>
                        <img src='$product[4]' alt=''>
                        <div class='men-cart-pro'>
                            <div class='inner-men-cart-pro'>
                                <a href='#' class='link-product-add-cart'>Quick View</a>
                            </div>
                        </div>
                    </div>
                    <div class='item-info-product text-center border-top mt-4'>
                        <h4 class='pt-1'>
                            <a href='#'>'$product[1]'</a>
                        </h4>
                        <div class='info-product-price my-2'>
                            <span class='item_price'>'$product[2]'</span>
                            <del>$280.00</del>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div> -->