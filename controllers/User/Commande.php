<?php
include 'models/CommandeManager.php';
    session_start();
    $NumberOrder = $_POST['commande'];
    $commandeManager = new CommandeManager();
    $user = $commandeManager->getUserByLogin($userLogin);
    // attribution de l'id de l'utilisateur a une variable
    foreach($user as $value){
        $iduser = $value['idUser'];
    }
    $articles=$commandeManager->getArticle();
    $order = $commandeManager->getOrder($iduser,$NumberOrder);
    include 'views/User/commande.php';