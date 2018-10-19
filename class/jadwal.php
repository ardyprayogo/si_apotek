<?php

class Jadwal{

	private $koneksi;

	public $id_jadwal;
	public $id_dokter;
	public $hari;
	public $jam;


	public function __construct($koneksi){

		$this->koneksi = $koneksi;

	}


	public function AddJadwal(){

		$stmt = $this->koneksi->prepare("INSERT INTO jadwal_dokter (id_dokter, hari, jam_kerja) VALUES (?,?,?)");
		$stmt->bind_param(
			"sss",
			$this->id_dokter,
			$this->hari,
			$this->jam
		);

		if($stmt->execute()){
			return TRUE;
		}else{
			return FALSE;
		}

	}



	public function ReadAll(){

		$sql = "SELECT * FROM jadwal_dokter";
		$result = $this->koneksi->query($sql);
		return $result;

	}


	public function ReadOne(){

		$sql = "SELECT * FROM jadwal_dokter WHERE id_jadwal=$this->id_jadwal";
		$result = $this->koneksi->query($sql);
		return $result;

	}


	public function Update(){

		$stmt = $this->koneksi->prepare("UPDATE FROM jadwal_dokter SET id_dokter=?, hari=?, jam_kerja=? WHERE id_jadwal =?");
		$stmt->bind_param(
			"sssi",
			$this->id_dokter,
			$this->hari,
			$this->jam,
			$this->id_jadwal
		);

		if($stmt->execute()){
			return TRUE;
		}else{
			return FALSE;
		}

	}


	public function Delete(){

		$stmt = $this->koneksi->prepare("DELETE FROM jadwal_dokter WHERE id_jadwal=?");
		$stmt->bind_param(
			"i",
			$this->id_jadwal
		);

		if($stmt->execute()){
			return TRUE;
		}else{
			return FALSE;
		}

	}


	public function ReadQuery(){

		$sql = "SELECT jadwal_dokter.id_jadwal, jadwal_dokter.id_dokter, dokter.nama_dokter, dokter.spesialis, jadwal_dokter.hari, jadwal_dokter.jam_kerja
						FROM jadwal_dokter
						JOIN dokter ON jadwal_dokter.id_dokter = dokter.id_dokter";
		$result = $this->koneksi->query($sql);
		return $result;


	}


}

?>