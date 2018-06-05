<?php
include 'models/OrderManager.php';
    session_start();
    //récuperation du nom d'utilisateur
    $userLogin = $_SESSION['user_name'];
    //récuperation du numero de commande
    $NumberOrder = $_GET['commande'];
    $commandeManager = new OrderManager();
    //récuperation des donnée utilisateur par rapport a son nom
    $user = $commandeManager->getUserByLogin($userLogin);
    // attribution des valeurs utilisateur a des variables
    foreach($user as $valueuserid){
        $iduser = $valueuserid['idUser'];
        $FirstName = $valueuserid['FirstName'];
        $LastName = $valueuserid['LastName'];
        $Road =$valueuserid['Road'];
        $NPA = $valueuserid['NPA'];
        $Town = $valueuserid['Town'];
    }
    //récuperation des donnée de tout les articles
    $articles=$commandeManager->getArticle();
    //récuperation des donnée de la commande par rapport a l'utilisateur et du numero de commande
    $order = $commandeManager->getOrder($iduser,$NumberOrder);
    include 'views/User/commande.php';