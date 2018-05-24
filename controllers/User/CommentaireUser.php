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
foreach($Commentaire as $value){
    $idCommentaire=$value['idT_Commentaire'];
    $idarticle=$value['Fk_Article'];
    
    $article = $articlesManager->getArticles($idarticle);
    foreach ($article as $value){
        $article[$idCommentaire] = $value['	AName'];
    }
    
}
include 'views/aside.php';
include 'views/User/commentaire.php';