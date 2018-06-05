<?php
    ################################################################################
    #### Auteur : Viquerat Killian
    #### Date : 05 mai 2018
    #### Classe ArticleManager :
    #### 		Cette classe possède des fonctions effectuants
    ####		des requêtes souvant utilisées.
    ################################################################################
    
    //include de la classe DbManager
    include("models/DbManager.php");
    
    
    class CartDbManager {
        
        private $dbManager;
        
        function __construct(){
            //instantiation de la classe DbManager
            $this->dbManager = new DbManager();
        }
        
        
        // récupération du panier celon l'id du user
        public function getPanierByUserId($iduser) {
            $sql = "SELECT * FROM t_cart WHERE Fk_User='$iduser' AND isOrder=0";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        
        // récupération des articles par id
        public function getArticleByIdByAndImage($idarticle) {
            $sql = "SELECT * FROM t_article INNER JOIN t_imagearticle ON t_article.Fk_ImageArticle = t_imagearticle.idImageArticle WHERE idArticle='".intval($idarticle)."' AND t_imagearticle.isActive = 1";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        
        // récupération du nombre d'article
        public function getNombreArticle($Fk_User,$Fk_Article) {
            $sql = "SELECT * FROM t_cart WHERE Fk_User='$Fk_User' AND Fk_Article='$Fk_Article' AND isOrder=0";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        

        //création d'un panier
        public function setNewPanier($Fk_Article, $Fk_User, $Nombre) {
            $sql = "INSERT INTO t_cart (Fk_Article, Fk_User, Number)
                        VALUES ('$Fk_Article', '$Fk_User', '$Nombre')";
            $this->dbManager->Query($sql);
        }
        
        //récupération du user par login
        public function getUserByLogin($userLogin){
            $sql = "SELECT * FROM t_user WHERE Login = '$userLogin'";
            $resultat = $this->dbManager->Query($sql);
            return $resultat;
        }
        
        // mise à jours de la value du panier
        public function updateValuePanier($Fk_User,$Fk_Article,$Number) {
            $sql = "UPDATE t_cart SET Number='$Number' WHERE Fk_User='$Fk_User' AND Fk_Article='$Fk_Article' AND isOrder=0";
            $this->dbManager->Query($sql);
        }
        
        // récupération du nom ders catégories
        public function getCategoryName() {
            $sql = "SELECT CName FROM t_category WHERE isActive = 1 ORDER BY CName";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        
        
    }