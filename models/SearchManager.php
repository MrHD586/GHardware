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
        public function SearchArticleAndImageArticle($search){
            $sql = "SELECT * FROM t_article INNER JOIN t_imagearticle ON t_article.Fk_ImageArticle = t_imagearticle.idImageArticle WHERE Name LIKE '%$search%' AND t_imagearticle.isActive = 1";
            $resultat = $this->dbManager->Query($sql);
            return $resultat;
        }
        // récupére les articles selon la recherche entrée
        public function SearchMarqueAndImageArticle($search){
            $sql = "SELECT * FROM t_article INNER JOIN t_brand ON t_article.Fk_Brand = t_brand.idBrand INNER JOIN t_imagearticle ON t_article.Fk_ImageArticle = t_imagearticle.idImageArticle WHERE t_brand.BName LIKE '%$search%' AND t_imagearticle.isActive = 1";  
            $resultat = $this->dbManager->Query($sql);
            return $resultat;
        }
        
        //récupéraiton des nom des catégories
        public function getCategoryName() {
            $sql = "SELECT CName FROM t_category WHERE isActive = 1 ORDER BY CName";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
   
        
        public function getCategoryNameAll() {
            $sql = "SELECT * FROM t_category WHERE isActive = 1 ";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
}
