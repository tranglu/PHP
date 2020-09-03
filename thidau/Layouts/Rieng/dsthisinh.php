<?php 
include_once("config/database.php");
 ?>

<?php 
$id=$_SESSION ["LoginID"];
//$doi=$_SESSION ["doi"];
if(defined("key")==false) header("location:../../index.php");

#kết nối vào csdl
$ketnoi=mysqli_connect($server,$dblogin,$dbpass,$dbname,3308);
if (mysqli_connect_errno()==true) {
    $msg=mysqli_connect_error();
    echo "lỗi kết nối";
    exit();
}
#lấy ds thí sinh 
$sqlthisinh="select* from dsthisinh";
$datathisinh=mysqli_query($ketnoi,$sqlthisinh);
$dlthisinh=array();
while($dongDL=mysqli_fetch_array($datathisinh,MYSQLI_ASSOC))
{
    $bientam=array();
    $email=$dongDL["Email"];
    $tendoi=$dongDL["TenDoiThi"];
    $ten=$dongDL["HoTen"];
    array_push($bientam,$email);
    array_push($bientam,$ten);
    array_push($bientam,$tendoi);
    array_push($bientam,$ten);
    array_push($dlthisinh,$bientam);
}
#dulieu hlv
$sql="select* from doithi where MaHLV=$id ";

#thực hiện câu lệnh sql qua php
$datadoithi=mysqli_query($ketnoi,$sql);
$dldoithi=array();
$html="";
while($dongDL=mysqli_fetch_array($datadoithi,MYSQLI_ASSOC))
{
    $idhlv=$dongDL["MaHLV"];
    $ten=$dongDL["TenDoiThi"];
    if($idhlv==$id){
        $_SESSION["doi"]=$ten;
         $html.="<div id='tooplate_content'>
            <h2>DANH SÁCH THÍ SINH THEO ĐỘI</h2>
            <div class='col_b float_l'>
                ĐỘI: $ten
            </div>";
        
        foreach($dlthisinh as $key){
            if($key[2]==$ten)
            {
             $html.="
            <div class='col_3 col_l float_r'>
                
                    $key[3]

            </div>
                
        </div>";  
            }
        }
    }

    $temp3="
 <div id='tooplate_content'>
            <h2>BÀI THI CUỐI KỲ WEB2</h2>
            <div class='col_b float_l'>
                $html
            </div>
                
        </div>";
    }
    //mysqli_close($ketnoi);
 ?>