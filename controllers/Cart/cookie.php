<?php
    ################################################################################
    #### Auteur : Viquerat Killian
    #### Date : 13 Mars 2018
    #### Page controllers/Cart/cookie.php:
    ####Création du cookie et ajout des articles sélectionner dans le panier	
    ################################################################################
    //recupère l'id de l'articles et le stock dans la variable id
    $id = $_GET['id'];
    $Panier = $id;
    //url des redirection sois sur l'articles ou la liste des articles par catégorie
    $urlToarticle = "location:index.php?controller=Article&action=article&id=".$id."";
    $urlTocategorie = "location:index.php?controller=Categorie&action=list&categorie=".$_GET['categorie']."";
    //test pour savoir si un cookie a déjà été crée
    if(isset($_COOKIE["Panier"])){
        //récupere l'ancien panier et le stock dans un tableau
        $tempPanier = unserialize($_COOKIE["Panier"]);
        //met a la fin du tableu le nouveau articles rajouté
        array_push($tempPanier,$Panier);
        //refresh du cookie avec les nouvelle valeur ajouté
        setcookie("Panier",serialize($tempPanier));
        //test si un parametre catégorie est mis dans l'url 
        if(isset($_GET['categorie'])){
            //redirection sur la page des articles par categorie
            header($urlTocategorie);
        }else{
            //redirection sur la page de l'article
            header($urlToarticle);
        }
    }else{
        //ajoute l'id de l'articles dans un tableau
        $PanierA[0] = $id;
        //Création du cookie pour la première fois
        setcookie("Panier",serialize($PanierA));
        //test si un parametre catégorie est mis dans l'url 
        if(isset($_GET['categorie'])){
          //redirection sur la page des articles par categorie
          header($urlTocategorie);
        }else{
          //redirection sur la page de l'article
         header($urlToarticle);
        }
    }