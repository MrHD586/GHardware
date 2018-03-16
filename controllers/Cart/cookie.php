<?php
    ################################################################################
    #### Auteur : Viquerat Killian
    #### Date : 13 Mars 2018
    #### Page controllers/Cart/cookie.php:
    ####Création et attribution des id d'articles 		
    ################################################################################
    
    $id = $_GET['id'];
    $Panier = $id;
    $urlToarticle = "location:index.php?controller=Article&action=article&id=".$id."";
    $urlTocategorie = "location:index.php?controller=Categorie&action=list&categorie=".$_GET['categorie']."";
    
    if(isset($_COOKIE["Panier"])){
        $tempPanier = unserialize($_COOKIE["Panier"]);
        array_push($tempPanier,$Panier);
        setcookie("Panier",serialize($tempPanier));
        
        if(isset($_GET['categorie'])){
            header($urlTocategorie);
        }else{
            header($urlToarticle);
        }
    }else{
        $PanierA[0] = $id;
        setcookie("Panier",serialize($PanierA));
      
        if(isset($_GET['categorie'])){
          header($urlTocategorie);
        }else{
         header($urlToarticle);
        }
    }