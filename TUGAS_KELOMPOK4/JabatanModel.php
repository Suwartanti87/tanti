<?php 
class JabatanModel 
{
	//memberi variabel /attribute
	public $database;

	//member 2 konstruct
	 public function __construct()
	{

		global $dbh; //panggil variabel lain
		$this->database = $dbh;
		}	

		//member 3 method/fungsi/behavior
		//fungsi crud
		public function getAll(){
			$sql = "SELECT * FROM jabatan
			ORDER BY id DESC";
			//preapare statement PD
			$ps = $this->database->prepare($sql);
			$ps ->execute();
			$rs = $ps ->fetchAll();
			return $rs;
		}



		public function view($id){
			$sql = "SELECT * FROM jabatan WHERE id=?";
			//preapare statement PDO

			$ps = $this->database->prepare($sql);
			$ps->execute($id);
			$rs = $ps ->fetch();
			return $rs;
}


		public function simpan($data) {
			$sql = "INSERT INTO jabatan(nama) 
			VALUES (?)";
			// Prepare Statement PDO
			$ps = $this->database->prepare($sql);
			$ps->execute($data);
		}

		public function ubah($data) {
			$sql = "UPDATE jabatan SET nama=?
			        WHERE id = ?";
			// Prepare Statement PDO
			$ps = $this->database->prepare($sql);
			$ps->execute($data);
		}		

		public function hapus($id) {
			$sql = "DELETE FROM jabatan WHERE id = ?";
			// Prepare Statement PDO
			$ps = $this->database->prepare($sql);
			$ps->execute($id);
		}		


}
?>