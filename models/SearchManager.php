<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 28 Mai 2018
#### Classe SearchManager :
#### 		Cette classe poss�de des fonctions effectuants
####		des requ�tes souvant utilis�es.
################################################################################

//include de la classe DbManager
include("models/DbManager.php");


class SearchManager {
    
    private $dbManager;
    
    function __construct(){
        //instantiation de la classe DbManager
        $this->dbManager = new DbManager();
    }
    
    // execute une requ�te
    public function Search($search){
        $sql = "SELECT * FROM t_articles WHERE AName LIKE '%$search%'";
        $resultat = $this->dbManager->Query($sql);
        return $resultat;
    }
    
    
}