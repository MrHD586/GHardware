<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 11 Mars 2018
    #### Classe LoginManager :
    #### 		Cette classe poss�de une fonctions recherchant les infos
    ####		de l'utilisateur correspondante au login entr� dans
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
        
        // execute une requ�te
        public function getLogin($userLogin){
            $sql = "SELECT * FROM t_user WHERE ULogin = '$userLogin'";
            $resultat = $this->dbManager->Query($sql);
            return $resultat;
        }
    }


