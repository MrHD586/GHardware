<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 08 Mai 2018
    #### Page controllers/Admin/category.php:
    #### 	  Page de managment des categories avec formulaire et tableau
    ################################################################################
    
    //include de la classe DbManager
    include("models/CategoryManager.php");
        
    //tableau contenant les erreurs
    $errors = array();
    
    //si le formulaire est envoyé
    if(isset($_POST['submit'])){
        
        $categoryName = $_POST['Name'];
        $categoryIsActive = $_POST['isActive'];
        
        //si un champ est vides
        if(empty($categoryName)){
            $errors[] = "Veuillez remplir tous les champs";
        }else{                       
            //instantiation de la classe CategoryManager
            $categoryManager = new CategoryManager();
            
            //recherche d'un user name correspondant au login entré
            $checkByCategoryName = $categoryManager->categoryExists($categoryName);
            
            //si le nom est égal au nom retourné par la requête
            if($checkByCategoryName == TRUE){
                $errors[] = "Le nom de catégorie est déjà utilisé";
            }
        }
        
        //array_filter() permet d'utiliser ensuite empty() sur le tableau d'erreurs
        $errorsArray = array_filter($errors);
        
        //s'il y a une/des d'erreur/s
        if(!empty($errorsArray)){
            //valeurs pour repopuler le formulaire
            $formCategoryNameValue = $categoryName;
            
            //message de confirmation de la création -> vide
            $_SESSION["cat_CreationSucces"] = null;
            
        }else{
            //requête pour la création de la category
            $categoryCreationDb = $categoryManager->setNewCategory($categoryName, $categoryIsActive);
            $_SESSION["cat_CreationSucces"] = "<p style='color:green;'>Catégorie ajoutée !</p>";
        }
    }
    
    include 'views/Admin/category.php';
