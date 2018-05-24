<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 24 mai 2018
#### Page controllers/User/CommentaireUser.php:
#### 		  Gestions des données des commentaires
################################################################################

include 'models/ArticleManager.php';

session_start();

$articlesManager = new ArticleManager();
$UtilisateurName=$_SESSION['user_name'];
$aside = $articlesManager->getCategoriesName();

$user = $articlesManager->getidUserName($UtilisateurName);

foreach($user as $value){
    $iduser = $value['idUser'];
}

$Commentaire = $articlesManager->getuserCommentaire($iduser);
include 'views/aside.php';
include 'views/User/commentaire.php';