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
    
    private $dbManagerAside;
    
    // execute une requ�te
    public function getCategories() {
        $dbManagerAside = new DbManager();
        $sql = "SELECT Ccategorie FROM t_categories";
        $resultat = $dbManagerAside->Query($sql);
        return $resultat->fetchAll();
        $this->dbManagerAside->$dbGh = null;
    }
}