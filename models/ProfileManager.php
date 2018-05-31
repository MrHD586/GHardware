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
		
		// récupére les noms des catégories
		public function getCategoryName() {
		    $sql = "SELECT CName FROM t_category ORDER BY CName";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
	}
