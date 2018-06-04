<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 31 Mai 2018
    #### Page controllers/Admin/category.php:
    #### 	  Page de managment des categories avec formulaire et tableau
    ################################################################################
    
    //include de la classe CategoryManager
    include("models/ImageArticleManager.php");
        
    //Variable contenant le paramêtre de session 'userIsAdmin'
    $sessionAdminUser = $_SESSION['userIsAdmin'];
    
    //Lien Home
    $redirectToHome = "location:index.php?controller=Site&action=home";
    
    //Lien Adminbrand "refresh"
    $refresh ="location:index.php?controller=Admin&action=imageArticle";
    
    
    // ---- PARAMETRES URL ---- //
    
    //paramêtre utile pour l'affichage des inactifs
    $inactiveParam = $_GET['inactive'];
    
    //paramêtre utile pour la modification d'une image
    $modifParam = $_GET['modif'];
    
    //paramêtre utile pour la modification d'une image
    $archiveParam = $_GET['archive'];
    
    
    
    //Si l'utilisateur n'est pas un admin il se fait rediriger sur la page home
    if($sessionAdminUser != TRUE){
        header($redirectToHome);
        
    }else{
        //tableau contenant les erreurs
        $errors = array();
        
        //instantiation de la classe ImageArticleManager
        $imageArticleManager = new ImageArticleManager();
        
        
        //--- PAGINATION ---//
        
        define("ROW_PER_PAGE",5);
        
        $search_keyword = '';
        if(isset($_POST['search']['keyword'])){
            $search_keyword = $_POST['search']['keyword'];
            $_SESSION["imgAr_CreationSucces"] = NULL;
        }
        
        $per_page_html = '';
        $page = 1;
        $start =0;
        
        
        if(isset($_POST["page"])) {
            $page = $_POST["page"];
            $start = ($page-1) * ROW_PER_PAGE;
            $_SESSION["imgAr_CreationSucces"] = NULL;
        }
        
        $limit =" limit " . $start . "," . ROW_PER_PAGE;
        
        //Défini la liste à afficher dans le tableau selon le paramêtre dans l'url (actif ou inactif)
        if($inactiveParam == TRUE){
            $pagination_statement = $imageArticleManager->searchInactiveImageArticle($search_keyword);
            $pdo_statement = $imageArticleManager->searchInactiveImageArticle($search_keyword, $limit);
        }else{
            $pagination_statement = $imageArticleManager->searchActiveImageArticle($search_keyword);
            $pdo_statement = $imageArticleManager->searchActiveImageArticle($search_keyword, $limit);
        }
        
        $row_count = $pagination_statement->rowCount();
        $result = $pdo_statement->fetchAll();
        
        
        //--- Envois Formulaire ---//
        
        //si le formulaire est envoyé
        if(isset($_POST['submit'])){
            $imageArticleId = $_POST['hiddenId'];
            $imageArticleLink = $_POST['Link'];
            $imageArticleIsActive = $_POST['isActive'];
            
            //si un champ est vides
            if(empty($imageArticleLink)){
                $errors[] = "Veuillez remplir tous les champs";
            }else{                       
                if(empty($imageArticleId) || $imageArticleId == NULL){
                    //recherche d'un lien correspondant au lien entré
                    $checkByImageArticleLink = $imageArticleManager->imageArticleLinkExists($imageArticleLink);
                
                    //si le nom est égal au nom retourné par la requête
                    if($checkByImageArticleLink == TRUE){
                        $errors[] = "Le lien de l'image est déjà utilisé";
                    }
                }
            }
            
            //array_filter() permet d'utiliser ensuite empty() sur le tableau d'erreurs
            $errorsArray = array_filter($errors);
            
            //s'il y a une/des d'erreur/s
            if(!empty($errorsArray)){
                //valeurs pour repopuler le formulaire
                $formImageArticleIdValue = $imageArticleId;
                $formImageArticleLinkValue = $imageArticleLink;
                $formImageArticleIsActiveValue = $imageArticleIsActive;
                
                //message de confirmation de la création -> vide
                $_SESSION["imgAr_CreationSucces"] = null;
            }else{
                //si l'on est en modif
                if(!empty($imageArticleId) || $imageArticleId != NULL){
                    //requête pour la création de la category
                    $imageArticleManager->modifyImageArticleById($imageArticleId, $imageArticleLink, $imageArticleIsActive);
                    
                    $_SESSION["imgAr_CreationSucces"] = "<p style='color:green;'>Image modifiée !</p>";
                    header($refresh);
                    
                }else{
                    //requête pour la création de la marque
                    $imageArticleManager->setNewImageArticle($imageArticleLink, $imageArticleIsActive);
                    $_SESSION["imgAr_CreationSucces"] = "<p style='color:green;'>Image ajoutée !</p>";
                    header($refresh);
                }
            }
        }
        
        
        //ÉDITION
        if($modifParam != NULL && !empty($modifParam) && !isset($_POST['submit'])){
            $imageArticleToModify = $imageArticleManager->getImageArticleById($modifParam);
            
            foreach($imageArticleToModify as $val){
                $formImageArticleIdValue = $val['idImageArticle'];
                $formImageArticleLinkValue = $val['Link'];
                $formImageArticleIsActiveValue = $val['isActive'];
            }
        }
        
        
        //ARCHIVAGE
        if($archiveParam != NULL && !empty($archiveParam) && $inactiveParam == NULL){
            $imageArticleManager->setImageArticleInactiveById($archiveParam);
            header($refresh);
        }
        
        
        include 'views/Admin/imageArticle.php';
    }
