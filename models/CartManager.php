<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 03 Mai 2018
#### Classe PanierManager :
#### 		Cette classe poss�de des fonctions effectuants
####		des requ�tes souvant utilis�es.
################################################################################

//include de la classe DbManager
include("models/DbManager.php");


class CartManager {
    
    private $dbManager;
    
    function __construct(){
        //instantiation de la classe DbManager
        $this->dbManager = new DbManager();
    }
    
    
    // execute une requ�te
    public function setNewPanier($Fk_Articles, $Fk_User, $PNombre) {
            $sql = "INSERT INTO t_panier (Fk_Articles, Fk_User, PNombre)
                    VALUES ('$Fk_Articles', '$Fk_User', '$PNombre')";
            $this->dbManager->Query($sql);
    }
    
    public function getUserName($userLogin){
        $sql = "SELECT * FROM t_user WHERE ULogin = '$userLogin'";
        $resultat = $this->dbManager->Query($sql);
        return $resultat;
    }
    
    
}