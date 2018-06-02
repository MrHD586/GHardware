<?php
    
    ################################################################################
    #### Auteur : Viquerat killian
    #### Date : 28 mai 2018
    #### Page controllers/Search/search.php:
    #### 		  Gestions des données des articles pour les recherches
    ################################################################################
    
    include 'models/SearchManager.php';
    
    session_start();
    
    $article =$_POST['search'];
    $marque =$_POST['searchmarque'];
    $searchManager = new SearchManager();
    if(isset($_POST['searchmarque'])){
        $Categoriearticles = $searchManager->SearchMarque($marque);
    }else{
        $Categoriearticles = $searchManager->Search($article);
    }
    
    
    $aside = $searchManager->getCategoryName();
    $asides = $searchManager->getCategoryNameAll();
    
    include 'views/aside.php';
    include 'views/Search/search.php';
