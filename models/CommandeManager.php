<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 01 Juin 2018
#### Classe CommandeManager :
#### 		Cette classe possède des fonctions effectuants
####		des requêtes souvant utilisées.
################################################################################

//include de la classe DbManager
include("models/DbManager.php");


class CommandeManager {
    
    private $dbManager;
    
    function __construct(){
        //instantiation de la classe DbManager
        $this->dbManager = new DbManager();
    }
    
    //Récupère les noms des catègories
    public function getCategoryName() {
        $sql = "SELECT CName FROM t_category WHERE isActive = 1 ORDER BY CName";
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetchAll();
    }
    
 
}