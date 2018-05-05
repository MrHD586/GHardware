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
echo $cookie;
foreach($cookie as $value){
echo 'cc';
$idarticle = $value;
$PanierCreationDb = $panierManager->setNewPanier($idarticle, $iduser);
}
setcookie('Panier',serialize($newPanier));

?>