<?php
	################################################################################
	#### Auteur : Butticaz Yvann   
	#### Date : 26 Février 2018
	#### Classe ArticleManager :
    #### 		Cette classe possède des fonctions effectuants
    ####		des requêtes souvant utilisées.
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
		public function getArticles($idarticle) {
			$sql = "SELECT * FROM t_articles WHERE idArcticle='$idarticle'"; 
			$resultat = $this->dbManager->Query($sql);
			return $resultat->fetchAll();
		}
		
		// execute une requête
		public function getCategories() {
		    $sql = "SELECT Ccategorie FROM t_categories";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
	}
