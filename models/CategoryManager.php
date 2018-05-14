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
    $Categorie=$_GET['categorie'];
    
    class CategoryManager {
        
        private $dbManager;
        
        function __construct(){
            //instantiation de la classe DbManager
            $this->dbManager = new DbManager();
        }
        
        
        // execute une requête
        public function getArticlesCategorie($Categorie) {
            $sql = "SELECT *
                    FROM t_articles
                    INNER JOIN t_categories ON t_articles.FK_Categories = t_categories.idCategories WHERE t_categories.Ccategorie = '$Categorie'";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        
        //récupère les catègories
        public function getCategories() {
            $sql = "SELECT Ccategorie 
                    FROM t_categories";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        
        //Crée une nouvelle catègorie
        public function setNewCategory($categoryName, $categoryIsActive) {
                $sql = "INSERT INTO t_categories (Ccategorie, isActive)
                        VALUES ('$categoryName', '$categoryIsActive')";
                $this->dbManager->Query($sql);
        }
        
        //Récupère catègorie par nom
        public function getCategoryName($categoryName){
            $sql = "SELECT * FROM t_categories WHERE Ccategorie = '$categoryName'";
            $resultat = $this->dbManager->Query($sql);
            return $resultat;
        }
    }
