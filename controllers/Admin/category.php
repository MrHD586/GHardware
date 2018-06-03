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
    
    //Lien Adminbrand "refresh"
    $refresh ="location:index.php?controller=Admin&action=category";
    
    
    // ---- PARAMETRES URL ---- //
    
    //paramêtre utile pour l'affichage des inactifs
    $inactiveParam = $_GET['inactive'];
    
    //paramêtre utile pour la modification d'une marque
    $modifParam = $_GET['modif'];
    
    //paramêtre utile pour la modification d'une marque
    $archiveParam = $_GET['archive'];
    
    
    
    //Si l'utilisateur n'est pas un admin il se fait rediriger sur la page home
    if($sessionAdminUser != TRUE){
        header($redirectToHome);
        
    }else{
        //tableau contenant les erreurs
        $errors = array();
        
        //instantiation de la classe CategoryManager
        $categoryManager = new CategoryManager();
        
        
        //--- PAGINATION ---//
        
        define("ROW_PER_PAGE",5);
        
        $search_keyword = '';
        if(isset($_POST['search']['keyword'])){
            $search_keyword = $_POST['search']['keyword'];
            $_SESSION["ar_CreationSucces"] = NULL;
        }
        
        $per_page_html = '';
        $page = 1;
        $start =0;
        
        
        if(isset($_POST["page"])) {
            $page = $_POST["page"];
            $start = ($page-1) * ROW_PER_PAGE;
            $_SESSION["ar_CreationSucces"] = NULL;
        }
        
        $limit =" limit " . $start . "," . ROW_PER_PAGE;
        
        //Défini la liste à afficher dans le tableau selon le paramêtre dans l'url (actif ou inactif)
        if($inactiveParam == TRUE){
            $pagination_statement = $categoryManager->searchInactiveCategory($search_keyword);
            $pdo_statement = $categoryManager->searchInactiveCategory($search_keyword, $limit);
        }else{
            $pagination_statement = $categoryManager->searchActiveCategory($search_keyword);
            $pdo_statement = $categoryManager->searchActiveCategory($search_keyword, $limit);
        }
        
        $row_count = $pagination_statement->rowCount();
        $result = $pdo_statement->fetchAll();
        
        
        //--- Envois Formulaire ---//
        
        //si le formulaire est envoyé
        if(isset($_POST['submit'])){
            $categoryId = $_POST['hiddenId'];
            $categoryName = $_POST['Name'];
            $categoryIsActive = $_POST['isActive'];
            
            //si un champ est vides
            if(empty($categoryName)){
                $errors[] = "Veuillez remplir tous les champs";
            }else{                       
                if(empty($categoryId) || $categoryId == NULL){
                    //recherche d'un category name correspondant au category name entré
                    $checkByCategoryName = $categoryManager->categoryNameExists($categoryName);
                
                    //si le nom est égal au nom retourné par la requête
                    if($checkByCategoryName == TRUE){
                        $errors[] = "Le nom de catégorie est déjà utilisé";
                    }
                }
            }
            
            //array_filter() permet d'utiliser ensuite empty() sur le tableau d'erreurs
            $errorsArray = array_filter($errors);
            
            //s'il y a une/des d'erreur/s
            if(!empty($errorsArray)){
                //valeurs pour repopuler le formulaire
                $formCategoryIdValue = $categoryId;
                $formCategoryNameValue = $categoryName;
                
                //message de confirmation de la création -> vide
                $_SESSION["cat_CreationSucces"] = null;
            }else{
                //si l'on est en modif
                if(!empty($categoryId) || $categoryId != NULL){
                    //requête pour la création de la category
                    $categoryManager->modifyCategoryById($categoryId, $categoryName, $categoryIsActive);
                    
                    $_SESSION["cat_CreationSucces"] = "<p style='color:green;'>Catégorie modifiée !</p>";
                    header($refresh);
                    
                }else{
                    //requête pour la création de la marque
                    $categoryManager->setNewCategory($categoryName, $categoryIsActive);
                    $_SESSION["cat_CreationSucces"] = "<p style='color:green;'>Catégorie ajoutée !</p>";
                    header($refresh);
                }
            }
        }
        
        
        //ÉDITION
        if($modifParam != NULL && !empty($modifParam) && !isset($_POST['submit'])){
            $categoryToModify = $categoryManager->getCategoryById($modifParam);
            
            foreach($categoryToModify as $val){
                $formCategoryIdValue = $val['idCategory'];
                $formCategoryNameValue = $val['CName'];
            }
        }
        
        
        //ARCHIVAGE
        if($archiveParam != NULL && !empty($archiveParam) && $inactiveParam == NULL){
            $categoryManager->setCategoryInactiveById($archiveParam);
            header($refresh);
        }
        
        
        include 'views/Admin/category.php';
    }
