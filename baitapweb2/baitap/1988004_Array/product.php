<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>1988004_Array Products</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/layout.css" type="text/css">
    <!--[if lt IE 9]><script src="scripts/html5shiv.js"></script><![endif]-->
</head>

<body>
    <div class="wrapper row1">
        <?php
        include("components/menu.php")
        ?>
    </div>
    <!-- content -->
    <div class="wrapper row2">
        <div id="container" class="clear">
            <?php
            include("components/leftnav.php")
            ?>
            <!-- main content -->
            <div id="content">
                <?php
                include("data/data2.php");
                 $last = count($product);
                 $hang=round($last/2,0.6)+1;

                        $noidung="
                         <table border='0' width='100%'>";   
                          $a=0;
                                for($x=0;$x<$hang;$x++){                        
                                     $noidung.= "<tr>";                                     
                                for ($i=0;$i<2;$i++){                                  
                                    $a++;
                                    foreach($product as $key){
                                   $bientam=$key["maso"]%2;
                            for($j=0;$j<1;$j++){
                                if($bientam==0){
                                   if($key["maso"]==($a+1)){
                                    $noidung.="<td>";
                                    $linkanh=$key["url"];
                                    $maso=$key["maso"];
                                    $ten=$key["ten"];
                                    $gia=$key["gia"];
                                            $noidung.='<img src="'.$linkanh.'">';  
                                            $noidung.="Mã Số:<h1>$maso</h1>"; 
                                            $noidung.="Tên sản phẩm:<h1>$ten</h1>"; 
                                            $noidung.="Mã Số:<h1>$gia</h1>";           
                                  $noidung .= "</td>";
                                } 
                                }       
                                else{           
                                   if($key["maso"]==($a+1)){
                                    $noidung.="<td>";
                                    $linkanh=$key["url"];
                                             $noidung.='<img src="'.$linkanh.'">';  
                                            $noidung.="Mã Số:<h1>$maso</h1>"; 
                                            $noidung.="Tên sản phẩm:<h1>$ten</h1>"; 
                                            $noidung.="Mã Số:<h1>$gia</h1>";           
                                  $noidung .= "</td>";
                                } 
                                }   
                            }
                            
                            }  
                             
                            }
                                                                        
                        $noidung .= "</tr>"; 
                        }
                         
                        
                        $noidung .= "</table>";
                    
                   ?>  
 
            <!-- / content body -->
        </div>
    </div>
    <!-- footer -->
    <div class="wrapper row3">
        <?php
        include("components/footer.php")
        ?>
          <?php     
        echo"$noidung";   
       ?>         
    </div>

</body>

</html>