<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 03 février 2018
#### Page controllers/Cart/CookieToBdd.php:
#### 		  Gestions des données des articles
################################################################################

include 'models/CartManager.php';

session_start();

$userLogin = $_SESSION['user_name'];
$newPanier;
$panierManager = new CartDbManager();

$user = $panierManager->getUserName($userLogin);
foreach($user as $value){
     $iduser = $value['idUser'];
}
$cookie = unserialize($_COOKIE['Panier']);
$nombre = array_count_values($cookie);
$cookienodouble = array_unique($cookie);
foreach($cookienodouble as $value){
$idarticle = $value;
$nombredb = $nombre[''.$value.''];
$PanierCreationDb = $panierManager->setNewPanier($idarticle, $iduser, $nombredb);
}
setcookie('Panier',serialize($newPanier));
header('location:index.php');
?>