<?php
################################################################################
#### Auteur : Butticaz Yvann
#### Date : 11 Mars 2018
#### Classe LoginManager :
#### 		Cette classe possède une fonctions recherchant les infos
####		de l'utilisateur correspondante au login entré dans
####        le formulaire de connexion. 
################################################################################

//include de la classe DbManager
include("models/DbManager.php");

class LoginManager {
    
    private $dbManager;
    
    function __construct(){
        //instantiation de la classe DbManager
        $this->dbManager = new DbManager();
    }
    
    // execute une requête
    public function getLogin($userLogin){
        $sql = 'SELECT * FROM t_user WHERE ULogin = :userLogin';
        $sql->bindParam(':userLogin', $userLogin);
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetchAll();
    }
}