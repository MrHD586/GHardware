<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 01 Juin 2018
#### Classe CommandeManager :
#### 		Cette classe possède des fonctions effectuants
####		des requêtes souvant utilisées.
################################################################################

//include de la classe DbManager
include("models/DbManager.php");


class CommandeManager {
    
    private $dbManager;
    
    function __construct(){
        //instantiation de la classe DbManager
        $this->dbManager = new DbManager();
    }
    
    //Récupère les noms des catègories
    public function getCategoryName() {
        $sql = "SELECT CName FROM t_category WHERE isActive = 1 ORDER BY CName";
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetchAll();
    }
    //récupération du user par login
    public function getUserByLogin($userLogin){
        $sql = "SELECT * FROM t_user WHERE Login = '$userLogin'";
        $resultat = $this->dbManager->Query($sql);
        return $resultat;
    }
    // récupération du panier celon l'id du user
    public function getPanierByUserId($iduser) {
        $sql = "SELECT * FROM t_cart WHERE Fk_User='$iduser' AND isOrder=0" ;
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetchAll();
    }
    //création d'une commande
    public function setNewOrder($Date, $NumberOrder, $State, $PayementMethod, $PayementState, $Fk_Cart) {
        $sql = "INSERT INTO t_order (Date, NumberOrder, State, PayementMethod, PayementState, Fk_Cart)
                        VALUES ('$Date', '$NumberOrder', '$State','$PayementMethod','$PayementState','$Fk_Cart')";
        $this->dbManager->Query($sql);
    }
    
 
}