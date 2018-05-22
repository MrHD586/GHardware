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
	
	class HomeManager {
		
		private $dbManager;
		
		function __construct(){
			//instantiation de la classe DbManager
			 $this->dbManager = new DbManager();
		}
		
		// execute une requ�te
		public function getCategories() {
		    $sql = "SELECT Ccategorie FROM t_categories ORDER BY Ccategorie";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
	}
