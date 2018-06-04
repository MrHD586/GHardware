<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 04 Juin 2018
    #### Classe ImageArticleManager :
    #### 		Cette classe possède des fonctions effectuants
    ####		des requêtes souvant utilisées.
    ################################################################################

    //include de la classe DbManager
    include("models/DbManager.php");
    
    
    class ImageArticleManager {
        
        private $dbManager;
    
        function __construct(){
            //instantiation de la classe DbManager
            $this->dbManager = new DbManager();
        }
        
        
        //Récupère les images par id
        public function getImageArticleById($imageArticleId) {
            $sql = "SELECT * FROM t_imageArticle WHERE idImageArticle =".intval($imageArticleId);
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        
        //Crée une nouvelle image
        public function setNewImageArticle($imageArticleLink, $imageArticleIsActive) {
            $sql = "INSERT INTO t_imageArticle (Link, isActive)
                    VALUES ('$imageArticleLink', b'$imageArticleIsActive')";
            $this->dbManager->Query($sql);
        }
        
        //pour verification de l'existance d'un lien lors de la création
        public function imageArticleLinkExists($link){
            $sql = "SELECT COUNT(*) AS linkExists FROM t_imageArticle WHERE Link = 'link'";
            $resultat = $this->dbManager->Query($sql);
            $donnees = $resultat->fetch();
            $resultat->closeCursor();
            $resultOfCount = $donnees['linkExists'];
            
            if($resultOfCount != 0){
                $resultat = TRUE;
            }else{
                $resultat = FALSE;
            }
            
            return $resultat;
        }
        
        //récupére et recherche les categories actives
        public function searchActiveImageArticle($search_keyword, $limit = null){
            $sql = "SELECT * FROM t_imageArticle WHERE isActive = 1 AND Link LIKE :keyword ORDER BY idImageArticle";
            
            if(empty($limit) || $limit == NULL){
                $resultat = $this->dbManager->tablesQuery($sql, $search_keyword);
            }else{
                $sqlQuery = $sql.$limit;
                $resultat = $this->dbManager->tablesQuery($sqlQuery, $search_keyword);
            }
            
            return $resultat;
        }
        
        
        //récupére et recherche les categories inactives
        public function searchInactiveImageArticle($search_keyword, $limit = null){
            $sql = "SELECT * FROM t_imageArticle WHERE isActive = 0 AND Link LIKE :keyword ORDER BY idImageArticle";
            
            if(empty($limit) || $limit == NULL){
                $resultat = $this->dbManager->tablesQuery($sql, $search_keyword);
            }else{
                $sqlQuery = $sql.$limit;
                $resultat = $this->dbManager->tablesQuery($sqlQuery, $search_keyword);
            }
            
            return $resultat;
        }
        
        //Modifie une categories existante
        public function modifyImageArticleById($imageArticleId, $imageArticleLink, $imageArticleIsActive){
            $sql = "UPDATE t_imageArticle SET Link = '$imageArticleLink', isActive = b'$imageArticleIsActive'
                    WHERE idImageArticle =".intval($imageArticleId);
            $resultat = $this->dbManager->Query($sql);
        }
        
        //Rend inactif les categories
        public function setImageArticleInactiveById($imageArticleId) {
            $sql = "UPDATE t_imageArticle SET isActive = b'0' WHERE idImageArticle =".intval($imageArticleId);
            $resultat = $this->dbManager->Query($sql);
        }
       
    }
