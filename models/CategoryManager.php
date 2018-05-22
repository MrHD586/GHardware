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
    $Categorie = $_GET['categorie'];
    
    class CategoryManager {
        
        private $dbManager;
        
        function __construct(){
            //instantiation de la classe DbManager
            $this->dbManager = new DbManager();
        }
        
        
        //Récupère tous les articles selon une catégorie
        public function getArticlesCategorie($Categorie) {
            $sql = "SELECT *
                    FROM t_articles
                    INNER JOIN t_categories ON t_articles.FK_Categories = t_categories.idCategories WHERE t_categories.Ccategorie = '$Categorie'";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        
        //récupère les catègories
        public function getCategoriesName() {
            $sql = "SELECT Ccategorie FROM t_categories ORDER BY Ccategorie";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        
        //Crée une nouvelle catègorie
        public function setNewCategory($categoryName, $categoryIsActive) {
                $sql = "INSERT INTO t_categories (Ccategorie, isActive)
                        VALUES ('$categoryName', b'$categoryIsActive')";
                $this->dbManager->Query($sql);
        }
        
        //Récupère catègorie par nom
        public function categoryExists($categoryName){
            $sql = "SELECT COUNT(*) AS categoryExists FROM t_categories WHERE Ccategorie = '$categoryName'";
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
