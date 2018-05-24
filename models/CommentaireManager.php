<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 24 mai 2018
#### Classe CommentaireManager :
#### 		Cette classe possède des fonctions effectuants
####		des requêtes souvant utilisées.
################################################################################

//include de la classe DbManager
include("models/DbManager.php");


class CommentaireManager {
    
    private $dbManager;
    
    function __construct(){
        //instantiation de la classe DbManager
        $this->dbManager = new DbManager();
    }
    
    
    // execute une requête
    public function setNewCommentaire($CEtat, $CTexte, $Fk_User, $Fk_Article) {
        $sql = "INSERT INTO t_panier (CEtat, CTexte, Fk_User, Fk_Article)
                        VALUES ('$CEtat', '$CTexte', '$Fk_User', '$Fk_Article')";
        $this->dbManager->Query($sql);
    }
    public function getUserName($userLogin){
        $sql = "SELECT * FROM t_user WHERE ULogin = '$userLogin'";
        $resultat = $this->dbManager->Query($sql);
        return $resultat;
    }
}