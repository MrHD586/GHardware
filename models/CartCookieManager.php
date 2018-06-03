<?php
    ################################################################################
    #### Auteur : Viquerat Killian
    #### Date : 13 Mars 2018
    #### Classe PanierCookieManager :
    #### 		Cette classe poss�de des fonctions effectuants
    ####		des requ�tes souvant utilis�es.
    ################################################################################
    
    //include de la classe DbManager
    include("models/DbManager.php");
    
    
    class CartCookieManager {
        
        private $dbManager;
        
        function __construct(){
            //instantiation de la classe DbManager
            $this->dbManager = new DbManager();
        }
        
        
        // récupére les articles par id
        public function getArticleById($idarticle) {
            $sql = "SELECT * FROM t_article WHERE idArticle='$idarticle'";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        
        // récupére les noms des catégories
        public function getCategoryNames() {
            $sql = "SELECT CName FROM t_category WHERE isActive = 1 ORDER BY CName";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
    }