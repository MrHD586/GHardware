<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 F�vrier 2018
    #### Page controllers/Article/list.php:
    #### 		  Gestions des donn�es des articles
    ################################################################################
    
    include 'models/CategoryManager.php';
    
    session_start();
    
    $categorie = $_GET['categorie'];
    
    $categoryManager = new CategoryManager();
    
    $CategoryArticle = $categoryManager->getArticleByCategoryName($categorie);
    
    $aside = $categoryManager->getCategoryName();
    
    include 'views/aside.php';
    include 'views/Article/categoryList.php';