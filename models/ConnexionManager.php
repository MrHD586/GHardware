<?php
################################################################################
#### Auteur : Butticaz Yvann
#### Date : 26 F�vrier 2018
#### Classe ArticleManager :
#### 		Cette classe poss�de des fonctions effectuants
####		des requ�tes souvant utilis�es.
################################################################################

//include de la classe DbManager
include("models/DbManager.php");

class ConnexionManager {
    
    private $dbManager;
    
    function __construct(){
        //instantiation de la classe DbManager
        $this->dbManager = new DbManager();
    }
    
    // execute une requ�te
    public function getLogin() {
        $sql = "SELECT UPassword FROM t_user WHERE Uuser =".$password."";
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetchAll();
    }
}