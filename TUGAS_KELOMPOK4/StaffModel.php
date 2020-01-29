<?php


class StaffModel
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
		$sql = "SELECT staff.*, gol.nama AS nama_golongan , jab.nama AS nama_jabatan FROM staff INNER JOIN golongan gol ON gol.id = staff.golongan_id INNER JOIN jabatan jab ON jab.id= staff.jabatan_id";

		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps ->execute();
		$rs = $ps->fetchAll();
		return $rs;
	}


	public function cari($keyword){
		//$sql = "SELECT * FROM staff WHERE id=?";
		$sql = "SELECT staff.*, gol.nama AS nama_golongan , jab.nama AS nama_jabatan FROM staff INNER JOIN golongan gol ON gol.id = staff.golongan_id INNER JOIN jabatan jab ON jab.id= staff.jabatan_id WHERE staff.nama LIKE '%$keyword%' ORDER BY id DESC";
		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps->execute();
		$rs=$ps ->fetchAll();
		return $rs;

	}

	public function view($id){
		 // $sql = "SELECT * FROM staff WHERE id=?";
		$sql = "SELECT staff.*, gol.nama AS nama_golongan , jab.nama AS nama_jabatan FROM staff INNER JOIN golongan gol ON gol.id = staff.golongan_id INNER JOIN jabatan jab ON jab.id= staff.jabatan_id where staff.id=?";

		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps ->execute($id);
		$rs = $ps->fetch();
		return $rs;
	}

	public function simpan($data){
		$sql = "INSERT INTO staff(nik,nama,tempat_lahir,tgl_lahir,
jenis_kelamin,golongan_id,jabatan_id,alamat,
no_hp,email,status_pernikahan,jumlah_anak,
pendidikan,foto) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps->execute($data);

	}
	public function ubah($data){
		$sql = "UPDATE staff SET nik=?,nama=?,tempat_lahir=?,tgl_lahir=?,jenis_kelamin=?, golongan_id=?, jabatan_id=?,alamat=?, no_hp=?, email=?, status_pernikahan=?, jumlah_anak=?, pendidikan=?,foto=? WHERE id = ? ";
		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps->execute($data);
	}
	public function hapus($id){
		$sql = "DELETE  FROM staff WHERE id = ? ";
		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps->execute($id);
	}

}