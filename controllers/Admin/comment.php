<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 04 Juin 2018
    #### Page controllers/Admin/user.php:
    #### 	  Page de managment des utilisateurs avec formulaire et tableau
    ################################################################################
    
    //include de la classe DbManager
    include("models/CommentManager.php");
    
    //Variable contenant le paramêtre de session 'userIsAdmin'
    $sessionAdminUser = $_SESSION['userIsAdmin'];
    
    //Lien Home
    $redirectToHome = "location:index.php?controller=Site&action=home";
    
    //Lien Adminbrand "refresh"
    $refresh ="location:index.php?controller=Admin&action=comment";
    
    
    // ---- PARAMETRES URL ---- //
    
    //paramêtre utile pour l'affichage des inactifs
    $refusedParam = $_GET['refused'];
    
    //paramêtre utile pour l'affichage des en attente
    $waitingParam = $_GET['waiting'];
    
    //paramêtre utile pour l'affichage des validé
    $validateParam = $_GET['validate'];
    
    //paramêtre utile pour la modification
    $modifParam = $_GET['modif'];
    
    
    
    //Si l'utilisateur n'est pas un admin il se fait rediriger sur la page home
    if($sessionAdminUser != TRUE){
        header($redirectToHome);
        
    }else{
        //tableau contenant les erreurs
        $errors = array();
        
        //instantiation de la classe LoginManager
        $commentManager = new CommentManager();
        
        
        
        //--- PAGINATION ---//
        
        define("ROW_PER_PAGE",5);
        
        $search_keyword = '';
        if(isset($_POST['search']['keyword'])){
            $search_keyword = $_POST['search']['keyword'];
            $_SESSION["comment_CreationSucces"] = NULL;
        }
        
        $per_page_html = '';
        $page = 1;
        $start =0;
        
        
        if(isset($_POST["page"])) {
            $page = $_POST["page"];
            $start = ($page-1) * ROW_PER_PAGE;
            $_SESSION["comment_CreationSucces"] = NULL;
        }
        
        $limit =" limit " . $start . "," . ROW_PER_PAGE;
        
        //Défini la liste à afficher dans le tableau selon le paramêtre dans l'url (actif ou inactif)
        if($refusedParam == TRUE){
            $pagination_statement = $commentManager->searchRefusedComment($search_keyword);
            $pdo_statement = $commentManager->searchRefusedComment($search_keyword, $limit);
        }elseif($validateParam == TRUE){
                $pagination_statement = $commentManager->searchValidateComment($search_keyword);
                $pdo_statement = $commentManager->searchValidateComment($search_keyword, $limit);
        }else{
            $pagination_statement = $commentManager->searchWaitingComment($search_keyword);
            $pdo_statement = $commentManager->searchWaitingComment($search_keyword, $limit);
        }
        
        $row_count = $pagination_statement->rowCount();
        $result = $pdo_statement->fetchAll();
        
        
        
        //--- Envois Formulaire ---//
        
        //si le formulaire est envoyé
        if(isset($_POST['submit'])){
            $commentId = $_POST['hiddenId'];
            $commentState = $_POST['State'];
            $commentText = $_POST['Text'];
                   
            //si un champ est vides
            if(empty($commentText)){
                $errors[] = "Veuillez remplir tous les champs";
            }
            
            //array_filter() permet d'utiliser ensuite empty() sur le tableau d'erreurs
            $errorsArray = array_filter($errors);
            
            //s'il y a une/des d'erreur/s
            if(!empty($errorsArray)){
                //valeurs pour repopuler le formulaire
                $formCommentIdValue = $commentId;
                $formCommentStateValue = $commentState;
                $formCommentTextValue = $commentText;
                
                //message de confirmation -> vide
                $_SESSION["comment_CreationSucces"] = null;
                
            }else{
                //si l'on est en modif
                if(!empty($commentId) || $commentId != NULL){
                    //requête pour la modif de l'utilisateur sans modif du password
                    $commentManager->modifyCommentById($commentId, $commentState, $commentText);
                    $_SESSION["comment_CreationSucces"] = "<p style='color:green;'>Commentaire modifié !</p>";
                    header($refresh);
                }
            }
        }
    
    
        //ÉDITION
        if($modifParam != NULL && !empty($modifParam) && !isset($_POST['submit'])){
            $commentToModify = $commentManager->getCommentById($modifParam);
            
            foreach($commentToModify as $val){
                $formCommentIdValue = $val['idComment'];
                $formCommentStateValue = $val['State'];
                $formCommentTextValue = $val['Text'];
            }
        }
                
        
        include 'views/Admin/comment.php';
    }
