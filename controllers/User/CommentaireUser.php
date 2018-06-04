<?php
    ################################################################################
    #### Auteur : Viquerat Killian
    #### Date : 24 mai 2018
    #### Page controllers/User/CommentaireUser.php:
    #### 		  Gestions des données des commentaires
    ################################################################################
    
    include 'models/ArticleManager.php';
        
    $articlesManager = new ArticleManager();
    $UtilisateurName=$_SESSION['user_name'];
    $aside = $articlesManager->getCategoryName();
    
    $user = $articlesManager->getUserByLogin($UtilisateurName);
    
    foreach($user as $value){
        $iduser = $value['idUser'];
    }
    
    $Commentaire = $articlesManager->getCommentByUserId($iduser);
    foreach($Commentaire as $value){
        $idCommentaire=$value['idComment'];
        $idarticle=$value['Fk_Article'];
        
        $article = $articlesManager->getArticleByIdAndImage($idarticle);
        foreach ($article as $value){
            $article[$idCommentaire] = $value['Name'];
        }
        
    }
    include 'views/aside.php';
    include 'views/User/commentaire.php';