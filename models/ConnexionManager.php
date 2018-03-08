<?php
################################################################################
#### Auteur : Butticaz Yvann
#### Date : 26 Février 2018
#### Classe ArticleManager :
#### 		Cette classe possède des fonctions effectuants
####		des requêtes souvant utilisées.
################################################################################

//include de la classe DbManager
include("models/DbManager.php");

class ConnexionManager {
    
    private $dbManager;
    
    function __construct(){
        //instantiation de la classe DbManager
        $this->dbManager = new DbManager();
    }
    
    // execute une requête
    public function getLogin() {
        $sql = "SELECT UPassword FROM t_user WHERE Uuser =".$password."";
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetchAll();
    }
}