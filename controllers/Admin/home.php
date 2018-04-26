<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Page controllers/Admin/home.php:
    #### 		  Page d'accueil pour l'administration
    ################################################################################
    
    include 'models/AdminPageManager.php';

    session_start();
    
    $adminPageManager = new AdminPageManager();
    
    //Variable contenant le paramêtre de session 'userIsAdmin'
    $sessionAdminUser = $_SESSION['userIsAdmin'];
    
    //Lien Home
    $redirectToHome = "location:index.php?controller=Site&action=home";
    
    //aside
    $aside = $adminPageManager->getCategories();
    
    if($sessionAdminUser == TRUE){
        include 'views/aside.php';
        include 'views/Admin/home.php';    
    }else{
        header($redirectToHome);
    }
