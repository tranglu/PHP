
<?php 
if(defined("key")==false) header("location:../../index.php");
f($_SESSION ["LoginName"]==$key[2]){
    $temp3="
 <div id='tooplate_content'>
            <h2>BÀI THI CUỐI KỲ WEB2</h2>
            <div class='col_b float_l'>
                THÔNG TIN HUẤN LUYỆN VIÊN
            </div>
            <div class='col_3 col_l float_r'>
                <h5>HỌ TÊN</h5>
                    $key[1]
                <h5>Email</h5>
                    $key[2]
                <h5>Trường</h5>
                    $key[4]
            </div>
                
        </div>";
    }
 ?>