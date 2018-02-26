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

		// connexion � la db
		public function Connect() {
			//instantiation de la classe DbManager
			$dbManager = new DbManager();
			//requ�te de tous les objets de la table articles
			$sql = "SELECT * FROM t_articles"; 
			//passage de la requ�te $sql dans la fonction query
			$resultat = $dbManager->Query($sql);
		}
		
	
		
		// execute une requ�te
		public function Query($query) {
			$stmt = $this->dbGh->prepare($query);
			$stmt->execute();
			return $stmt;
		}
	}
