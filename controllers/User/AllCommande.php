<?php
include 'models/OrderManager.php';
session_start();
$commandeManager = new OrderManager();
$userLogin = $_SESSION['user_name'];
$user = $commandeManager->getUserByLogin($userLogin);
// attribution de l'id de l'utilisateur a une variable
foreach($user as $value){
    $iduser = $value['idUser'];
}
$Order = $commandeManager->getAllOrder($iduser);
$aside = $commandeManager->getCategoryName();
include 'views/aside.php';
include 'views/User/commandelist.php';