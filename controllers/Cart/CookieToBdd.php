<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 03 février 2018
#### Page controllers/Cart/CookieToBdd.php:
#### 		  Gestions des données des articles
################################################################################

include 'models/PanierManager.php';

session_start();

$userLogin = $_SESSION['user_name'];
$newPanier;
$panierManager = new PanierManager();

$iduser = $panierManager->getUserName($userLogin);
$cookie = unserialize($_COOKIE['Panier']);
foreach($cookie as $value){
$idarticle = $value;
$PanierCreationDb = $panierManager->setNewPanier($idarticle, $iduser);
echo 'cc';
}
setcookie('Panier',serialize($newPanier));

?>