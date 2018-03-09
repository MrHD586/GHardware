<?php
################################################################################
#### Auteur : Butticaz Yvann
#### Date : 27 F�vrier 2018
#### Page controllers/Article/list.php:
#### 		  Gestions des donn�es des articles
################################################################################

include 'models/CategorieManager.php';

$categorieManager = new CategorieManager();

$Categoriearticles = $categorieManager->getArticlesCategorie($Categorie);

$aside = $categorieManager->getCategories();

include 'views/aside.php';
include 'views/Article/CategorieList.php';