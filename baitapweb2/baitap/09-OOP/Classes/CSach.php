<?php

include_once('CDataBase.php');
include_once('CTheLoai.php');

/**
 * Lớp học
 */
class CSach extends CDataBase
{
	private $IDS;
	public $TenSach;
	private $URLHinh;
	private $GiaBan;
	private $SoLuong;
	public $ObjTL;

	private function LaySach($ids)
	{
		$sql = "select * from sach where IDS = $ids;";
		$data = CDataBase::GoiSQL($sql);

		$this->IDS=$data[0]['IDS'];
		$this->TenSach=$data[0]['TenSach'];
		$this->URLHinh=$data[0]['URLHinh'];
		$this->GiaBan=$data[0]['GiaBan'];
		$this->SoLuong=$data[0]['SoLuong'];
		$ObjTL = new CTheLoai();
		$this->ObjTL= $ObjTL->LayTheLoai($data[0]['TL']);

		return $this;
	}

	private function showData()
	{
		return 'html 1 quyen sach cu the';
	}

	static function DSSach()
	{
		$sql = "select * from sach;";
		$data = CDataBase::GoiSQL($sql);
		/*var_dump($data);*/
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
			<div class='col-sm-3 my-3'>
			$hinhsach<br> <h3>$tenS<br></h3> $giaban đ <br> $soluongton quyển<br>
			</div>
			";
		}

	return $htmlDMS;
	}
}

?>