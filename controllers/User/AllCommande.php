<?php
include 'models/CommandeManager.php';
session_start();
$commandeManager = new CommandeManager();
$userLogin = $_SESSION['user_name'];
$user = $commandeManager->getUserByLogin($userLogin);
// attribution de l'id de l'utilisateur a une variable
foreach($user as $value){
    $iduser = $value['idUser'];
}
$Order = $commandeManager->getOrder($iduser);
$aside = $commandeManager->getCategoryName();
include 'views/aside.php';
include 'views/User/commandelist.php';