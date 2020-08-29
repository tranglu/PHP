<?php

include_once('CDataBase.php');

/**
 * Lớp học
 */
class CTheLoai extends CDataBase
{
	public $ID;
	public $TenTL;

	public function LayTheLoai($id)
	{
		$sql = "select * from theloaisach where ID = '$id';";
		$data = CDataBase::GoiSQL($sql);

		var_dump($data);
		var_dump($id);
		die;

		$this->ID=$data[0]['ID'];
		$this->TenTL=$data[0]['TenTL'];

		return $this;
	}

	private function showData()
	{
		return 'html ten va ma the loai cua 01 the loai cu the';
	}

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

	private function LaySach($id)
	{
		$sql = "select * from sach where TL = '$id';";
		$data = CDataBase::GoiSQL($sql);

		return 'Danh sach sach thuoc the loai da chon';
	}
}

// $data = new CTheLoai;
// $data->DSTheLoai();

// echo "<hr>";
// echo "<pre>";
// var_dump($data->DSTheLoai());
// echo "</pre>";
// echo "<hr>";
// die;

?>