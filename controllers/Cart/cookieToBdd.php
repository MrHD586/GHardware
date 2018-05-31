<?php
    ################################################################################
    #### Auteur : Viquerat Killian
    #### Date : 03 février 2018
    #### Page controllers/Cart/CookieToBdd.php:
    #### 		  Gestions des données des articles
    ################################################################################
    
    include 'models/CartDbManager.php';
    
    session_start();
    
    //Variable contenant le paramêtre de session 'userIsAdmin'
    $sessionAdminUser = $_SESSION['userIsAdmin'];
    
    //Lien Home
    $redirectToHome = "location:index.php?controller=Admin&action=home";
    
    //si l'utilisateur est un admin, il ne peut pas accéder au panier
    if($sessionAdminUser == TRUE){
        header($redirectToHome);
        
    //variable pour l'état d'être une commande ou non
    $isCommande=0;
    }else{
        //recuperation du nom d'utilisateur
        $userLogin = $_SESSION['user_name'];
        $newPanier;
        $panierManager = new CartDbManager();
        //recuperation des information de l'utilisateur connecter
        $user = $panierManager->getUserByLogin($userLogin);
        // attribution de l'id de l'utilisateur a une variable
        foreach($user as $value){
             $iduser = $value['idUser'];
        }
        //recuperation du cookie panier hors ligne
        $cookie = unserialize($_COOKIE['Panier']);
        //comptage du nombre de valeur dans le panier
        $nombre = array_count_values($cookie);
        //suppresion de toute les valeurs doubles
        $cookienodouble = array_unique($cookie);
        //for pour attribuer les différente valeur du panier a des variables
        foreach($cookienodouble as $value){
            $idarticle = $value;
            $nombredb = $nombre[''.$value.''];
            //ajout des données du panier cookie a la db
            $PanierCreationDb = $panierManager->setNewPanier($idarticle, $iduser, $nombredb,  $isCommande);
        }
        //suppresion du cookie utilisé pour le panier hors ligne
        setcookie('Panier',serialize($newPanier));
        header('location:index.php?controller=Cart&action=bdd');
    }
