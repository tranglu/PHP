<?php 
include_once("Noidungchung/Rieng/config/database.php");
session_start();
 ?>

 <?php 
if (empty($_POST)){
	$_SESSION["mangchon"]=array();
	$_SESSION["mangmanhconlai"]=array();
}
  ?>
<?php 
#lấy dữ liệu mảnh ghép theo thể loại
if(isset ($_GET["masp"])==true){
  $idh=$_GET["masp"];
}
else{
  $idh="*";
}
# lấy sách từ SQL
  $ketnoi=mysqli_connect($server,$dblogin,$dbpass,$dbname,3308);
if (mysqli_connect_errno()==true) {
  $msg=mysqli_connect_error();
  echo "lỗi kết nối";
  exit();
}
$manhghep="select* from manhghep
    where ThuocPID='$idh'";
$datasach=mysqli_query($ketnoi,$manhghep);
$htmlDMS="";
$dshinh=array();
$dskiemtrachuan=array();
while($hinhmanhghep=mysqli_fetch_array($datasach,MYSQLI_ASSOC)){
			array_push($dskiemtrachuan,$hinhmanhghep['URLMG']);
			array_push($dshinh,$hinhmanhghep);				   
}
// tạo random mảnh ghép

?> <!-- xong phần mảnh ghép-->
  <?php 
$backURL="game.php?masp=$idh";
 ?>
<!-- phần hình mẫu và khung -->
<?php 
#lấy dữ liệu hình to theo mã
if(isset ($_GET["masp"])==true){
  $idh=$_GET["masp"];
}
else{
  $idh="*";
}
$hinhghep="SELECT * FROM hinhghep
    where PID='$idh'
    ";
$datahinh=mysqli_query($ketnoi,$hinhghep);
$htmlDMH="";
$htmlKhung='';
while($dongDL1=mysqli_fetch_array($datahinh,MYSQLI_ASSOC))
{
  	$idh=$dongDL1["PID"];
	$tenhinh=$dongDL1["TenHinhGhep"];
	$linkhinh=$dongDL1["URL"];
	$hinhsach="<img class='img-fluid' src='$linkhinh'>";
	$htmlDMH.="
	$hinhsach<br> 
	";
		// tạo khung ghép theo số dòng cột của db
$khungghep=array();	
	for ($i=0; $i < $dongDL1['Dong']; $i++) { 
		for ($j=0; $j < $dongDL1['Cot']; $j++) {
			$hinhmau=array();
			$x=$i;
			$y=$j;
			$url="";
			array_push($hinhmau,$x);
			array_push($hinhmau,$y);
			array_push($hinhmau,$url);
			array_push($khungghep,$hinhmau);
}
}		
//tạo khung ghép rỗng
if (empty($_POST)){
	
$_SESSION["khungghep"]=$khungghep;
}
	// lưu session mảnh đang chọn
$dsmanhghepchon=array();
if ($_POST&&isset($_POST['ID'])&&isset($_POST['chon'])) {
foreach ($_POST['ID'] as $key =>$value) {
    if ($_POST['chon'] == $value) {
    			
    	$idmanh = $_POST['chon'];
    	$toadox = $_POST['toadox'][$key];	    	
    	$toadoy = $_POST['toadoy'][$key];
    	$linkmanh = $_POST['img'][$key];
    	foreach($_SESSION["khungghep"] as $kg=>$value){			
			if($toadox == $_SESSION["khungghep"][$kg][0] && $toadoy == $_SESSION["khungghep"][$kg][1]&&$_SESSION["khungghep"][$kg][2]==null) {
				array_pop($_SESSION["khungghep"][$kg]);
				array_push($_SESSION["khungghep"][$kg],$linkmanh);	 
				// thêm hình vào khung ghép	
				array_push($dsmanhghepchon,$idmanh);
    			array_push($dsmanhghepchon,$toadox);
    			array_push($dsmanhghepchon,$toadoy);
    			array_push($dsmanhghepchon,$linkmanh);
    			foreach ($_SESSION["mangmanhconlai"] as $key =>$value) {	
    			if($value['MID']==$idmanh){
    				$a= $key;  
    				unset($_SESSION["mangmanhconlai"][$a]);					
    			};
    			}	
    			array_push($_SESSION["mangchon"],$dsmanhghepchon);	
    		} 
        } 	
    }  		
}
}
else{
	$_SESSION["mangmanhconlai"]=$dshinh;}
	shuffle($_SESSION["mangmanhconlai"]);
foreach ($_SESSION["mangmanhconlai"] as $ds) {
	$id=$ds["MID"];
	$linkhinh=$ds["URLMG"];
    $hinhsach="<img class='img-fluid'src='$linkhinh'>";
    $htmlDMS.="	  <input type='hidden' name='ID[]'value=".$id.">
					  <input type='hidden' name='img[]'value=".$linkhinh.">
					  <div class='col-3'>
					  $hinhsach<br> 
					  <div class='form-check'>
					  <input class='form-check-input' type='radio' name='chon' value=".$id.">
					  <label class='form-check-label' for='exampleRadios1'>
					    Chọn
					  </label>
					</div>
					Nhập tọa độ:<br>
					X:<input type='number' class='form-control' name='toadox[]'>
					Y:<input type='number' class='form-control' name='toadoy[]'>
					<button type='submit' class='form-control'>Ghép</button>
					  </div>";
}							
	// lưu session mảnh đang chọn	
//tạo khung ghép rỗng
}
  ?> <!-- xong phần hình chính-->
  <?php  		
if (isset($_POST['mangkiemtra'])) {
 	
	  	$a=0;
	  	$n=count($dskiemtrachuan);
	  for($i=0; $i < $n; $i++)	{
	  	
	  	if($_POST['mangkiemtra'][$i]==$dskiemtrachuan[$i]){
	  		$a++;
	  	};
	  }
	  if($a==$n){
	  	echo"thành công";
	  }
			else{
				echo" thất bại";
				$_SESSION["khungghep"]=$khungghep;
						echo "<pre>";
						var_dump($_SESSION["khungghep"]);
						echo "</pre>";
			}		
			 } 
	
   mysqli_close($ketnoi);
 ?> <!-- hết kiểm tra -->
 <?php 
$htmlKhung='<div class="row mb-5">';

foreach($_SESSION["khungghep"] as $khung){
	$hinhmau=array();
	$x=$khung[0];
	$y=$khung[1];
	$linkmanh=$khung[2];
	$htmlKhung.='<div class="nen col-6 border border-primary">
				<input type="hidden" name="mangkiemtra[]" value='.$linkmanh.'>
			<img class="img-fluid hinhchen w-100 h-100" src="'.$linkmanh.'">
				</div>';
}
  ?>
 
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <script type="text/javascript" src="../../vendor/js/bootstrap.js"></script>
  <link rel="stylesheet" href="../../vendor/css/bootstrap.css">
  <link rel="stylesheet" href="Layout/css/style1.css">
</head>
<body>
	<!-- <a href="index.php">Quay về trang chủ</a> -->
	<div class="container my-5">
		<div class="row">
			<div class="col-6">
				<h3>Hình mẫu:</h3>
				<?php 
				echo $htmlDMH;
				 ?>
			</div>
			<div class="col-6">
				<form active="game.php" method="POST">
				<h1>Khung ghép:</h1>

					<div class="container">
						<?php echo $htmlKhung; ?>
						<button class="btn btn-warning m-5"><a href="<?php echo $backURL ?>">GHÉP LẠI</a></button>
						<button type='submit' class='btn btn-info m-5'>KIỂM TRA</button>
					</div>	
				</form>
			</div> <!-- khung ghép -->
			</div>
		</div>
	</div>
	<form active="game.php" method="POST">
    <div class="container">
        <div class="row">   	
          <?php     
        echo"$htmlDMS";   
       ?>
        </div>
    </div>
    </form> <!-- form nè -->
    
</body>
</html>