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

$searchManager = new SearchManager();

$articles = $searchManager->Search($article);

$aside = $searchManager->getCategoriesName();

include 'views/aside.php';
include 'views/Article/categoryList.php';