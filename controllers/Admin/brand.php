<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 15 Mai 2018
    #### Page controllers/Admin/brand.php:
    #### 	  Page de managment des marques avec formulaire et tableau
    ################################################################################
    
    //include de la classe BrandManager
    include("models/BrandManager.php");
    
    //tableau contenant les erreurs
    $errors = array();
    
    //si le formulaire est envoyé
    if(isset($_POST['submit'])){
        
        $brandName = $_POST['Name'];
        $brandIsActive = $_POST['isActive'];
        
        //si un champ est vides
        if(empty($brandName)){
            $errors[] = "Veuillez remplir tous les champs";
        }else{
            //instantiation de la classe CategoryManager
            $brandManager = new BrandManager();
            
            //recherche d'un user name correspondant au login entré
            $checkByBrandName = $brandManager->brandExists($brandName);
            
            //si le nom est égal au nom retourné par la requête
            if($checkByBrandName == TRUE){
                $errors[] = "Le nom de catégorie est déjà utilisé";
            }
        }
        
        //array_filter() permet d'utiliser ensuite empty() sur le tableau d'erreurs
        $errorsArray = array_filter($errors);
        
        //s'il y a une/des d'erreur/s
        if(!empty($errorsArray)){
            //valeurs pour repopuler le formulaire
            $formBrandNameValue = $brandName;
            
            //message de confirmation de la création -> vide
            $_SESSION["br_CreationSucces"] = null;
            
        }else{
            //requête pour la création de la category
            $brandCreationDb = $brandManager->setNewBrands($brandName, $brandIsActive);
            $_SESSION["br_CreationSucces"] = "<p style='color:green;'>Catégorie ajoutée !</p>";
        }
    }
    
    include 'views/Admin/brand.php';
