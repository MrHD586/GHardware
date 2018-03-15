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
    
    if(isset($_COOKIE["Panier"])){
        $tempPanier= unserialize($_COOKIE["Panier"]);
        array_push($tempPanier,$Panier);
        setcookie("Panier",serialize($tempPanier));
        header($urlToarticle);
    }else{
        $PanierA[0] = $id;
        setcookie("Panier",serialize($PanierA));
        header($urlToarticle);
    }