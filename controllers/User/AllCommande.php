<?php
    include 'models/OrderManager.php';
    
    session_start();
    
    $commandeManager = new OrderManager();
    //récuperation du nom d'uilisateur
    $userLogin = $_SESSION['user_name'];
    //récuperation des donnée de l'utilisateur par rapport au nom
    $user = $commandeManager->getUserByLogin($userLogin);
    
    // attribution de l'id de l'utilisateur a une variable
    foreach($user as $value){
        $iduser = $value['idUser'];
    
    }
    //récuperation des donnée de la table Order et Cart par rapport a l'id de l'utilisatuer
    $Order = $commandeManager->getAllOrder($iduser);
    //récuperation du nom des category
    $aside = $commandeManager->getCategoryName();
    
    include 'views/aside.php';
    include 'views/User/commandelist.php';