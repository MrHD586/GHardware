<?php
################################################################################
#### Auteur : Viquerat Killian,Yvann Butticaz
#### Date : 01 Mars 2018
#### Classe ArticleManager :
#### 		Cette classe possède des fonctions effectuants
####		des requêtes utilisées pour la liste des catégorie.
################################################################################
//include de la classe DbManager
include("models/DbManager.php");

class AsideManager {
    
    private $dbManager;
    
    function __construct(){
        //instantiation de la classe DbManager
        $this->dbManager = new DbManager();
    }
    
    
    // execute une requête
    public function getCategories() {
        $sql = "SELECT Ccategorie FROM t_categories";
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetchAll();
    }
}