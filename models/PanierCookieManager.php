<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 13 Mars 2018
#### Classe PanierCookieManager :
#### 		Cette classe possède des fonctions effectuants
####		des requêtes souvant utilisées.
################################################################################

//include de la classe DbManager
include("models/DbManager.php");


class PanierCookieManager {
    
    private $dbManager;
    
    function __construct(){
        //instantiation de la classe DbManager
        $this->dbManager = new DbManager();
    }
    
    
    // execute une requête
    public function getArticlesCookie($idarticle) {
        $sql = "SELECT * FROM t_articles WHERE idArticle='$idarticle'";
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetchAll();
    }
    
    // execute une requête
    public function getCategories() {
        $sql = "SELECT Ccategorie FROM t_categories";
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetchAll();
    }
}