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
    public function setValuePanier($PNombre) {
            $sql = "INSERT INTO t_panier (PNombre)
                    VALUES ('$PNombre')";
            $this->dbManager->Query($sql);
    }
    // execute une requ�te
    public function deleteValuePanier($Fk_Articles, $Fk_User) {
        $sql = "DELETE FROM t_panier WHERE Fk_Articles='$Fk_Articles' AND Fk_User='$Fk_User'";
        $this->dbManager->Query($sql);
    }
    
    public function getUserName($userLogin){
        $sql = "SELECT * FROM t_user WHERE ULogin = '$userLogin'";
        $resultat = $this->dbManager->Query($sql);
        return $resultat;
    }
    
    
}
