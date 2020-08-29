<?php

include_once('CDatabase.php');
class TLSACH extends CDatabase{
	private $ID;
	private $TenTL;
	/*public function LayTheLoai($id){
		$sql = "select * from theloaisach where ID = '$id';";
		$data = CDatabase::GoiSQL($sql);
		// var_dump($data);
		// die;


		//$data = $this->GoiSQL($sql)
		$this->ID=$data[0]['ID'];
		$this->TenTL=$data[0]['TenTL'];
		return $this;
	}*/
	static function DSTheLoai()
	{
		$sql = "select * from theloaisach;";
		$data = CDataBase::GoiSQL($sql);
		
		$htmlDM="";
		foreach ($data as $dongDL) {
			$id=$dongDL["ID"];
			$tenTL=$dongDL["TenTL"];
			$url="<a href='index.php?tl=$id'>$tenTL</a>";
			$htmlDM.="$url<br>";
		}
		return $htmlDM;
	}
}
?>