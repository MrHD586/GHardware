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
if(isset($_POST['continuer'])){
    if(isset($_POST['payment'])){
        $payementmethod=$_POST['payment'];
        $NumberOrder=time();
        $Date=Date(Y-m-d);
        //foreach()
        //$Fk_Cart=
    }
}else if(isset($_POST['annuler'])){
    header("location:index.php?controller=Cart&action=bdd");
}
$aside = $commandeManager->getCategoryName();

include 'views/aside.php';
include 'views/Commande/commande.php';