<?php

class Obat{

	private $koneksi;

	public $kd_obat;
	public $nama_obat;


	public function __construct($koneksi){

		$this->koneksi = $koneksi;

	}

	public function AddObat(){

		$stmt = $this->koneksi->prepare("INSERT INTO obat (kd_obat, nama_obat) VALUES (?, ?)");
		$stmt->bind_param(
			"ss",
			$this->kd_obat,
			$this->nama_obat
		);

		if($stmt->execute()){
			return TRUE;
		}else{
			return FALSE;
		}

	}


	public function ReadAll(){

		$sql = "SELECT * FROM obat";
		$result = $this->koneksi->query($sql);
		return $result;

	}



	public function ReadOne(){

		$sql = "SELECT * FROM obat WHERE kd_obat = '$this->kd_obat'";
		$result = $this->koneksi->query($sql);
		return $result;

	}


	public function Update(){

		$stmt = $this->koneksi->prepare("UPDATE obat SET nama_obat=? WHERE kd_obat=?");
		$stmt->bind_param(
			"ss",
			$this->nama_obat,
			$this->kd_obat
		);

		if($stmt->execute()){
			return TRUE;
		}else{
			return FALSE;
		}

	}


	public function Delete(){

		$stmt = $this->koneksi->prepare("DELETE FROM obat WHERE kd_obat=?");
		$stmt->bind_param(
			"s",
			$this->kd_obat
		);

		if($stmt->execute()){
			return TRUE;
		}else{
			return FALSE;
		}

	}



}

?>