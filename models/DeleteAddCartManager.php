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
    
    // execute une requ�te
    public function updateValuePanier($Fk_User,$Fk_Articles,$PNombre) {
        $sql = "UPDATE t_panier SET PNombre='$PNombre' WHERE Fk_User='$Fk_User' AND Fk_Articles='$Fk_Articles'";
        $this->dbManager->Query($sql);
    }
    public function deleteValuePanier($Fk_User,$Fk_Articles) {
        $sql = "DELETE FROM t_panier WHERE Fk_User='$Fk_User' AND Fk_Articles='$Fk_Articles'";
        $this->dbManager->Query($sql);
    }
    public function deletePanier($Fk_User) {
        $sql = "DELETE FROM t_panier WHERE Fk_User='$Fk_User'";
        $this->dbManager->Query($sql);
    }  
    public function getUserName($userLogin){
        $sql = "SELECT * FROM t_user WHERE ULogin = '$userLogin'";
        $resultat = $this->dbManager->Query($sql);
        return $resultat;
    }
    
    
}
