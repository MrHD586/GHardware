<?php
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

		// connexion à la db
		public function Connect() {
			//instantiation de la classe DbManager
			$dbManager = new DbManager();
			//requête de tous les objets de la table articles
			$sql = "SELECT * FROM t_articles"; 
			//passage de la requête $sql dans la fonction query
			$resultat = $dbManager->Query($sql);
		}
		
	
		
		// execute une requête
		public function Query($query) {
			$stmt = $this->dbGh->prepare($query);
			$stmt->execute();
			return $stmt;
		}
	}
