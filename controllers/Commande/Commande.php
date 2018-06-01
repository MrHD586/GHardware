<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 01 Juin 2018
#### Page controllers/Commande/commande.php:
#### 		  Gestion des donnée de la commande
################################################################################

include 'models/CommandeManager.php';

session_start();

$commandeManager = new CommandeManager();
if(isset($_POST['continuer'])){
    if(isset($_POST['payment'])){
        
    }
}else if(isset($_POST['annuler'])){
    header("location:index.php?controller=Cart&action=bdd");
}
$aside = $commandeManager->getCategoryName();

include 'views/aside.php';
include 'views/Commande/commande.php';