<?php
<<<<<<< HEAD
    ################################################################################
    #### Auteur : Viquerat killian
    #### Date : 28 mai 2018
    #### Page controllers/Search/search.php:
    #### 		  Gestions des données des articles pour les recherches
    ################################################################################
    
    include 'models/SearchManager.php';
    
    session_start();
    
    $article =$_POST['search'];
    
    $searchManager = new SearchManager();
    
    $Categoriearticles = $searchManager->Search($article);
    
    $aside = $searchManager->getCategoryName();
    
    include 'views/aside.php';
    include 'views/Search/search.php';
=======
################################################################################
#### Auteur : Viquerat killian
#### Date : 28 mai 2018
#### Page controllers/Search/search.php:
#### 		  Gestions des données des articles pour les recherches
################################################################################

include 'models/SearchManager.php';

session_start();

$article =$_POST['search'];

$searchManager = new SearchManager();

$Categoriearticles = $searchManager->Search($article);

$aside = $searchManager->getCategoriesName();
$asides = $searchManager->getCategoriesNameAll();

include 'views/aside.php';
include 'views/Search/search.php';
>>>>>>> a9f0f4384a9fdbd1f048de5e67de0b45bb887c19
