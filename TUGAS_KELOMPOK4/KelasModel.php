<?php

class KelasModel 
{
	// member1 variabel / atribut
	public $database;

	//member2 konstruktor
	public function __construct()
	{
		global $dbh; //panggil var di file lain
		$this->database = $dbh;
	}
	// member3 method/fungsi/behavior
	// fungsi2 CRUD
	public function getAll(){
		$sql = "SELECT * FROM kelas";
		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps->execute();
		$rs=$ps ->fetchAll();
		return $rs;
	}

	public function view($id){
		$sql = "SELECT * FROM kelas WHERE id=?";
		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps->execute($id);
		$rs=$ps ->fetch();
		return $rs;
	}
		public function simpan($data){
		$sql = "INSERT INTO kelas (nama,guru,tingkat,jurusan,jumlah_murid) VALUES(?,?,?,?,?)";
		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps->execute($data);

	}
	public function ubah($data){
		$sql = "UPDATE kelas SET nama=?,guru=?,tingkat=?,jurusan=?,jumlah_murid=? WHERE id = ? ";
		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps->execute($data);
	}
	public function hapus($id){
		$sql = "DELETE  FROM kelas WHERE id = ? ";
		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps->execute($id);
	}
}