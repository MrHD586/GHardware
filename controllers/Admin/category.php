<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 08 Mai 2018
    #### Page controllers/Admin/category.php:
    #### 	  Page de managment des categories avec formulaire et tableau
    ################################################################################
    
    //include de la classe DbManager
    include("models/CategoryManager.php");
    
    session_start();
    
    // ----- LIEN POUR REDIRECTION ----- //
    $urlToCreation = "location:index.php?controller=Admin&action=category";
    
    //variable d'erreure
    $hasError = NULL;
    
    //si le formulaire est envoyé
    if(isset($_POST['submit'])){
        
        $categoryName = $_POST['Name'];
        
        //si un champ est vides
        if($userLogin == null){
            $_SESSION["cat_ErrorEmptyField"] = "Veuillez remplir tous les champs";
            $hasError = TRUE;
        }else{
            
            $_SESSION["cat_ErrorEmptyField"] = null;
            
            //instantiation de la classe CategoryManager
            $categoryManager = new CategoryManager();
            
            //recherche d'un user name correspondant au login entré
            $checkByCategoryName = $categoryManager->getCategoryName($categoryName);
            
            foreach($checkByCategoryName as $checkByCategoryName){
                $categoryAlreadyExsist = $checkByCategoryName['Ccategorie'];
            }
            
            //si le nom est égal au nom retourné par la requête
            if($categoryName == $categoryAlreadyExsist){
                $_SESSION["cat_ErrorName"] = "Le nom d'utilisateur est déjà utilisé";
                $hasError = TRUE;
            }else{
                $_SESSION["cat_ErrorName"] = null;
            }
            
        }
        
        //s'il y a une/des d'erreur/s
        if($hasError == TRUE){
            $_SESSION["cat_CreationSucces"] = null;
            header($urlToCreation);
        }else{
            //requête pour la création de la category
            $categoryCreationDb = $categoryManager->setNewCategory($categoryName, $categoryIsActive);
            $_SESSION["cat_CreationSucces"] = "<p style='color:green;'>Compte utilisateur créé !</p>";
            header($urlToCreation);
        }
    }
    
    include 'views/Admin/category.php';
