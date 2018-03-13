<?php
    ################################################################################
    #### Auteur : Viquerat Killian
    #### Date : 13 Mars 2018
    #### Page controllers/Cart/cookie.php:
    #### 		
    ################################################################################
    
    $id = $_GET['id'];
    $Panier = array($id);
    $urlToarticle = "location:index.php?controller=Article&action=article&id=".$id."";
    
    if(isset($_COOKIE["Panier"])){
        $tempPanier = $_COOKIE["Panier"];
        array_push($tempPanier, "".$Panier."");
        setcookie("Panier","".$tempPanier."");
        header($urlToarticle);
    }else{
        setcookie("Panier","".$Panier."");
        header($urlToarticle);
    }