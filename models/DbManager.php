﻿<?php
	################################################################################
	#### Auteur : Butticaz Yvann   
	#### Date : 22 Février 2018
	#### Classe DbManager :
	#### 			Cette classe possède deux fonctions. Une pour la connexion à la base 
	####			et une pour effectuer les requêtes 
	################################################################################

	class DbManager {
		
		// attributs
		private $servername = "localhost";
		private $username = "projet151";
		private $password = "projet151";
		private $dbname = "projet151";
		
		//variable de la DB
		private $dbGh = null;
		
		//appel de la fonction connect
		function __construct() {
			$this->Connect();
		}

		// connexion à la db
		public function Connect() {
			$this->dbGh = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
			// set the PDO error mode to exception
			$this->dbGh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		
		// execute une requêtes
		public function Query($query) {
			$stmt = $this->dbGh->prepare($query);
			$stmt->execute();
			return $stmt;
		}
	}