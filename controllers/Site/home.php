<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 F�vrier 2018
    #### Page controllers/Article/list.php:
    #### 		  Gestions des donn�es de la page home
    ################################################################################
   
    include 'models/HomeManager.php';
    
    session_start();
    
    $homeManager = new HomeManager();
    $aside = $homeManager->getCategories();
    include 'views/aside.php';
    include 'views/Site/home.php';