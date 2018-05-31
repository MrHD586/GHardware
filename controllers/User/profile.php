<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 24 Mai 2018
    #### Page controllers/User/profile.php:
    #### 		  Gestions des données de la page profile
    ################################################################################
   
    include 'models/ProfileManager.php';
    
    
    $profileManager = new ProfileManager();
    $aside = $profileManager->getCategoryName();
    
    include 'views/aside.php';
    include 'views/User/profile.php';