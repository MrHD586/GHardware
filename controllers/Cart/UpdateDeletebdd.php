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
$articles = $_POST['Articles'];
$userLogin = $_SESSION['user_name'];

$user = $deleteaddcartManager->getUserName($userLogin);
foreach($user as $value){
    $iduser = $value['idUser'];
}
if($_POST['vider']!= NULL){
    $deletepanierbdd = $deleteaddcartManager->deletePanier($iduser);
}else{
    if(isset($_POST[''.$articles.''])){
        $nombrearticles= $_POST[''.$articles.''];
            if($nombrearticles<= 0){
                $deleteartbdd = $deleteaddcartManager->deleteValuePanier($iduser,$articles);
            }else{
                $updateartbdd = $deleteaddcartManager->updateValuePanier($iduser,$articles,$nombrearticles);
            }
    }
}
header("location:index.php?controller=Cart&action=bdd");
