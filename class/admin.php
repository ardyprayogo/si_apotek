<?php

class Admin{

	private $koneksi;

	public $id;
	public $pass;

	public function __construct($koneksi){

		$this->koneksi = $koneksi;

	}

	public function Login(){

		$result = $this->koneksi->query("SELECT * FROM admin WHERE binary id_admin = '$this->id' AND binary pass = '$this->pass'");

		if($result->num_rows == 1){
			$_SESSION['admin'] = $this->id;
		}else{
			return FALSE;
		}

		return $result;

	}


}

?>