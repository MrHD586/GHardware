<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Page controllers/Admin/home.php:
    #### 		  Page d'accueil pour l'administration
    ################################################################################
    
    session_start();
    
    //Variable contenant le paramêtre de session 'userIsAdmin'
    $sessionAdminUser = $_SESSION['userIsAdmin'];
    
    //Lien Home
    $redirectToHome = "location:index.php?controller=Site&action=home";
    
    if($sessionAdminUser == TRUE){
        include 'views/Admin/home.php';    
    }else{
        header($redirectToHome);
    }
