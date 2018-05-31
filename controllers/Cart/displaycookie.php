<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 13 Mars 2018
#### Page controllers/Cart/displayCookie.php:
#### Gestions des donn�es des articles dans le cookie pour le Panier
################################################################################
//inclusion du fichier pour les requête a la base de donnée
include 'models/CartCookieManager.php';
session_start();
//initialisation de la class PanierCookieManager
$panierCookieManager = new CartCookieManager();
//recuperation du tableau stocker dans le cookie
$Panier = unserialize($_COOKIE['Panier']);
//recuperation de la valeur dans l'url
$error=$_GET['vide'];
//test pour savoir si le cookie est vide
if(count($Panier)==0){
$Vide=1;
}
//recuperation du nombre de valeur présente dans le tableau
$Nombre = array_count_values($Panier);
//déduplication du tableaux pour avoir le nombre d'article
$PanierNoDouble = array_unique($Panier);
//pour chaque articles présent dans le tableau
foreach($PanierNoDouble as $value){
    //stockage de l'id d'article pour l'indexation et la requète db
    $index = $value;
    //stockage du nombre du même articles voulu avec l'id de l'articles pour le retrouver facilement
    $PanierNb[$index] = $Nombre[$index];
    //stockage des donnée de la db sur l'article avec l'id de l'articles pour le retrouver facilement
    $articles[$index] = $panierCookieManager->getArticlesCookie($index);
}

$aside = $panierCookieManager->getCategoriesName();
//inclusion du fichier des catégorie
include 'views/aside.php';
//inclusion du fichier du panier
include 'views/Cart/cart.php';
