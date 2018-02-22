<?php
	################################################################################
	#### Auteur : Butticaz Yvann   
	#### Date : 22 F�vrier 2018
	#### Classe DbManager :
	#### 			Cette classe poss�de deux fonctions. Une pour la connexion � la base 
	####			et une pour effectuer les requ�tes 
	################################################################################

class DbManager {
	
	// attributs
	private $servername = "localhost";
	private $username = "projet151";
	private $password = "projet151";
	private $dbname = "projet151";
	
	//variable de la DB
	private $dbGh = null;

	//appelle la fonction connect
	function __construct() {
		$this->Connect();
	}
	
	
	// connexion � la db
	public function Connect() {
		$this->dbGh = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
		// set the PDO error mode to exception
		$this->dbGh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	
	// execute une requ�te
	public function Query($query) {
		$stmt = $this->dbGh->prepare($query);
		$stmt->execute();
		return $stmt;
	}
}
