<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 08 Mai 2018
    #### Page controllers/Admin/category.php:
    #### 	  Page de managment des categories avec formulaire et tableau
    ################################################################################
    
    //include de la classe CategoryManager
    include("models/CategoryManager.php");
        
    //Variable contenant le paramêtre de session 'userIsAdmin'
    $sessionAdminUser = $_SESSION['userIsAdmin'];
    
    //Lien Home
    $redirectToHome = "location:index.php?controller=Site&action=home";
    
    //Si l'utilisateur n'est pas un admin il se fait rediriger sur la page home
    if($sessionAdminUser != TRUE){
        header($redirectToHome);
        
    }else{
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
                
                //recherche d'un category name correspondant au category name entré
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
    }
