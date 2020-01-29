<?php


class GuruModel
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
		// $sql = "SELECT * FROM guru";
		$sql = "SELECT guru.*, gol.nama AS nama_golongan , jab.nama AS nama_jabatan FROM guru INNER JOIN golongan gol ON gol.id = guru.golongan_id INNER JOIN jabatan jab ON jab.id= guru.jabatan_id";

		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps ->execute();
		$rs = $ps->fetchAll();
		return $rs;
	}


	public function cari($keyword){
		//$sql = "SELECT * FROM pegawai WHERE id=?";
		$sql = "SELECT guru.*, gol.nama AS nama_golongan , jab.nama AS nama_jabatan FROM guru INNER JOIN golongan gol ON gol.id = guru.golongan_id INNER JOIN jabatan jab ON jab.id= guru.jabatan_id WHERE guru.nama LIKE '%$keyword%' ORDER BY id DESC";
		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps->execute();
		$rs=$ps ->fetchAll();
		return $rs;

	}

	public function view($id){
		 // $sql = "SELECT * FROM guru WHERE id=?";
		$sql = "SELECT guru.*, gol.nama AS nama_golongan , jab.nama AS nama_jabatan FROM guru INNER JOIN golongan gol ON gol.id = guru.golongan_id INNER JOIN jabatan jab ON jab.id= guru.jabatan_id where guru.id=?";

		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps ->execute($id);
		$rs = $ps->fetch();
		return $rs;
	}

	public function simpan($data){
		$sql = "INSERT INTO guru(nik,nip,unptk,nama,tempat_lahir,tgl_lahir,
jenis_kelamin,alamat,golongan_id,jabatan_id,
no_hp,email,status_pernikahan,jumlah_anak,
pendidikan,bidang_study,foto) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps->execute($data);

	}
	public function ubah($data){
		$sql = "UPDATE guru SET nik=?, nip=?, unptk=?,nama=?,tempat_lahir=?,tgl_lahir=?,jenis_kelamin=?,alamat=?, golongan_id=?, jabatan_id=?, no_hp=?, email=?, status_pernikahan=?, jumlah_anak=?, pendidikan=?, bidang_study=?, foto=? WHERE id = ? ";
		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps->execute($data);
	}
	public function hapus($id){
		$sql = "DELETE  FROM guru WHERE id = ? ";
		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps->execute($id);
	}

}