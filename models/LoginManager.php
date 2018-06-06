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
        
        // Récupération du user par login
        public function getUserByLogin($userLogin){
            $sql = "SELECT * FROM t_user WHERE Login = '$userLogin'";
            $resultat = $this->dbManager->Query($sql);
            return $resultat;
        }
        
        // Récupération du user par login
        public function getUserImageByUserFkImage($userFkImage){
            $sql = "SELECT * FROM t_imageuser WHERE idImageUser = '$userFkImage'";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetch();
        }
    }


