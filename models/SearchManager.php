<?php
    ################################################################################
    #### Auteur : Viquerat Killian
    #### Date : 28 Mai 2018
    #### Classe SearchManager :
    #### 		Cette classe poss�de des fonctions effectuants
    ####		des requêtes souvant utilis�es.
    ################################################################################
    
    //include de la classe DbManager
    include("models/DbManager.php");
    
    
    class SearchManager {
        
        private $dbManager;
        
        function __construct(){
            //instantiation de la classe DbManager
            $this->dbManager = new DbManager();
        }
        
        // récupére les articles selon la recherche entrée
        public function Search($search){
            $sql = "SELECT * FROM t_article WHERE Name LIKE '%$search%'";
            $resultat = $this->dbManager->Query($sql);
            return $resultat;
        }
        
        //récupéraiton des nom des catégories
        public function getCategoryName() {
            $sql = "SELECT Name FROM t_category WHERE isActive = 1 ORDER BY Name";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        
    }