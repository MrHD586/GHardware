<?php
    ################################################################################
    #### Auteur : Viquerat Killian
    #### Date : 11 Mai 2018
    #### Classe DeleteAddCartManager :
    #### 		Cette classe poss�de des fonctions effectuants
    ####		des requ�tes souvant utilis�es.
    ################################################################################
    
    //include de la classe DbManager
    include("models/DbManager.php");
    
    
    class DeleteAddCartManager {
        
        private $dbManager;
        
        function __construct(){
            //instantiation de la classe DbManager
            $this->dbManager = new DbManager();
        }
        
        
        public function updateValueCart($Fk_User,$Fk_Article,$Number) {
            $sql = "UPDATE t_cart SET Number='$Number' WHERE Fk_User='$Fk_User' AND Fk_Article='$Fk_Article'";
            $this->dbManager->Query($sql);
        }
        
        
        public function deleteValueCart($Fk_User,$Fk_Article) {
            $sql = "DELETE FROM t_cart WHERE Fk_User='$Fk_User' AND Fk_Article='$Fk_Article'";
            $this->dbManager->Query($sql);
        }
        
        
        public function deletePanier($Fk_User) {
            $sql = "DELETE FROM t_cart WHERE Fk_User='$Fk_User'";
            $this->dbManager->Query($sql);
        } 
        
        
        public function getUserName($userLogin){
            $sql = "SELECT * FROM t_user WHERE Login = '$userLogin'";
            $resultat = $this->dbManager->Query($sql);
            return $resultat;
        }
        
        
    }
