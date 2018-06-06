<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 9 Mars 2018
#### Classe CategorieManager :
#### 		Cette classe possède des fonctions effectuants
####		des requêtes souvant utilisées.
################################################################################

    //include de la classe DbManager
    include("models/DbManager.php");
    
    
    class CategoryManager {
        
        private $dbManager;
        
        function __construct(){
            //instantiation de la classe DbManager
            $this->dbManager = new DbManager();
        }
        
        
        //Récupère tous les articles selon une catégorie
        public function getArticleByCategoryNameAndArticleImage($Category) {
            $sql = "SELECT * FROM t_article
                    INNER JOIN t_category ON t_article.Fk_Category = t_category.idCategory INNER JOIN t_imagearticle ON t_article.Fk_ImageArticle = t_imagearticle.idImageArticle  WHERE t_category.CName = '$Category' AND t_imagearticle.isActive = 1 AND t_article.isActive = 1";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        
        //Récupère les noms des catégories
        public function getCategoryName() {
            $sql = "SELECT CName FROM t_category  WHERE isActive = 1 ORDER BY CName";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        
        //Récupère les catégories par id
        public function getCategoryById($idCategory) {
            $sql = "SELECT * FROM t_category WHERE idCategory =".intval($idCategory);
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        
        //Crée une nouvelle catégorie
        public function setNewCategory($categoryName, $categoryIsActive) {
                $sql = "INSERT INTO t_category (CName, isActive)
                        VALUES ('".addslashes($categoryName)."', b'$categoryIsActive')";
                $this->dbManager->Query($sql);
        }
        
        //pour verification de l'existance d'un nom lors de la création
        public function categoryNameExists($categoryName){
            $sql = "SELECT COUNT(*) AS categoryExists FROM t_category WHERE CName = '$categoryName'";
            $resultat = $this->dbManager->Query($sql);
            $donnees = $resultat->fetch();
            $resultat->closeCursor();
            $resultOfCount = $donnees['categoryExists'];
            
            if($resultOfCount != 0){
                $resultat = TRUE;
            }else{
                $resultat = FALSE;
            }
            
            return $resultat;
        }
        
        
        //récupére et recherche les categories actives
        public function searchActiveCategory($search_keyword, $limit = null){
            $sql = "SELECT * FROM t_category WHERE isActive = 1 AND CName LIKE :keyword ORDER BY idCategory";
            
            if(empty($limit) || $limit == NULL){
                $resultat = $this->dbManager->tablesQuery($sql, $search_keyword);
            }else{
                $sqlQuery = $sql.$limit;
                $resultat = $this->dbManager->tablesQuery($sqlQuery, $search_keyword);
            }
            
            return $resultat;
        }
        
        
        //récupére et recherche les categories inactives
        public function searchInactiveCategory($search_keyword, $limit = null){
            $sql = "SELECT * FROM t_category WHERE isActive = 0 AND CName LIKE :keyword ORDER BY idCategory";
            
            if(empty($limit) || $limit == NULL){
                $resultat = $this->dbManager->tablesQuery($sql, $search_keyword);
            }else{
                $sqlQuery = $sql.$limit;
                $resultat = $this->dbManager->tablesQuery($sqlQuery, $search_keyword);
            }
            
            return $resultat;
        }	
        
        //Modifie une categories existante
        public function modifyCategoryById($categoryId, $categoryName, $categoryIsActive){
            $sql = "UPDATE t_category SET CName = '".addslashes($categoryName)."', isActive = b'$categoryIsActive'
                       WHERE idCategory =".intval($categoryId);
            $resultat = $this->dbManager->Query($sql);
        }
        
        //Rend inactif les categories
        public function setCategoryInactiveById($idCategory) {
            $sql = "UPDATE t_category SET isActive = b'0' WHERE idCategory =".intval($idCategory);
            $resultat = $this->dbManager->Query($sql);
        }	
    }
