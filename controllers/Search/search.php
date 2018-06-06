<?php
    
    ################################################################################
    #### Auteur : Viquerat killian
    #### Date : 28 mai 2018
    #### Page controllers/Search/search.php:
    #### 		  Gestions des données des articles pour les recherches
    ################################################################################
    
    include 'models/SearchManager.php';
    
    session_start();
    //récuperation de la recherche
    $article =$_POST['search'];
    //récuperation de la recherche par marque
    $marque =$_POST['searchmarque'];
    $searchManager = new SearchManager();
    //condition pour savoir si searchmarque a été set
    if(isset($_POST['searchmarque'])){
        //si il a été set, récuperation des données des articles par rapport à la marque
        $Searcharticles = $searchManager->SearchMarqueAndImageArticle($marque);
    }else{
        //sinon récuperation des données des articles par nom
        $Searcharticles = $searchManager->SearchArticleAndImageArticle($article);
    }
    //récuperation des donnée de category mais seulement le nom
    $aside = $searchManager->getCategoryName();
    //récuperation de toute les donnée de category
    $asides = $searchManager->getCategoryNameAll();
    include 'views/aside.php';
    include 'views/Search/search.php';
