<?php


class Pasien{

	private $koneksi;

	public $id;
	public $nama_pasien;
	public $email;
	public $tmptlhr;
	public $tgllhr;
	public $telp;
	public $alamat;
	public $jk;
	public $foto;


	public function __construct($koneksi){

		$this->koneksi = $koneksi;

	}


	public function AddPasien(){

		$stmt = $this->koneksi->prepare("	INSERT INTO pasien (nama_pasien, email, tmptlhr, tgllhr, telp, alamat, jk, foto) 
																			VALUES (?,?,?,?,?,?,?,?)");
		$stmt->bind_param(
			"ssssssss",
			$this->nama_pasien,
			$this->email,
			$this->tmptlhr,
			$this->tgllhr,
			$this->telp,
			$this->alamat,
			$this->jk,
			$this->foto
		);

		if($stmt->execute()){
			return TRUE;
		}else{
			return FALSE;
		}

	}

	public function ReadAll(){

		$sql = "SELECT * FROM pasien ORDER BY nama_pasien";
		$result = $this->koneksi->query($sql);
		return $result;

	}


	public function ReadOne(){

		$sql = "SELECT * FROM pasien WHERE id_pasien= $this->id";
		$result = $this->koneksi->query($sql);
		return $result;

	}


	public function ReadEmail(){

		$sql = "SELECT * FROM pasien WHERE email= '$this->email'";
		$result = $this->koneksi->query($sql);
		return $result;

	}


	public function Update(){

		$stmt= $this->koneksi->prepare('UPDATE pasien SET nama_pasien=?, email=?, tmptlhr=?, tgllhr=?, telp=?, alamat=?, jk=?
			WHERE id_pasien=?');
		$stmt->bind_param(
			"sssssssi",
			$this->nama_pasien,
			$this->email,
			$this->tmptlhr,
			$this->tgllhr,
			$this->telp,
			$this->alamat,
			$this->jk,
			$this->id
		);

		if($stmt->execute()){
			return TRUE;
		}else{
			return FALSE;
		}

	}

	public function Delete(){

		$stmt = $this->koneksi->prepare('DELETE FROM pasien WHERE id_pasien = ?');
		$stmt->bind_param(
			"i",
			$this->id
		);
		if($stmt->execute()){
			return TRUE;
		}else{
			return FALSE;
		}

	}


	public function Login(){

		$sql = "SELECT * FROM pasien WHERE email = '$this->email' AND tgllhr = '$this->tgllhr'";
		$result = $this->koneksi->query($sql);

		if($result->num_rows == 1){
			return TRUE;
		}else{
			return FALSE;
		}

	}


	

}


?>