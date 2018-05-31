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
    
    
    class CommentManager {
        
        private $dbManager;
        
        function __construct(){
            //instantiation de la classe DbManager
            $this->dbManager = new DbManager();
        }
        
        
        // crée un nouveau commentaire
        public function setNewComment($State, $Texte, $Fk_User, $Fk_Article) {
            $sql = "INSERT INTO t_comment (State, Text, Fk_User, Fk_Article)
                    VALUES ('$State', '".addslashes($Texte)."', '$Fk_User', '$Fk_Article')";
            $this->dbManager->Query($sql);
        }
        
        // récupération des user par login
        public function getUserByLogin($userLogin){
            $sql = "SELECT * FROM t_user WHERE Login = '$userLogin'";
            $resultat = $this->dbManager->Query($sql);
            return $resultat;
        }
        
        // 
        public function deleteValueComment($idComment) {
            $sql = "DELETE FROM t_comment WHERE idComment='$idComment'";
            $this->dbManager->Query($sql);
        }
    }