<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 05 mai 2018
#### Page controllers/Cart/bdd.php:
#### Gestions des données du panier
################################################################################

include 'models/PanierBddManager.php';

session_start();

$panierBddManager = new PanierBddManager();

$userLogin = $_SESSION['user_name'];

$user = $panierBddManager->getUserName($userLogin);
foreach($user as $value){
    $iduser = $value['idUser'];
}

$articlesarray = $panierBddManager->getPanier($iduser);
$i=0;
foreach($articlesarray as $value){
$articles[$i]=$value;
$i++;  
}
$Nombre = array_count_values($articles);
//déduplication du tableaux pour avoir le nombre d'article
$articlesNoDouble = array_unique($articles);
//pour chaque articles présent dans le tableau
foreach($articlesNoDouble as $value){
    //stockage de l'id d'article pour l'indexation et la requète db
    $index = $value;
    //stockage du nombre du même articles voulu avec l'id de l'articles pour le retrouver facilement
    $articlesNb[$index] = $Nombre[$index];
    //stockage des donnée de la db sur l'article avec l'id de l'articles pour le retrouver facilement
    $articles[$index] = $panierBddManager->getArticlesbdd($index);
}
include 'views/Cart/cartbdd.php';