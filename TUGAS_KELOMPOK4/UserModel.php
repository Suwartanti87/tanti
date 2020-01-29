<?php


class UserModel
{
	//member1 variabel
	public $database;

	//member2 konstruktor
	public function __construct()
	{
		global $dbh; //panggil var di file lain
		$this->database = $dbh;
	}

	//member3 method/fungsi/behavior
	//fungsi2 CRUD

	public function getAll(){
		$sql = "select * from user";

		// $sql = "SELECT pegawai.*, jabatan.nama as posisi
		// 		from pegawai INNER JOIN jabatan
		// 		ON jabatan.id = pegawai.idjabatan order by id desc";

		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps ->execute();
		$rs = $ps->fetchAll();
		return $rs;
	}

	public function view($id){
		$sql = "select * from user where id=?";
		// $sql = "SELECT pegawai.*, jabatan.nama as posisi
		// 		from pegawai INNER JOIN jabatan
		// 		ON jabatan.id = pegawai.idjabatan where pegawai.id=?";

		//prepare statement PDO

		$ps = $this->database->prepare($sql);
		$ps ->execute($id);
		$rs = $ps->fetch();
		return $rs;
	}

	public function simpan($data){
		$sql = "insert into user(fullname, username, password, email, role, foto) values (?,?,SHA1(?),?,?,?)";

		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps ->execute($data);
		
	}

	public function ubah($data){
		$sql = "update user set fullname=?, username=?, password=?, email=?, role=?, foto=? where id =?";

		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps ->execute($data);
		
	}


	public function hapus($id){
		$sql = "delete from user where id =?";

		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps ->execute($id);
		
	}
}