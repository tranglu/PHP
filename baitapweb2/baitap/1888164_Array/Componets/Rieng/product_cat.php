<?php 
include("Data/data1.php");
include("Data/data2.php");
 ?>
 <?php 
            $html="";
                foreach ($product_cat as $key) {
                    $html.="
                    <li>
                    <a >$key</a>
                   </li>";
                }
?>
<?php 

    $htmlproduct="";

    foreach($product as $key){
            //$giagiam=$pro[2]*0.9;
            $htmlproduct.="
                <img src='$key[3]'>
             " ; 
}


 ?>
<div class="container">
    <div id="body">
        <div class="row">
        <div class="content col-9">
            <div>
                <div>
                    <?php 
                    echo"$htmlproduct";
                 ?>
                </div>
            </div>
        </div>

        <div class="sidebar col-3"> 
            <h1>Menu</h1>
            <ul class="navigation">
                <?php 
                    echo"$html";
                 ?>
            </ul>
            <a href="burger.html" class="download">&nbsp;</a> 
        </div>
    </div>
    </div>
 </div>