<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 10 mai 2018
#### Page controllers/Cart/AddDeletebdd.php:
#### Gestions des données du panier
################################################################################

include 'models/DeleteAddCartManager.php';

session_start();

$deleteaddcartManager = new DeleteAddCartManager();

$userLogin = $_SESSION['user_name'];

$user = $deleteaddcartManager->getUserName($userLogin);
foreach($user as $value){
    $iduser = $value['idUser'];
}
if(isset($_POST[''.$value.''])){
    
}
$deletebdd = $deleteaddcartManager->deleteValuePanier($articles,$iduser);
