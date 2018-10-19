<?php

class Dokter{

	private $koneksi;

	public $id_dokter;
	public $nama_dokter;
	public $alamat;
	public $spesialis;
	public $telp;


	public function __construct($koneksi){

		$this->koneksi = $koneksi;

	}

	public function AddDokter(){

		$stmt = $this->koneksi->prepare("INSERT INTO dokter (nama_dokter, alamat, spesialis, telp) VALUES (?,?,?,?)");
		$stmt->bind_param(
			"ssss",
			$this->nama_dokter,
			$this->alamat,
			$this->spesialis,
			$this->telp
		);

		if($stmt->execute()){
			return TRUE;
		}else{
			return FALSE;
		}

	}

	public function ReadAll(){

		$sql = "SELECT * FROM dokter ORDER BY nama_dokter";
		$result = $this->koneksi->query($sql);
		return $result;

	}


	public function ReadOne(){

		$sql = "SELECT * FROM dokter WHERE id_dokter=$this->id_dokter";
		$result = $this->koneksi->query($sql);
		return $result;

	}


	public function Update(){

		$stmt = $this->koneksi->prepare("UPDATE dokter SET nama_dokter=?, alamat=?, spesialis=?, telp=? WHERE id_dokter=?");
		$stmt->bind_param(
			"sssss",
			$this->nama_dokter,
			$this->alamat,
			$this->spesialis,
			$this->telp,
			$this->id_dokter
		);

		if($stmt->execute()){
			return TRUE;
		}else{
			return FALSE;
		}
	}


	public function Delete(){

		$stmt = $this->koneksi->prepare("DELETE FROM dokter WHERE id_dokter=?");
		$stmt->bind_param(
			"s",
			$this->id_dokter
		);

		if($stmt->execute()){
			return TRUE;
		}else{
			return FALSE;
		}

	}

}

?>