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
    
    private $dbManagerAside;
    
    // execute une requête
    public function getCategories() {
        $dbManagerAside = new DbManager();
        $sql = "SELECT Ccategorie FROM t_categories";
        $resultat = $dbManagerAside->Query($sql);
        return $resultat->fetchAll();
        $this->dbManagerAside->$dbGh = null;
    }
}