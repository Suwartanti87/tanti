<?php

class GolonganModel 
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
		$sql = "SELECT * FROM golongan";
		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps->execute();
		$rs=$ps ->fetchAll();
		return $rs;
	}

	public function view($id){
		$sql = "SELECT * FROM golongan WHERE id=?";
		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps->execute($id);
		$rs=$ps ->fetch();
		return $rs;
	}
	public function simpan($data){
		$sql = "INSERT INTO golongan(nama) VALUES(?)";
		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps->execute($data);
	}
	public function ubah($data){
		$sql = "UPDATE golongan SET nama=? WHERE id = ? ";
		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps->execute($data);
	}
	public function hapus($id){
		$sql = "DELETE  FROM golongan WHERE id = ? ";
		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps->execute($id);
	}
} 