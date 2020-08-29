<?php

include_once('CDatabase.php');
class SACH extends CDatabase{
	private $IDS;
	private $TenSach;
	private $URLHinh;
	private $GiaBan;
	private $SoLuong;
	private $TL;
	// public  function LaySach($id){
	// 	$sql = "select * from sach where IDS = '$id';";
	// 	$data = CDatabase::GoiSQL($sql);
	// 	//$data = $this->GoiSQL($sql)
	// 	$this->ID=$data[0]['IDS'];
	// 	$this->TenTL=$data[0]['TenSach'];
	// 	$this->ID=$data[0]['URLHinh'];
	// 	$this->TenTL=$data[0]['GiaBan'];
	// 	$this->ID=$data[0]['SoLuong'];
	// 	$this->TenTL=$data[0]['TL'];
	// 	return $this;
	// }
	static function DSSach()
	{
		$sql = "select * from sach;";
		$data = CDataBase::GoiSQL($sql);
		$htmlDMS="";
		foreach ($data as $dongDL1) {
			$ids=$dongDL1["IDS"];
			$tenS=$dongDL1["TenSach"];
			$linkhinh=$dongDL1["URLHinh"];
			$TL=$dongDL1["TL"];
			$hinhsach="<img src='$linkhinh'>";
			$giaban="Giá: ".$dongDL1["GiaBan"];
			$soluongton="Số lượng tồn: ".$dongDL1["SoLuong"];
			$htmlDMS.="
			<div class='col-sm-4 my-3 py-5'>
			$hinhsach<br> <h3>$tenS<br></h3> $giaban đ <br> $soluongton quyển<br>
			<a href='xuly.php?masp=$ids''>xem chi tiết</a></span> <br>
			<a href='hieuchinh.php?masp=$ids&tl=$TL''>Hiệu chỉnh</a></span> 
			</div>";
		}
		return $htmlDMS;
	}
}
?>