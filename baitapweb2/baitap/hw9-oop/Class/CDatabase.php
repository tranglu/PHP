<?php 
#lấy dữ liệu từ database

class CDatabase
{
    private static $hostname = "localhost";
	private static $DBname = "ql_bansach1";
	private static $login = "root";
	private static $pass = "";
	protected static function GoiSQL($sql){
		$ketnoi=mysqli_connect(CDataBase::$hostname,CDataBase::$login,CDataBase::$pass,CDataBase::$DBname,3308);
		if (mysqli_connect_errno()==true) {
			$msg=mysqli_connect_error();
			echo "lỗi kết nối";
			exit();
			}
			//return array[];

		$data = mysqli_query($ketnoi,$sql);
		
		$htmlDM= array();
		while($dongDL=mysqli_fetch_array($data,MYSQLI_ASSOC))
		{
			array_push($htmlDM, $dongDL);
		}
				
		mysqli_close($ketnoi);
		$temp = $htmlDM;

		return $temp;
		echo "<pre>";
				var_dump($temp);
				echo "</pre>";
			}
}
 ?>