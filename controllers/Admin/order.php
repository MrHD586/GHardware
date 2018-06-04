<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 04 Juin 2018
    #### Page controllers/Admin/user.php:
    #### 	  Page de managment des utilisateurs avec formulaire et tableau
    ################################################################################
    
    //include de la classe DbManager
    include("models/OrderManager.php");
    
    //Variable contenant le paramêtre de session 'userIsAdmin'
    $sessionAdminUser = $_SESSION['userIsAdmin'];
    
    //Lien Home
    $redirectToHome = "location:index.php?controller=Site&action=home";
    
    //Lien Adminbrand "refresh"
    $refresh ="location:index.php?controller=Admin&action=order";
    
    
    // ---- PARAMETRES URL ---- //
    
    
    //paramêtre utile pour l'affichage des validé
    $sendParam = $_GET['send'];
    
    //paramêtre utile pour l'affichage des délivré
    $deliveredParam = $_GET['delivered'];
    
    //paramêtre utile pour la modification
    $modifParam = $_GET['modif'];
    
    
    
    //Si l'utilisateur n'est pas un admin il se fait rediriger sur la page home
    if($sessionAdminUser != TRUE){
        header($redirectToHome);
        
    }else{
        //tableau contenant les erreurs
        $errors = array();
        
        //instantiation de la classe LoginManager
        $orderManager = new OrderManager();
        
        
        
        //--- PAGINATION ---//
        
        define("ROW_PER_PAGE",5);
        
        $search_keyword = '';
        if(isset($_POST['search']['keyword'])){
            $search_keyword = $_POST['search']['keyword'];
            $_SESSION["order_CreationSucces"] = NULL;
        }
        
        $per_page_html = '';
        $page = 1;
        $start =0;
        
        
        if(isset($_POST["page"])) {
            $page = $_POST["page"];
            $start = ($page-1) * ROW_PER_PAGE;
            $_SESSION["order_CreationSucces"] = NULL;
        }
        
        $limit =" limit " . $start . "," . ROW_PER_PAGE;
        
        //Défini la liste à afficher dans le tableau selon le paramêtre dans l'url (actif ou inactif)
        if($deliveredParam == TRUE){
            $pagination_statement = $orderManager->searchDeliveredOrder($search_keyword);
            $pdo_statement = $orderManager->searchDeliveredOrder($search_keyword, $limit);
        }elseif($sendParam == TRUE){
            $pagination_statement = $orderManager->searchSendOrder($search_keyword);
            $pdo_statement = $orderManager->searchSendOrder($search_keyword, $limit);
        }else{
            $pagination_statement = $orderManager->searchWaitingOrder($search_keyword);
            $pdo_statement = $orderManager->searchWaitingOrder($search_keyword, $limit);
        }
        
        $row_count = $pagination_statement->rowCount();
        $result = $pdo_statement->fetchAll();
        
        
        
        //--- Envois Formulaire ---//
        
        //si le formulaire est envoyé
        if(isset($_POST['submit'])){
            $orderId = $_POST['hiddenId'];
            $orderState = $_POST['State'];
            $orderPayementState = $_POST['PayementState'];
            
            
            
            //array_filter() permet d'utiliser ensuite empty() sur le tableau d'erreurs
            $errorsArray = array_filter($errors);
            
            //s'il y a une/des d'erreur/s
            if(!empty($errorsArray)){
                //valeurs pour repopuler le formulaire
                $formOrderIdValue = $orderId;
                $formOrderStateValue = $orderState;
                $formOrderPayementStateValue = $orderPayementState;
                
                //message de confirmation -> vide
                $_SESSION["order_CreationSucces"] = null;
                
            }else{
                //si l'on est en modif
                if(!empty($orderId) || $orderId != NULL){
                    //requête pour la modif de l'utilisateur sans modif du password
                    $orderManager->modifyOrderById($orderId, $orderState, $orderPayementState);
                    $_SESSION["order_CreationSucces"] = "<p style='color:green;'>Commande modifiée !</p>";
                    header($refresh);
                }
            }
        }
        
        
        //ÉDITION
        if($modifParam != NULL && !empty($modifParam) && !isset($_POST['submit'])){
            $_SESSION["order_CreationSucces"] = null;
            
            $orderToModify = $orderManager->getOrderByID($modifParam);
            
            foreach($orderToModify as $val){
                $formCommentIdValue = $val['idOrder'];
                $formOrderNumberValue = $val['NumberOrder'];
            }
        }
        
        
        include 'views/Admin/order.php';
    }
