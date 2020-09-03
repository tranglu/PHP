<?php 
include("Data/data1.php");
include("Data/data2.php");
 ?>
<?php
$html="";
     foreach($product_category as $cat){
        $html.="
        <button ><a href='Product_category.php?tl=$cat'>$cat</a></button>
        ";
    };
?> <!-- loại hàng -->
<?php
$htmlpro="";
if(isset ($_GET["tl"])==true){
    $tl=$_GET["tl"];
     foreach($product as $pro){
         if($pro[3]==$tl){
            $htmlpro.="
            <div class='col-lg-3 col-md-6 special-grid'>
                        <div class='products-single fix'>
                            <div class='box-img-hover'>
                                <div class='type-lb'>
                                    <p class='sale'>Sale</p>
                                </div>
                                <img src='$pro[4]' class='img-fluid' alt='Image'>
                                <div class='mask-icon'>
                                    <ul>
                                        <li><a href='Product.php?pro=$pro[0]' data-toggle='tooltip' data-placement='right' title='View'><i class='fas fa-eye'></i></a></li>
                                    </ul>
                                    <a class='cart' href='#'>Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
            ";
        }

    }
}
else{
    foreach($product as $pro){
            $htmlpro.="
            <div class='col-lg-3 col-md-6 special-grid'>
                        <div class='products-single fix'>
                            <div class='box-img-hover'>
                                <div class='type-lb'>
                                    <p class='sale'>Sale</p>
                                </div>
                                <img src='$pro[4]' class='img-fluid' alt='Image'>
                                <div class='mask-icon'>
                                    <ul>
                                        <li><a href='Product.php?pro=$pro[0]' data-toggle='tooltip' data-placement='right' title='View'><i class='fas fa-eye'></i></a></li>
                                    </ul>
                                    <a class='cart' href='#'>Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
            ";
        

}
}
?> <!-- sản phẩm theo loại hàng -->