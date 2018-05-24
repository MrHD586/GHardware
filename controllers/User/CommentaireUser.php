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
$error=$_GET['error'];
foreach($Commentaire as $value){
    $id=$value['idT_Commentaire'];
    $Utilisateurid=$value['Fk_User'];
    
    
    foreach($UtilisateurName as $values)
    {
        $NomUtilisateur[$id]= $values['ULogin'];
    }
}
include 'views/aside.php';
include 'views/User/commentaire.php';