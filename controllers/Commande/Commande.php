<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 01 Juin 2018
#### Page controllers/Commande/commande.php:
#### Gestion des donnée de la commande
################################################################################

include 'models/CommandeManager.php';

session_start();
$commandeManager = new CommandeManager();
$userLogin = $_SESSION['user_name'];
$user = $commandeManager->getUserByLogin($userLogin);
// attribution de l'id de l'utilisateur a une variable
foreach($user as $value){
    $iduser = $value['idUser'];
}
$Panieruser = $commandeManager->getPanierByUserId($iduser);
if(isset($_POST['continuer'])){
    if(isset($_POST['payment'])){
        $PayementMethod=$_POST['payment'];
        $NumberOrder=time();
        $Date=Date("Y-m-d");
        $State= 0;
        $PayementState= 0;
        foreach($Panieruser as $value){
            $Fk_Cart=$value['idCart'];
            $Orderuser= $commandeManager->setNewOrder($Date, $NumberOrder, $State, $PayementMethod, $PayementState, $Fk_Cart);
            $UpdatePanier= $commandeManager->updateValuePanier($Fk_Cart);
        }
    header("location:index.php?controller=User&action=AllCommande");
    }
}else if(isset($_POST['annuler'])){
    header("location:index.php?controller=Cart&action=bdd");
}
$aside = $commandeManager->getCategoryName();

include 'views/aside.php';
include 'views/Commande/commande.php';