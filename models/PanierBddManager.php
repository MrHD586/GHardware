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


class PanierBddManager {
    
    private $dbManager;
    
    function __construct(){
        //instantiation de la classe DbManager
        $this->dbManager = new DbManager();
    }
    
    
    // execute une requête
    public function getPanier($iduser) {
        $sql = "SELECT Fk_Articles FROM t_panier WHERE Fk_User='$iduser'";
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetchAll();
    }
    public function getArticlesBdd($idarticle) {
        $sql = "SELECT * FROM t_articles WHERE idArticle='$idarticle'";
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetchAll();
    }
    public function getUserName($userLogin){
        $sql = "SELECT * FROM t_user WHERE ULogin = '$userLogin'";
        $resultat = $this->dbManager->Query($sql);
        return $resultat;
    }
    
}