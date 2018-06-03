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
    
    //Lien Adminbrand "refresh"
    $refresh ="location:index.php?controller=Admin&action=brand";
    
    
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
        
        
        //instantiation de la classe BrandManager
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
            $pagination_statement = $brandManager->searchInactiveBrand($search_keyword);
            $pdo_statement = $brandManager->searchInactiveBrand($search_keyword, $limit);
        }else{
            $pagination_statement = $brandManager->searchActiveBrand($search_keyword);
            $pdo_statement = $brandManager->searchActiveBrand($search_keyword, $limit);
        }
        
        $row_count = $pagination_statement->rowCount();
        $result = $pdo_statement->fetchAll();
        
        
        
        
        
        //--- Envois Formulaire ---//
                
        //si le formulaire est envoyé
        if(isset($_POST['submit'])){
            
            $brandId = $_POST['hiddenId'];
            $brandName = $_POST['Name'];
            $brandIsActive = $_POST['isActive'];
            
            //si un champ est vides
            if(empty($brandName)){
                $errors[] = "Veuillez remplir tous les champs";
            }else{
                if(empty($brandId) || $brandId == NULL){
                    //recherche d'un brand name correspondant au brand name entré
                    $checkByBrandName = $brandManager->brandNameExists($brandName);
                    
                    //si le nom est égal au nom retourné par la requête
                    if($checkByBrandName == TRUE){
                        $errors[] = "Le nom de la marque est déjà utilisé";
                    }
                }
            }
            
            //array_filter() permet d'utiliser ensuite empty() sur le tableau d'erreurs
            $errorsArray = array_filter($errors);
            
            //s'il y a une/des d'erreur/s
            if(!empty($errorsArray)){
                //valeurs pour repopuler le formulaire
                $formBrandIdValue = $brandId;
                $formBrandNameValue = $brandName;
                
                //message de confirmation de la création -> vide
                $_SESSION["br_CreationSucces"] = null;
            }else{
                //si l'on est en modif
                if(!empty($brandId) || $brandId != NULL){
                    //requête pour la création de la marque
                    $brandManager->modifyBrandById($brandId, $brandName, $brandIsActive);
                    
                    $_SESSION["br_CreationSucces"] = "<p style='color:green;'>Marque modifiée !</p>";
                    header($refresh);
                    
                }else{
                    //requête pour la création de la marque
                    $brandManager->setNewBrand($brandName, $brandIsActive);
                    $_SESSION["br_CreationSucces"] = "<p style='color:green;'>Marque ajoutée !</p>";
                    header($refresh);
                }
            }
        }
        
        
        
        
        //ÉDITION
        if($modifParam != NULL && !empty($modifParam) && !isset($_POST['submit'])){
            $brandToModify = $brandManager->getBrandById($modifParam);
            
            foreach($brandToModify as $val){
                $formBrandIdValue = $val['idBrand'];
                $formBrandNameValue = $val['Name'];
            }
        }
        
        
        //ARCHIVAGE
        if($archiveParam != NULL && !empty($archiveParam) && $inactiveParam == NULL){
            $brandManager->setBrandInactiveById($archiveParam);
            header($refresh);
        }
        
        
        
        
        
        include 'views/Admin/brand.php';
    }
