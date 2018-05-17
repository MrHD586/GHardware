<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 15 Mai 2018
    #### Page controllers/Admin/article.php:
    #### 	  Page de managment des articles avec formulaire et tableau
    ################################################################################
    
    //include de la classe ArticleManager
    include("models/ArticleManager.php");
    
    //tableau contenant les erreurs
    $errors = array();
    
    //si le formulaire est envoyé
    if(isset($_POST['submit'])){
        
        $articleName = $_POST['Name'];
        $articleIsActive = $_POST['isActive'];
        
        //si un champ est vides
        if(empty($articleName)){
            $errors[] = "Veuillez remplir tous les champs";
        }else{
            //instantiation de la classe CategoryManager
            $articleManager = new ArticleManager();
            
            //recherche d'un article name correspondant au article name entré
            $checkByArticleName = $articleManager->articleExists($articleName);
            
            //si le nom est égal au nom retourné par la requête
            if($checkByArticleName == TRUE){
                $errors[] = "Le nom de catégorie est déjà utilisé";
            }
        }
        
        //array_filter() permet d'utiliser ensuite empty() sur le tableau d'erreurs
        $errorsArray = array_filter($errors);
        
        //s'il y a une/des d'erreur/s
        if(!empty($errorsArray)){
            //valeurs pour repopuler le formulaire
            $formArticleNameValue = $articleName;
            
            //message de confirmation de la création -> vide
            $_SESSION["ar_CreationSucces"] = null;
            
        }else{
            //requête pour la création de l'article
            $articleCreationDb = $articleManager->setNewArticle($articleName, $articleIsActive);
            $_SESSION["ar_CreationSucces"] = "<p style='color:green;'>Catégorie ajoutée !</p>";
        }
    }
    
    include 'views/Admin/article.php';
