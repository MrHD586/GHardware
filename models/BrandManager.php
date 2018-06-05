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
                    INNER JOIN t_brand ON t_article.FK_Brand = t_brand.idBrand WHERE t_brand.BName = '$brand'";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        
        
        //Récupère les marques par id
        public function getBrandById($idBrand) {
            $sql = "SELECT * FROM t_brand WHERE idBrand=".intval($idBrand);
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        
        //récupére et recherche les marques actives
        public function searchActiveBrand($search_keyword, $limit = null){
            $sql = "SELECT * FROM t_brand WHERE isActive = 1 AND BName LIKE :keyword ORDER BY idBrand";
            
            if(empty($limit) || $limit == NULL){
                $resultat = $this->dbManager->tablesQuery($sql, $search_keyword);
            }else{
                $sqlQuery = $sql.$limit;
                $resultat = $this->dbManager->tablesQuery($sqlQuery, $search_keyword);
            }
            
            return $resultat;
        }
        
        
        //récupére et recherche les marques inactives
        public function searchInactiveBrand($search_keyword, $limit = null){
            $sql = "SELECT * FROM t_brand WHERE isActive = 0 AND BName LIKE :keyword ORDER BY idBrand";
            
            if(empty($limit) || $limit == NULL){
                $resultat = $this->dbManager->tablesQuery($sql, $search_keyword);
            }else{
                $sqlQuery = $sql.$limit;
                $resultat = $this->dbManager->tablesQuery($sqlQuery, $search_keyword);
            }
            
            return $resultat;
        }	
        
        
        
        //Modifie une marque existante
        public function modifyBrandById($brandId, $brandName, $brandIsActive){
            $sql = "UPDATE t_brand SET BName = '".addslashes($brandName)."', isActive = b'$brandIsActive'
                       WHERE idBrand =".intval($brandId);
                $resultat = $this->dbManager->Query($sql);
        }
        
        //Rend inactif les arcticles
        public function setBrandInactiveById($idBrand) {
            $sql = "UPDATE t_brand SET isActive = b'0' WHERE idBrand =".intval($idBrand);
            $resultat = $this->dbManager->Query($sql);
        }	
        
        
        //récupère les nom des marques
        public function getBrandName(){
            $sql = "SELECT BName FROM t_brand";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        
        //Crée une nouvelle marques
        public function setNewBrand($brandName, $brandIsActive) {
            $sql = "INSERT INTO t_brand (BName, isActive)
                            VALUES ('".addslashes($brandName)."', b'$brandIsActive')";
            $this->dbManager->Query($sql);
        }
        
        //pour verification de l'existance d'un nom lors de la création
        public function brandNameExists($brandName){
            $sql = "SELECT COUNT(*) AS brandExists FROM t_brand WHERE BName = '$brandName'";
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
