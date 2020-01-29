<?php


class SiswaModel
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
		// $sql = "SELECT * FROM siswa";
		$sql = "SELECT siswa.*, kelas.nama as jrs FROM siswa INNER JOIN kelas ON kelas.id = siswa.kelas_idkelas";

		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps ->execute();
		$rs = $ps->fetchAll();
		return $rs;
	} 


	public function cari($keyword){
		$sql = "SELECT siswa.*, kelas.nama as jrs FROM siswa INNER JOIN kelas ON kelas.id = siswa.kelas_idkelas where siswa.nama LIKE '%$keyword%' ORDER BY id DESC";
		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps->execute();
		$rs=$ps ->fetchAll();
		return $rs;

	}
	public function filter($idkel){
		$sql = "SELECT siswa.*, kelas.nama as jrs FROM siswa INNER JOIN kelas ON kelas.id = siswa.kelas_idkelas WHERE siswa.kelas_idkelas = ? ORDER BY id DESC";
		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps->execute($idkel);
		$rs=$ps ->fetchAll();
		return $rs;
	}

	

	
	


	public function view($id){
		// $sql = "SELECT * FROM siswa WHERE id=?";
		$sql = "SELECT siswa.*, kelas.nama as jrs FROM siswa INNER JOIN kelas ON kelas.id = siswa.kelas_idkelas where siswa.id=?";

		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps ->execute($id);
		$rs = $ps->fetch();
		return $rs;
	}

	public function simpan($data){
		$sql = "INSERT INTO siswa (nis,nisn,nama,jenis_kelamin,tempat_lahir,tgl_lahir,agama,alamat,wali,no_hp,kelas_idkelas,foto) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps->execute($data);

	}
	public function ubah($data){
		$sql = "UPDATE siswa SET nis=?,nisn=?,nama=?,jenis_kelamin=?,tempat_lahir=?,tgl_lahir=?,agama=?,alamat=?, wali=?, no_hp=?, kelas_idkelas=?, foto=? WHERE id = ? ";
		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps->execute($data);
	}
	public function hapus($id){
		$sql = "DELETE  FROM siswa WHERE id = ? ";
		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps->execute($id);
	}

}