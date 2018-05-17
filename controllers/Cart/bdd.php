<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 05 mai 2018
#### Page controllers/Cart/bdd.php:
#### Gestions des données du panier
################################################################################

    include 'models/CartDbManager.php';

    session_start();

    $panierBddManager = new CartDbManager();
    $aside = $panierBddManager->getCategories();
    $userLogin = $_SESSION['user_name'];
    $idarticle=$_GET['id'];
    $categorie=$_GET['categorie'];
    $ArticleNombre=0;
    
    //function pour compter les éléments du panier
    function Compteur($iduser, $ArticleNombre, $panierBddManager){
        $articlesarrays = $panierBddManager->getPanier($iduser);
        
            foreach($articlesarrays as $value){
                $nb=$value['PNombre'];
                $ArticleNombre+=$nb;
            }
            
        $_SESSION['nbarticle'] = $ArticleNombre;
    }

    $user = $panierBddManager->getUserName($userLogin);
    
    foreach($user as $value){
        $iduser = $value['idUser'];
    }
    
    $Nb = $panierBddManager->getNombreArticles($iduser,$idarticle);
    
    foreach($Nb as $value){
        $PNombre= $value['PNombre'];
    }

    if(isset($_GET['id'])){
        
        if($PNombre==NULL){
            $PNombre++;
            $addarticles = $panierBddManager->setNewPanier($idarticle, $iduser, $PNombre);
        }else{
            $PNombre++;
            $updatenombre = $panierBddManager->updateValuePanier($iduser, $idarticle, $PNombre);
            
        }

    Compteur($iduser, $ArticleNombre, $panierBddManager);
    
        if(isset($_GET['categorie'])){
            header("location:index.php?controller=Categorie&action=list&categorie=$categorie");
        }else{
            header("location:index.php?controller=Article&action=article&id=$idarticle");
        }
    }else{
        
        $articlesarray = $panierBddManager->getPanier($iduser);
        $i=0;
        
        foreach($articlesarray as $value){
            $articles[$i] = $value['Fk_Articles'];
            $nombre[''.$articles[$i].''] = $value['PNombre'];
            $i++;
        }
        
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