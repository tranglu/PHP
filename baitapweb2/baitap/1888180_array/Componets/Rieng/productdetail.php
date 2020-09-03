<?php 
include("Data/data1.php");
include("Data/data2.php");
 ?>
<?php

if(isset ($_GET["pro"])==true){
    $pro_number=$_GET["pro"];
    $htmlpro="";
foreach($product as $pro){
         if($pro[0]==$pro_number){
            $giagiam=$pro[2]*0.9;
            $htmlpro.="
            <div class='shop-detail-box-main'>
        <div class='container'>
            <div class='row'>
                <div class='col-xl-5 col-lg-5 col-md-6'>
                <img class='d-block w-100' src='$pro[4]'>
                </div>
                <div class='col-xl-7 col-lg-7 col-md-6'>
                    <div class='single-product-details'>
                        <h2> $pro[1]</h2>
                        <h2>Price: <del>  $pro[2] $</del> $giagiam $ </h2>
                        <h2>CATEGORIES : $pro[3]</h2>
                        <h4> DESCRIPTION: Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </h4>
                    </div>
                    <div class='price-box-bar'>
                            <div class='cart-and-bay-btn'>
                                <a class='btn hvr-hover' data-fancybox-close='' href='#''>Buy New</a>
                                <a class='btn hvr-hover' data-fancybox-close='' href='#''>Add to cart</a>
                            </div>
                        </div>
                </div>
            </div>
    </div> " ; 
    
        }

    }
}

else{
    $htmlpro="
            <div class='shop-detail-box-main'>
            <div class='container'>
            <div class='row'>
            ";

    foreach($product as $pro){
            $giagiam=$pro[2]*0.9;
            $htmlpro.="
            <div class='col-6'>
            <div class='row'>
                <div class='col-xl-5 col-lg-5 col-md-6'>
                <img class='d-block w-100' src='$pro[4]'>
                </div>
                <div class='col-xl-7 col-lg-7 col-md-6'>
                    <div class='single-product-details'>
                        <h2>$pro[1]</h2>
                        <h2>Price: <del>  $pro[2] $</del> $giagiam $ </h2>
                        <h2>CATEGORIES : $pro[3]</h2>
                    </div>
                    <div class='price-box-bar'>
                            <div class='cart-and-bay-btn'>
                                <a class='btn hvr-hover' data-fancybox-close='' href='#''>Buy New</a>
                                <a class='btn hvr-hover' data-fancybox-close='' href='#''>Add to cart</a>
                            </div>
                     </div>
                </div>
            </div>
    </div> " ; 
}
$htmlpro.="
            </div>
                </div>
            </div>
            ";
}

?> <!-- chi tiết sản phẩm -->