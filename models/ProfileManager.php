<?php
	################################################################################
	#### Auteur : Butticaz Yvann   
	#### Date : 24 Mai 2018
    #### Classe ProfileManager :
	#### 		Cette classe posè�de des fonctions effectuants
    ####		des requêtes souvant utilisées.
	################################################################################

	//include de la classe DbManager
	include("models/DbManager.php");
	
	class ProfileManager {
		
		private $dbManager;
		
		function __construct(){
			//instantiation de la classe DbManager
			 $this->dbManager = new DbManager();
		}
		
		// execute une requête
		public function getCategories() {
		    $sql = "SELECT Ccategorie FROM t_categories ORDER BY Ccategorie";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
	}
