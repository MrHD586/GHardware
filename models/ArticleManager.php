<?php
	################################################################################
	#### Auteur : Butticaz Yvann   
	#### Date : 26 Février 2018
	#### Classe ArticleManager :
	#### 			Cette classe possède des fonctions effectuants des requêtes utilisées
	####			souvant.
	################################################################################

	//include de la classe DbManager
	include("models/DbManager.php");
	
	class ArticleManager {
		
		private $dbManager;
		
		function __construct(){
			//instantiation de la classe DbManager
			 $this->dbManager = new DbManager();
		}
		
		
		// execute une requête
		public function getArticles() {
			$sql = "SELECT * FROM t_articles"; 
			$resultat = $this->dbManager->Query($sql);
			return $resultat->fetchAll();
		}
	}
