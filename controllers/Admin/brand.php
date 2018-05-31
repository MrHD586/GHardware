<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 15 Mai 2018
    #### Page controllers/Admin/brand.php:
    #### 	  Page de managment des marques avec formulaire et tableau
    ################################################################################
    
    //include de la classe BrandManager
    include("models/BrandManager.php");
    
    //Variable contenant le paramêtre de session 'userIsAdmin'
    $sessionAdminUser = $_SESSION['userIsAdmin'];
    
    //Lien Home
    $redirectToHome = "location:index.php?controller=Site&action=home";
    
    
    
    // ---- PARAMETRES URL ---- //
    
    //paramêtre utile pour l'affichage des inactifs
    $inactiveParam = $_GET['inactive'];
    
    //paramêtre utile pour la modification d'un article
    $modifParam = $_GET['modif'];
    
    //paramêtre utile pour la modification d'un article
    $archiveParam = $_GET['archive'];
    
    
    
    //Si l'utilisateur n'est pas un admin il se fait rediriger sur la page home
    if($sessionAdminUser != TRUE){
        header($redirectToHome);
        
    }else{
        //tableau contenant les erreurs
        $errors = array();
        
        
        //instantiation de la classe CategoryManager
        $brandManager = new BrandManager();
        
        
        
        
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
            $pagination_statement = $articleManager->searchInactiveArticle($search_keyword);
            $pdo_statement = $articleManager->searchInactiveArticle($search_keyword, $limit);
        }else{
            $pagination_statement = $articleManager->searchActiveArticle($search_keyword);
            $pdo_statement = $articleManager->searchActiveArticle($search_keyword, $limit);
        }
        
        $row_count = $pagination_statement->rowCount();
        $result = $pdo_statement->fetchAll();
        
        
        
        
        
             
                
        //si le formulaire est envoyé
        if(isset($_POST['submit'])){
            
            $brandName = $_POST['Name'];
            $brandIsActive = $_POST['isActive'];
            
            //si un champ est vides
            if(empty($brandName)){
                $errors[] = "Veuillez remplir tous les champs";
            }else{
                //recherche d'un brand name correspondant au brand name entré
                $checkByBrandName = $brandManager->brandNameExists($brandName);
                
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
                header($refresh);
            }else{
                //requête pour la création de la marque
                $brandCreationDb = $brandManager->setNewBrands($brandName, $brandIsActive);
                $_SESSION["br_CreationSucces"] = "<p style='color:green;'>Catégorie ajoutée !</p>";
                header($refresh);
            }
        }
        
        
        
        
        
        //ÉDITION
        if($modifParam != NULL && !empty($modifParam) && !isset($_POST['submit'])){
            $articleToModify = $articleManager->getArticleById($modifParam);
            
            foreach($articleToModify as $val){
                $formArticleIdValue = $val['idArticle'];
                $formArticleNameValue = $val['Name'];
                $formArticleStockValue = $val['Stock'];
                $formArticlePriceValue = $val['Price'];
                $formArticleDescriptionValue = $val['Description'];
                $formArticleCategoryValue = $val['Fk_Category'];
                $formArticleBrandValue = $val['Fk_Brand'];
                $formArticlePicArticleValue = $val['Fk_ImageArticle'];
            }
        }
        
        
        //ARCHIVAGE
        if($archiveParam != NULL && !empty($archiveParam) && $inactiveParam == NULL){
            $articleManager->setArticleInactiveById($archiveParam);
            header($refresh);
        }
        
        
        
        
        
        include 'views/Admin/brand.php';
    }
