<?php

class Koneksi{

	public $host = '127.0.0.1';
	public $user = 'root';
	public $pass = '';
	public $db   = 'suakainsan';


	public function GetKoneksi(){
		$conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
		return $conn;
	}

}

?>