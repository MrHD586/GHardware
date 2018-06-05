<?php
    ################################################################################
    #### Auteur : Viquerat Killian
    #### Date : 27 Février 2018
    #### Page controllers/Article/list.php:
    #### 		  Gestions des données des articles et des commentaires
    ################################################################################
    
    include 'models/ArticleManager.php';
    //déclaration des variable
    $idarticle =$_GET['id'];
    $articlesManager = new ArticleManager();
    //récuperation des donnée pour les articles et leur image
    $articles = $articlesManager->getArticleByIdAndImage($idarticle);
    //récuperation des donnée pour les noms des category
    $aside = $articlesManager->getCategoryName();
    //récuperation des donnée pour les commentaire de l'article
    $Commentaire = $articlesManager->getArticleCommentByID($idarticle);
    //Reprise de la valeur error pour savoir si le champ text commentaire a été rempli
    $error=$_GET['error'];
    //For pour assigner les valeur récuperer des commentaire a des variable
    foreach($Commentaire as $value){
        $id = $value['idComment'];
        //assignation de la valeur de la clé étrangère a la variable utilisateurid
        $Utilisateurid = $value['Fk_User'];
        //avec la variable utilisateurif on va pouvoir aller récuperer le nom de l'utilisateur et la photo de l'utilisateur qui a écrit le commentaire
        $UtilisateurName = $articlesManager->getUserByIdAndImage($Utilisateurid);
        //for pour assigner les valeur récuperer de l'utilisateur
        foreach($UtilisateurName as $values){
            //assignation du login de l'utilisateur dans un tableau avec l'index de l'id du commentaire pour le retrouver ensuite
            $NomUtilisateur[$id] = $values['Login'];
            //assignation de l'image de l'utilisateur dans un tableau avec l'index de l'id du commentaire pour le retrouver ensuite
            $UserImage[$id]=$values['Link'];
        } 
    }
    
    include 'views/aside.php';
    include 'views/Article/article.php';