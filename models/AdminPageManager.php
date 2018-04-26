<?php
	################################################################################
	#### Auteur : Butticaz Yvann   
	#### Date : 26 Février 2018
	#### Classe AdminPageManager :
    #### 		Cette classe possède des fonctions effectuants
    ####		des requêtes souvant utilisées.
	################################################################################

	//include de la classe DbManager
	include("models/DbManager.php");
	
	
	class AdminPageManager {
		
		private $dbManager;
		
		function __construct(){
			//instantiation de la classe DbManager
			 $this->dbManager = new DbManager();
		}
		
		
		// execute une requête
		public function getCategories() {
		    $sql = "SELECT Ccategorie FROM t_categories";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
	}
