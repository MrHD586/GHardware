<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 30 Mai 2018
    #### Page controllers/Admin/article.php:
    #### 	  Page de managment des articles avec formulaire et tableau
    ################################################################################
    
    //include de la classe ArticleManager
    include("models/ArticleManager.php");
        
    //On va chercher le fichier php qui contient le code pour mettre à jour le flux RSS
    include_once("url_relative/UpdateRss.php");
    
    //Variable contenant le paramêtre de session 'userIsAdmin'
    $sessionAdminUser = $_SESSION['userIsAdmin'];
    
    //Lien Home
    $redirectToHome = "location:index.php?controller=Site&action=home";
    
    //Lien AdminArticle "refresh"
    $refresh ="location:index.php?controller=Admin&action=article";
    
    
    
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
        
       
        //instantiation de la classe Article Manager
        $articleManager = new ArticleManager();              
        
        //catégories pour le Select
        $categoryNameSelect = $articleManager->getCategory();
        
        //marques pour le Select
        $brandNameSelect = $articleManager->getBrand();
        
        //image pour le Select
        $picArticleSelect = $articleManager->getImageArticle();
          
      
        
    
        
        
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
        
        
        
        
        
        //--- Envois Formulaire ---//
        
        //si le formulaire est envoyé
        if(isset($_POST['submit'])){
            
            $articleId = $_POST['hiddenId'];
            $articleName = $_POST['Name'];
            $articleStock = $_POST['Stock'];
            $articlePrice = $_POST['Price'];
            $articleDescription = $_POST['Description'];
            $articleCategory = $_POST['Category'];
            $articleBrand = $_POST['Brand'];
            $articlePicArticle = $_POST['PicArticle'];
            $articleIsActive = $_POST['isActive'];
            
            
            //si un champ est vide
            if(empty($articleName) || empty($articleStock) || empty($articlePrice) || empty($articleDescription) || 
               $articleCategory == "0" || $articleBrand == "0" || $articlePicArticle == "0"){
                
                $errors[] = "Veuillez remplir tous les champs";
                
            }else{
                if(empty($articleId) || $articleId == NULL){
                    //recherche d'un article name correspondant à l'article name entré
                    $checkByArticleName = $articleManager->articleNameExists($articleName);
                    
                    //si le nom est égal au nom retourné par la requête
                    if($checkByArticleName == TRUE){
                        $errors[] = "Le nom d'article est déjà utilisé";
                    }
                }
                
                //si le stock ne contient pas que des chiffres
                if(!preg_match('/^[0-9]+$/', $articleStock)){
                    $errors[] = "Le stock doit contenir uniquement des chiffres";
                }
                
                //si le prix ne contient pas que des chiffres
                if(!preg_match('/^[0-9]+$/', $articlePrice)){
                    $errors[] = "Le prix doit contenir uniquement des chiffres";
                }
            }
            
            //array_filter() permet d'utiliser ensuite empty() sur le tableau d'erreurs
            $errorsArray = array_filter($errors);
            
            //s'il y a une/des d'erreur/s
            if(!empty($errorsArray)){
                //valeurs pour repopuler le formulaire
                $formArticleIdValue = $articleId;
                $formArticleNameValue = $articleName;
                $formArticleStockValue = $articleStock;
                $formArticlePriceValue = $articlePrice;
                $formArticleDescriptionValue = $articleDescription;
                $formArticleCategoryValue = $articleCategory;
                $formArticleBrandValue = $articleBrand;
                $formArticlePicArticleValue = $articlePicArticle;
                
                //message de confirmation de la création -> vide
                $_SESSION["ar_CreationSucces"] = NULL;
                
            }else{
                //si l'on est en modif
                if(!empty($articleId) || $articleId != NULL){
                    //requête pour la création de l'article
                    $articleManager->modifyArticleById($articleId, $articleName, $articleStock, $articlePrice, $articleDescription,
                                                   $articleCategory, $articleBrand, $articlePicArticle, $articleIsActive);
                    
                    $_SESSION["ar_CreationSucces"] = "<p style='color:green;'>Article modifié !</p>";
                    header($refresh);
                }else{
                    //requête pour la création de l'article
                    $articleManager->setNewArticle($articleName, $articleStock, $articlePrice, $articleDescription,
                                                                        $articleCategory, $articleBrand, $articlePicArticle, $articleIsActive);
                    $_SESSION["ar_CreationSucces"] = "<p style='color:green;'>Article ajouté !</p>";
                   
                    
                    //--- RSS ---//
                    $rssTitle = $articleName;
                    $rssLink = $articleManager->getArticleIdByName($articleName);
                    $rssGuid = time();
                    $rssDescription = $articleDescription;
                    $rssPubDate = Date("Y-m-d H:i:s");
                    
                    $articleManager->insertRss($rssTitle, $rssLink, $rssGuid, $rssDescription, $rssPubDate);
                 
                    //On appelle la fonction de mise à jour du fichier
                    update_fluxRSS();
                    header($refresh);
                }
            }
        }
        
        
        
        //ÉDITION
        if($modifParam != NULL && !empty($modifParam) && !isset($_POST['submit'])){
            $articleToModify = $articleManager->getArticleByIdAndImage($modifParam);
            
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
        
        
        
               
        include 'views/Admin/article.php';
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
   
    
