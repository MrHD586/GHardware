<?php
include 'models/OrderManager.php';
    session_start();
    $userLogin = $_SESSION['user_name'];
    $NumberOrder = $_GET['commande'];
    $commandeManager = new OrderManager();
    $user = $commandeManager->getUserByLogin($userLogin);
    // attribution de l'id de l'utilisateur a une variable
    foreach($user as $valueuserid){
        $iduser = $valueuserid['idUser'];
        $FirstName = $valueuserid['FirstName'];
        $LastName = $valueuserid['LastName'];
        $Road =$valueuserid['Road'];
        $NPA = $valueuserid['NPA'];
        $Town = $valueuserid['Town'];
    }
    $articles=$commandeManager->getArticle();
    $order = $commandeManager->getOrder($iduser,$NumberOrder);
    include 'views/User/commande.php';