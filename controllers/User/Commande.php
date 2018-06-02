<?php
include 'models/CommandeManager.php';
    session_start();
    $userLogin = $_SESSION['user_name'];
    $NumberOrder = $_GET['commande'];
    $commandeManager = new CommandeManager();
    $user = $commandeManager->getUserByLogin($userLogin);
    // attribution de l'id de l'utilisateur a une variable
    foreach($user as $value){
        $iduser = $value['idUser'];
    }
    $articles=$commandeManager->getArticle();
    $order = $commandeManager->getOrder($NumberOrder);
    include 'views/User/commande.php';