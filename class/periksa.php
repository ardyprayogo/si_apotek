<?php

class Periksa{

	private $koneksi;

	public $kd_periksa;
	public $id_pasien;
	public $id_dokter;
	public $tgl;
	public $biaya;
	public $email;
	public $tp;
	public $tt;


	public function __construct($koneksi){

		$this->koneksi = $koneksi;

	}


	public function Add(){

		$stmt = $this->koneksi->prepare("INSERT INTO periksa (id_pasien, id_dokter, tglperiksa, biaya)
			VALUES (?,?,?,?)");
		$stmt->bind_param(
			"iisi",
			$this->id_pasien,
			$this->id_dokter,
			$this->tgl,
			$this->biaya
		);

		if($stmt->execute()){
			return TRUE;
		}else{
			return FALSE;
		}

	}


	public function ReadAll(){

		$sql = "SELECT * FROM periksa";
		$result = $this->koneksi->query($sql);
		return $result;

	}

	public function ReadOne(){

		$sql = "SELECT * FROM periksa WHERE kd_periksa=$this->kd_periksa";
		$result = $this->koneksi->query($sql);
		return $result;

	}


	public function ReadQuery(){

		$sql = "SELECT periksa.kd_periksa, pasien.nama_pasien, dokter.nama_dokter, periksa.tglperiksa, periksa.biaya
						FROM periksa
						JOIN dokter ON periksa.id_dokter = dokter.id_dokter
						JOIN pasien ON periksa.id_pasien = pasien.id_pasien ORDER BY periksa.tglperiksa";
		$result = $this->koneksi->query($sql);
		return $result;

	}


	public function Delete(){

		$stmt = $this->koneksi->prepare("DELETE FROM periksa WHERE kd_periksa=?");
		$stmt->bind_param("i", $this->kd_periksa);
		if($stmt->execute()){
			return TRUE;
		}else{
			return FALSE;
		}

	}


	public function ReadQueryP(){

		$email = $this->email;

		$sql = "SELECT periksa.kd_periksa, periksa.tglperiksa, dokter.nama_dokter, periksa.biaya, periksa.id_pasien, pasien.email
						FROM periksa
						JOIN dokter ON periksa.id_dokter = dokter.id_dokter
						JOIN pasien ON periksa.id_pasien = pasien.id_pasien WHERE pasien.email = '$email' ORDER BY periksa.tglperiksa ASC";

		$result = $this->koneksi->query($sql);
		return $result;
	}

	public function ReadTanggal(){

		// $sql = "SELECT * FROM periksa WHERE tglperiksa BETWEEN '$this->ta' AND '$this->tt' ORDER BY tglperiksa";
		$sql = "SELECT periksa.*, dokter.nama_dokter, pasien.nama_pasien 
						FROM periksa
						JOIN dokter ON periksa.id_dokter = dokter.id_dokter
						JOIN pasien ON periksa.id_pasien = pasien.id_pasien
						WHERE periksa.tglperiksa BETWEEN '$this->ta' AND '$this->tt'
						ORDER BY periksa.tglperiksa";
		$result = $this->koneksi->query($sql);
		return $result;

	}



}


?>