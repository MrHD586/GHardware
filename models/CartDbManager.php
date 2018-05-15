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
    
    
    // execute une requête
    public function getPanier($iduser) {
        $sql = "SELECT * FROM t_panier WHERE Fk_User='$iduser'";
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetchAll();
    }
    public function getArticlesBdd($idarticle) {
        $sql = "SELECT * FROM t_articles WHERE idArticle='$idarticle'";
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetchAll();
    }
    public function getNombreArticles($Fk_User,$Fk_Articles) {
        $sql = "SELECT * FROM t_panier WHERE Fk_User='$Fk_User' AND Fk_Articles='$Fk_Articles'";
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetchAll();
    }
    public function setNewPanier($Fk_Articles, $Fk_User, $PNombre) {
        $sql = "INSERT INTO t_panier (Fk_Articles, Fk_User, PNombre)
                    VALUES ('$Fk_Articles', '$Fk_User', '$PNombre')";
        $this->dbManager->Query($sql);
    }
    public function getUserName($userLogin){
        $sql = "SELECT * FROM t_user WHERE ULogin = '$userLogin'";
        $resultat = $this->dbManager->Query($sql);
        return $resultat;
    }
    public function updateValuePanier($Fk_User,$Fk_Articles,$PNombre) {
        $sql = "UPDATE t_panier SET PNombre='$PNombre' WHERE Fk_User='$Fk_User' AND Fk_Articles='$Fk_Articles'";
        $this->dbManager->Query($sql);
    }
    
}