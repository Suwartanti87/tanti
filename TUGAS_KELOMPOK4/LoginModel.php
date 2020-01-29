<?php

class LoginModel 
{
	// member1 variabel / atribut
	public $database;

	//member2 konstruktor
	public function __construct()
	{
		global $dbh; //panggil var di file lain
		$this->database = $dbh;
	}
	
	

	public function cekLogin($data){
		$sql = "SELECT * FROM user WHERE username = ? AND password=SHA1(?)";
		//prepare statement PDO
		$ps = $this->database->prepare($sql);
		$ps->execute($data);
		$rs=$ps ->fetch();
		return $rs;
	}
	
} 