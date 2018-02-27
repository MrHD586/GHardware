<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Page controllers/Article/list.php:
    #### 		  Gestions des données des articles
    ################################################################################
    
    include 'models/ArticleManager.php';
    
    $articlesManager = new ArticleManager();
    $articles = $articlesManager->getArticles();
    
    include 'views/Article/list.php';