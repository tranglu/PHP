<?php 
include("Data/data1.php");
include("Data/data2.php");
 ?>
<?php 
    $htmlproduct="";
    foreach($product as $key){
            //$giagiam=$pro[2]*0.9;
            $htmlproduct.="<div class='col-4 my-5'>
                <img class='w-100'src='$key[3]'>
                Tên sản phẩm: <h1>$key[1]</h1>
                Giá:<h1>$ $key[2]</h1>
                 </div>
             " ; 
}
 ?>
<div class="container">
        <div class="row">
                    <?php 
                    echo"$htmlproduct";
                 ?>
        </div>
</div>