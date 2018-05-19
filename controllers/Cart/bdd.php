<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 05 mai 2018
#### Page controllers/Cart/bdd.php:
#### Gestions des données du panier
################################################################################

    include 'models/CartDbManager.php';

    session_start();
    //déclaration des variables
    $panierBddManager = new CartDbManager();
    $aside = $panierBddManager->getCategories();
    $userLogin = $_SESSION['user_name'];
    $idarticle=$_GET['id'];
    $categorie=$_GET['categorie'];
    $ArticleNombre=0;
    
    //function pour compter les éléments du panier
    function Compteur($iduser, $ArticleNombre, $panierBddManager){
        //récuperation du panier de l'utilisateur actuelle
        $articlesarrays = $panierBddManager->getPanier($iduser);
            //For pour assigner le nombre d'articles dans une variable pour chaque article présent dans le panier
            foreach($articlesarrays as $value){
                $nb=$value['PNombre'];
                //addition du nombre d'articles dans une variable externe
                $ArticleNombre+=$nb;
            }
        //attribution du nombre d'article total calculé dans la variable de session    
        $_SESSION['nbarticle'] = $ArticleNombre;
    }
    //récuperation des information de l'utilisateur connecter actuellement 
    $user = $panierBddManager->getUserName($userLogin);
    //For pour assigner la value de l'user connecter actuellement
    foreach($user as $value){
        $iduser = $value['idUser'];
    }
    //récuperation du nombre d'articles
    $Nb = $panierBddManager->getNombreArticles($iduser,$idarticle);
    //For pour assigner la value du nombre d'articles
    foreach($Nb as $value){
        $PNombre= $value['PNombre'];
    }
    //Condition pour savoir si la variable get et set dans l'url et donc permettre de différencier l'affichage a l'ajout d'articles dans la db
    if(isset($_GET['id'])){
        //Condition pour savoir si l'articles ajouter et deja dans la db en testant son si il a deja un nombre dans la db 
        if($PNombre==NULL){
            $PNombre++;
            //ajout dans la db de l'article dans le panier de l'utilisateur connecter
            $addarticles = $panierBddManager->setNewPanier($idarticle, $iduser, $PNombre);
        }else{
            $PNombre++;
            //update du nombre deja présent pour cette article a un de plus
            $updatenombre = $panierBddManager->updateValuePanier($iduser, $idarticle, $PNombre);
            
        }

    Compteur($iduser, $ArticleNombre, $panierBddManager);
    //Condition pour savoir ou renvoyer l'utilisateur après l'ajout
        if(isset($_GET['categorie'])){
            //direction la catégorie de l'article
            header("location:index.php?controller=Categorie&action=list&categorie=$categorie");
        }else{
            //direction la page de l'article
            header("location:index.php?controller=Article&action=article&id=$idarticle");
        }
    }else{
        //récuperation des donnée du panier de l'utilisateur connecter
        $articlesarray = $panierBddManager->getPanier($iduser);
        $i=0;
        //for pour assigner les différente valeur de chaque articles du pagnier a des variables
        foreach($articlesarray as $value){
            $articles[$i] = $value['Fk_Articles'];
            $nombre[''.$articles[$i].''] = $value['PNombre'];
            $i++;
        }
        //for pour aller chercher les différente valeur dans la bdd pour chaque article qui se trouve dans le panier 
        foreach($articles as $value){
            //stockage de l'id d'article pour l'indexation et la requète db
            $index = $value;
            $articlesbdd[$index] = $panierBddManager->getArticlesbdd($index);
        }
        
    Compteur($iduser, $ArticleNombre, $panierBddManager);
    //inclusion du fichier des catégorie
    include 'views/aside.php';
    include 'views/Cart/cartbdd.php';
    
}