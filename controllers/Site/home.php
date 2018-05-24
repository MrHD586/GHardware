<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Page controllers/Site/home.php:
    #### 		  Gestions des données de la page home
    ################################################################################
   
    include 'models/HomeManager.php';
    
    session_start();
    
    $homeManager = new HomeManager();
    $aside = $homeManager->getCategories();
    include 'views/aside.php';
    include 'views/Site/home.php';