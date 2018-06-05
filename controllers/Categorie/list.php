<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 F�vrier 2018
    #### Page controllers/Article/list.php:
    #### 		  Gestions des donn�es des articles
    ################################################################################
    
    include 'models/CategoryManager.php';
    
    session_start();
    //récuperation de la valeur du get pour savoir qu'elle catégorie a été tiré
    $category = $_GET['categorie'];
    
    $categoryManager = new CategoryManager();
    //récuperation des données des articles et de leur image par rapport a la catégorie
    $CategoryArticle = $categoryManager->getArticleByCategoryNameAndArticleImage($category);
    //récuperation des données des category pour avoir leur nom
    $aside = $categoryManager->getCategoryName();
    
    include 'views/aside.php';
    include 'views/Article/categoryList.php';