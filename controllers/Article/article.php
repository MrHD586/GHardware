<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Page controllers/Article/list.php:
    #### 		  Gestions des données des articles
    ################################################################################
    
    include 'models/ArticleManager.php';
    
    session_start();
    
    $idarticle =$_GET['id'];
    $articlesManager = new ArticleManager();
    
    $articles = $articlesManager->getArticles($idarticle);
    
    $aside = $articlesManager->getCategories();
    
    include 'views/aside.php';
    include 'views/Article/article.php';