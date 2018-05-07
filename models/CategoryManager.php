<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 9 Mars 2018
#### Classe CategorieManager :
#### 		Cette classe poss�de des fonctions effectuants
####		des requ�tes souvant utilis�es.
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
        
        
        // execute une requ�te
        public function getArticlesCategorie($Categorie) {
            $sql = "SELECT *
                    FROM t_articles
                    INNER JOIN t_categories ON t_articles.FK_Categories = t_categories.idCategories WHERE t_categories.Ccategorie = '$Categorie'";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        
        // execute une requ�te
        public function getCategories() {
            $sql = "SELECT Ccategorie 
                    FROM t_categories";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
    }
