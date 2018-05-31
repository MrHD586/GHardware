<?php
    ################################################################################
    #### Auteur : Butticaz Yvann    
    #### Date : 15 Mai 2018
    #### Classe BrandManager :
    #### 		Cette classe possède des fonctions effectuants
    ####		des requêtes souvant utilisées.
    ################################################################################
    
    //include de la classe DbManager
    include("models/DbManager.php");
    
    class BrandManager {
        
        private $dbManager;
        
        function __construct(){
            //instantiation de la classe DbManager
            $this->dbManager = new DbManager();
        }
        
        
        //Récupère tous les articles selon une marque
        public function getArticlesBrand($brand) {
            $sql = "SELECT * FROM t_article
                    INNER JOIN t_brand ON t_article.FK_Brand = t_brand.idBrand WHERE t_brand.Name = '$brand'";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        
        //récupère les nom des marques
        public function getBrandsNames(){
            $sql = "SELECT Name FROM t_brand";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        
        //Crée une nouvelle marques
        public function setNewBrand($brandName, $brandIsActive) {
            $sql = "INSERT INTO t_brand (Name, isActive)
                            VALUES ('$brandName', b'$brandIsActive')";
            $this->dbManager->Query($sql);
        }
        
        //pour verification de l'existance d'un nom lors de la création
        public function brandNameExists($brandName){
            $sql = "SELECT COUNT(*) AS brandExists FROM t_brand WHERE Name = '$brandName'";
            $resultat = $this->dbManager->Query($sql);
            $donnees = $resultat->fetch();
            $resultat->closeCursor();
            $resultOfCount = $donnees['brandExists'];
            
            if($resultOfCount != 0){
                $resultat = TRUE;
            }else{
                $resultat = FALSE;
            }
            
            return $resultat;
        }
    }
