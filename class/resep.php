<?php

class Resep{

	private $koneksi;

	public $kd_resep;
	public $id_pasien;
	public $kd_obat;
	public $banyak;
	public $aturan_pakai;
	public $email;

	public function __construct($koneksi){

		$this->koneksi = $koneksi;

	}


	public function AddResep(){

		$stmt = $this->koneksi->prepare("INSERT INTO resep (id_pasien, kd_obat, banyak, aturan_pakai)
			VALUES (?,?,?,?)");
		$stmt->bind_param(
			"isis",
			$this->id_pasien,
			$this->kd_obat,
			$this->banyak,
			$this->aturan_pakai
		);

		if($stmt->execute()){
			return TRUE;
		}else{
			return FALSE;
		}

	}

	public function ReadAll(){

		$sql = "SELECT * FROM resep";
		$result = $this->koneksi->query($sql);
		return $result;

	}


	public function ReadQuery(){

		$sql = "SELECT resep.kd_resep, resep.id_pasien, pasien.nama_pasien, obat.nama_obat, resep.banyak, resep.aturan_pakai
						FROM resep
						JOIN pasien ON resep.id_pasien = pasien.id_pasien
						JOIN obat ON resep.kd_obat = obat.kd_obat ORDER BY resep.kd_resep";

		$result = $this->koneksi->query($sql);
		return $result;

	}


	public function Delete(){

		$stmt = $this->koneksi->prepare("DELETE FROM resep WHERE kd_resep = ?");
		$stmt->bind_param(
			"i",
			$this->kd_resep
		);

		if($stmt->execute()){
			return TRUE;
		}else{
			return FALSE;
		}

		
	}



	public function ReadQueryP(){


		$email = $this->email;

		$sql = "SELECT resep.kd_resep, pasien.nama_pasien, pasien.email, obat.nama_obat, resep.banyak, resep.aturan_pakai
						FROM resep 
						JOIN pasien ON resep.id_pasien = pasien.id_pasien
						JOIN obat ON resep.kd_obat = obat.kd_obat WHERE pasien.email = '$email' ORDER BY resep.kd_resep";

		$result = $this->koneksi->query($sql);

		return $result;


	}


}

?>