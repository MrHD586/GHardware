<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 05 mai 2018
#### Page controllers/Cart/bdd.php:
#### Gestions des données du panier
################################################################################

include 'models/CartDbManager.php';

session_start();

$panierBddManager = new CartDbManager();

$userLogin = $_SESSION['user_name'];

$user = $panierBddManager->getUserName($userLogin);
foreach($user as $value){
    $iduser = $value['idUser'];
}

$articlesarray = $panierBddManager->getPanier($iduser);
$i=0;
foreach($articlesarray as $value){
        $articles[$i] = $value['Fk_Articles'];
        $nombre[''.$articles[$i].''] = $value['PNombre'];
        $i++;
}
foreach($articles as $value){
    //stockage de l'id d'article pour l'indexation et la requète db
    $index = $value;
    //stockage des donnée de la db sur l'article avec l'id de l'articles pour le retrouver facilement
    $articlesbdd[$index] = $panierBddManager->getArticlesbdd($index);
}
include 'views/Cart/cartbdd.php';