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
            $sql = "SELECT *
                        FROM t_articles
                        INNER JOIN t_marque ON t_articles.FK_Marque = t_marque.idMarque WHERE t_marque.Mmarque = '$brand'";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        
        //récupère les marques
        public function getBrands() {
            $sql = "SELECT Mmarque
                        FROM t_marque";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        
        //Crée une nouvelle marques
        public function setNewBrands($brandName, $brandIsActive) {
            $sql = "INSERT INTO t_marque (Mmarque, isActive)
                            VALUES ('$brandName', b'$brandIsActive')";
            $this->dbManager->Query($sql);
        }
        
        //Récupère marques par nom
        public function brandExists($brandName){
            $sql = "SELECT COUNT(*) AS brandExists FROM t_marque WHERE Mmarque = '$brandName'";
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
