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
    
    //paramêtre de catégorie dans l'url
    //$Category = $_GET['categorie'];
    
    class CategoryManager {
        
        private $dbManager;
        
        function __construct(){
            //instantiation de la classe DbManager
            $this->dbManager = new DbManager();
        }
        
        
        //Récupère tous les articles selon une catégorie
        public function getArticleByCategoryName($Category) {
            $sql = "SELECT * FROM t_article
                    INNER JOIN t_category ON t_article.Fk_Category = t_category.idCategory WHERE t_category.CName = '$Category'";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        
        //Récupère les noms des catégories
        public function getCategoryName() {
            $sql = "SELECT CName FROM t_category  WHERE isActive = 1 ORDER BY Name";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        
        //Crée une nouvelle catégorie
        public function setNewCategory($categoryName, $categoryIsActive) {
                $sql = "INSERT INTO t_category (Name, isActive)
                        VALUES ('$categoryName', b'$categoryIsActive')";
                $this->dbManager->Query($sql);
        }
        
        //pour verification de l'existance d'un nom lors de la création
        public function categoryExists($categoryName){
            $sql = "SELECT COUNT(*) AS categoryExists FROM t_category WHERE Name = '$categoryName'";
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
    }
