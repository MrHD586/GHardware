<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 04 Juin 2018
#### Classe RSSManager :
#### 		Cette classe possède des fonctions effectuants
####		des requêtes souvant utilisées.
################################################################################

//include de la classe DbManager
include("models/DbManager.php");


class RSSManager {
    
    private $dbManager;
    
    function __construct(){
        //instantiation de la classe DbManager
        $this->dbManager = new DbManager();
    }
    //Récupère les articles et image par id
    public function getRSS($index_selection, $limitation) {
        $sql = "SELECT * FROM flux_rss ORDER BY pubDate DESC LIMIT :index_selection, :limitation";
        $resultat = $this->dbManager->RSSQuery($sql);
        return $resultat->fetchAll();
    }
}