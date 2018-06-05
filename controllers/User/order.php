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
        $FirstName = $valueuser['FirstName'];
        $LastName = $valueuser['LastName'];
        $Road =$valueuser['Road'];
        $NPA = $valueuser['NPA'];
        $Town = $valueuser['Town'];
    }
    $articles=$commandeManager->getArticle();
    $order = $commandeManager->getOrder($iduser,$NumberOrder);
    include 'views/User/commande.php';