<?php
    ################################################################################
    #### Auteur : Viquerat Killian
    #### Date : 24 mai 2018
    #### Page controllers/User/CommentaireUser.php:
    #### 		  Gestions des données des commentaires
    ################################################################################
    
    include 'models/ArticleManager.php';
        
    $articlesManager = new ArticleManager();
    //récuperation du nom d'utilisateur
    $UtilisateurName=$_SESSION['user_name'];
    //récuperation des donnée des catégorie pour avoir leur nom
    $aside = $articlesManager->getCategoryName();
    //récuperation de donnée de l'utilisateur par rapport a son nom
    $user = $articlesManager->getUserByLogin($UtilisateurName);
    // attribution de l'id de l'utilisateur a une variable
    foreach($user as $value){
        $iduser = $value['idUser'];
    }
    //récuperation des commentaire par rapport a l'id de l'utilisateur
    $Commentaire = $articlesManager->getCommentByUserId($iduser);
    //for pour attribuer les valeur des commentaire a des variables
    foreach($Commentaire as $value){
        $idCommentaire=$value['idComment'];
        $idarticle=$value['Fk_Article'];
        //récuperation des donnée de l'articles par rapport a l'id d'article du commentaire
        $article = $articlesManager->getArticleByIdAndImage($idarticle);
        //For pour attrivuer le nom de l'articles a un tableau avec l'index de l'id du coommentaire pour le retrouver facilement
        foreach ($article as $values){
            $article[$idCommentaire] = $values['Name'];
        }
        
    }
    include 'views/aside.php';
    include 'views/User/commentaire.php';