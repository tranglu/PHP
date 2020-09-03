<?php 
include_once("config/database.php");
 ?>
<?php 
session_start();
if(isset($_SESSION ["Login"])==false){
	$_SESSION ["Login"]=false;
	$_SESSION ["LoginID"]="";
	$_SESSION ["doi"]="";
}
if(isset($_SESSION ["Login"])==true){
	$isLogin=$_SESSION ["Login"];
	$ID=$_SESSION ["LoginID"];
}
 ?> 
<!--  xử lý đăng nhập -->
<?php 
#kết nối vào csdl
$ketnoi=mysqli_connect($server,$dblogin,$dbpass,$dbname,3308);
if (mysqli_connect_errno()==true) {
	$msg=mysqli_connect_error();
	echo "lỗi kết nối";
	exit();
}
$sql="select* from huanluyenvien";

#thực hiện câu lệnh sql qua php
$datahlv=mysqli_query($ketnoi,$sql);
$dlhlv=array();
while($dongDL=mysqli_fetch_array($datahlv,MYSQLI_ASSOC))
{
	$bientam=array();
	$id=$dongDL["MaHLV"];
	$ten=$dongDL["Hoten"];
	$email=$dongDL["Email"];
	$pw=$dongDL["password"];
	$tentruong=$dongDL["tentruong"];
	array_push($bientam,$id);
	array_push($bientam,$ten);
	array_push($bientam,$email);
	array_push($bientam,$pw);
	array_push($bientam,$tentruong);
	array_push($dlhlv,$bientam);
}
if($_POST){
	$name=$_POST["txtTenLogin"];
$password=$_POST["txtPassword"];
foreach($dlhlv as $key){
   if($name==$key[2]&&$password==$key[3]){
   $_SESSION ["Login"]=true;
   $_SESSION ["LoginID"]=$key[0];
  header("location:index.php");
  }
  else{
   header("location:index.php");
  }
}
}
 ?>
<?php 
define("key","@abc");
#Khỏi tạo các biến giao diện
$layout_area1="";
$layout_area2="";
$layout_area3="";
# điều khiển chức năng
if(isset($_GET["fn"])==false)
	$fn="home";
else
	$fn=$_GET["fn"];
#nạp vùng dữ liệu cho nội dung chung
include("Layouts/Chung/menu.php");
$layout_area1=$temp1;
#điều khiển dữ liệu của trang web
switch ($fn) {
	case 'home':
			if($_SESSION ["Login"]==true){
				foreach($dlhlv as $key){
		   if($_SESSION ["LoginID"]==$key[0]){
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
		}
		$layout_area2=$temp3;
		$layout_area3="<a href='logout.php'>Logout</a>";
		break;
		}
			else{
				include("Layouts/Rieng/infor.php");
				$layout_area2=$temp2;
				include("Layouts/Rieng/login.php");
				$layout_area3=$temp4;
				break;
			}
	case 'list':	
			include("Layouts/Rieng/dsthisinh.php");
				$layout_area2=$temp3;
				
				$layout_area3="";
				break;	
	case 'add':	
			include("Layouts/Rieng/addthisinh.php");
				$layout_area2=$temp5;
				
				$layout_area3="";
				break;	
	default:
		# code...
		break;
}
#nhận giao diện
$webhtml=file_get_contents("Layouts/index.html");
$webhtml=str_replace("[Vùng menu]",$layout_area1,$webhtml);
$webhtml=str_replace("[Vùng thông tin]",$layout_area2,$webhtml);
$webhtml=str_replace("[Vùng đăng nhập]",$layout_area3,$webhtml);
print($webhtml);
mysqli_close($ketnoi);
 ?>