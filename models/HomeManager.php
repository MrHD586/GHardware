<?php
	################################################################################
	#### Auteur : Butticaz Yvann   
	#### Date : 26 F�vrier 2018
	#### Classe ArticleManager :
	#### 		Cette classe poss�de des fonctions effectuants
    ####		des requ�tes souvant utilis�es.
	################################################################################

	//include de la classe DbManager
	include("models/DbManager.php");
	
	class ArticleManager {
		
		private $dbManager;
		
		function __construct(){
			//instantiation de la classe DbManager
			 $this->dbManager = new DbManager();
		}
		
		
		// execute une requ�te
		public function getArticles() {
			$sql = "SELECT * FROM t_articles"; 
			$resultat = $this->dbManager->Query($sql);
			return $resultat->fetchAll();
		}
	}
