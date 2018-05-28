<?php
	################################################################################
	#### Auteur : Butticaz Yvann   
	#### Date : 26 Février 2018
    #### Classe HomeManager :
	#### 		Cette classe possède des fonctions effectuants
    ####		des requêtes souvant utilisées.
	################################################################################

	//include de la classe DbManager
	include("models/DbManager.php");
	
	class HomeManager {
		
		private $dbManager;
		
		function __construct(){
			//instantiation de la classe DbManager
			 $this->dbManager = new DbManager();
		}
		
		//Récupère les noms des catègories
		public function getCategoriesName() {
		    $sql = "SELECT Ccategorie FROM t_categories WHERE isActive = 1 ORDER BY Ccategorie";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
	}
