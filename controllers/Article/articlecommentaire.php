<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Page controllers/Article/list.php:
    #### 		  Gestions des données des articles et des commentaires
    ################################################################################
    
    include 'models/ArticleManager.php';
    
    $idarticle =$_GET['id'];
    
    $articlesManager = new ArticleManager();
    
    $articles = $articlesManager->getArticleById($idarticle);
    
    $aside = $articlesManager->getCategoriesNames();
    
    $Commentaire = $articlesManager->getArticleCommentaireByID($idarticle);
   
    $error=$_GET['error'];
    
    foreach($Commentaire as $value){
        $id = $value['idT_Commentaire'];
        $Utilisateurid = $value['Fk_User'];
        $UtilisateurName = $articlesManager->getUserById($Utilisateurid);
        
        foreach($UtilisateurName as $values){
            $NomUtilisateur[$id] = $values['ULogin'];
        } 
    }
    
    include 'views/aside.php';
    include 'views/Article/article.php';