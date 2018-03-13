<?php
    ################################################################################
    #### Auteur : Viquerat Killian
    #### Date : 13 Mars 2018
    #### Page controllers/Cart/cookie.php:
    #### 		
    ################################################################################
    
    $id = $_GET['id'];
    $Panier = $id;
    $urlToarticle = "location:index.php?controller=Article&action=article&id=".$id."";
    
    if(isset($_COOKIE["Panier"])){
        $tempPanier= unserialize($_COOKIE["Panier"]);
        echo $tempPanier[0];
        array_push($tempPanier,$Panier);
        echo $tempPanier[0];
        echo $tempPanier[1];
        setcookie("Panier",serialize($tempPanier));
        //header($urlToarticle);
    }else{
        $PanierA[0] = $id;
        setcookie("Panier",serialize($PanierA));
        header($urlToarticle);
    }