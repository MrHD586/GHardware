<?php
################################################################################
#### Auteur : Butticaz Yvann
#### Date : 27 F�vrier 2018
#### Page controllers/Article/list.php:
#### 		  Gestions des donn�es des articles
################################################################################

include 'models/CategorieManager.php';

$categorieManager = new CategorieManager();

$Categoriearticles = $articlesManager->getCategorieArticles();

$aside = $articlesManager->getCategories();

include 'views/ArticlesCategorie.php';
include 'views/Categorie/list.php';