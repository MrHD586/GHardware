<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 13 Mars 2018
#### Classe PanierCookieManager :
#### 		Cette classe poss�de des fonctions effectuants
####		des requ�tes souvant utilis�es.
################################################################################

//include de la classe DbManager
include("models/DbManager.php");


class CartCookieManager {
    
    private $dbManager;
    
    function __construct(){
        //instantiation de la classe DbManager
        $this->dbManager = new DbManager();
    }
    
    
    // execute une requ�te
    public function getArticlesCookie($idarticle) {
        $sql = "SELECT * FROM t_articles WHERE idArticle='$idarticle'";
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetchAll();
    }
    
    // execute une requ�te
    public function getCategories() {
        $sql = "SELECT Ccategorie FROM t_categories";
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetchAll();
    }
}