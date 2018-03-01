<?php
################################################################################
#### Auteur : Viquerat Killian,Yvann Butticaz
#### Date : 01 Mars 2018
#### Classe ArticleManager :
#### 		Cette classe poss�de des fonctions effectuants
####		des requ�tes utilis�es pour la liste des cat�gorie.
################################################################################
//include de la classe DbManager
include("models/DbManager.php");

class AsideManager {
    
    private $dbManager;
    
    function __construct(){
        //instantiation de la classe DbManager
        $this->dbManager = new DbManager();
    }
    
    
    // execute une requ�te
    public function getCategories() {
        $sql = "SELECT Ccategorie FROM t_categories";
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetchAll();
    }
}