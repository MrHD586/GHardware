<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 13 Mars 2018
#### Page controllers/Cart/affichecookie.php:
#### Gestions des données des articles dans le cookie pour le Panier
################################################################################

include 'models/PanierCookieManager.php';
session_start();
$panierCookieManager = new PanierCookieManager();
$Panier = unserialize($_COOKIE['Panier']);
$Nombre = array_count_values($Panier);
$PanierNoDouble = array_unique($Panier);
foreach($PanierNoDouble as $value){
    $index = $value;
    $PanierNb[$index] = $Nombre[$index];
    $articles[$index] = $panierCookieManager->getArticlesCookie($index);
}


$aside = $panierCookieManager->getCategories();

include 'views/aside.php';
include 'views/Cart/cart.php';
