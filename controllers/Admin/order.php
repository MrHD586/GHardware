<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 08 Mai 2018
    #### Page controllers/Admin/user.php:
    #### 	  Page de managment des utilisateurs avec formulaire et tableau
    ################################################################################
    
    //include de la classe DbManager
    include("models/UserCreationManager.php");
    
    //Variable contenant le paramêtre de session 'userIsAdmin'
    $sessionAdminUser = $_SESSION['userIsAdmin'];
    
    //Lien Home
    $redirectToHome = "location:index.php?controller=Site&action=home";
    
    //Lien Adminbrand "refresh"
    $refresh ="location:index.php?controller=Admin&action=user";
    
    
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
        
        //instantiation de la classe LoginManager
        $userManager = new UserCreationManager();
        
        
        
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
            $pagination_statement = $userManager->searchInactiveUser($search_keyword);
            $pdo_statement = $userManager->searchInactiveUser($search_keyword, $limit);
        }else{
            $pagination_statement = $userManager->searchActiveUser($search_keyword);
            $pdo_statement = $userManager->searchActiveUser($search_keyword, $limit);
        }
        
        $row_count = $pagination_statement->rowCount();
        $result = $pdo_statement->fetchAll();
        
        
        
        //--- Envois Formulaire ---//
        
        //si le formulaire est envoyé
        if(isset($_POST['submit'])){
            $userId = $_POST['hiddenId'];
            $userLogin = $_POST['Login'];
            $userPasswordRaw = $_POST['Password'];
            $userPasswordVerifRaw = $_POST['PasswordVerif'];
            $userFirstName = $_POST['FirstName'];
            $userLastName = $_POST['LastName'];
            $userEmail = $_POST['Email'];
            $userBirthdate = $_POST['Birthdate'];
            $userRoad = $_POST['Road'];
            $userNpa = $_POST['Npa'];
            $userTown = $_POST['Town'];
            $userFkPicUser = 1; // 1 = avatar par défaut
            $userIsAdmin = $_POST['isAdmin'];
            $userIsActive =$_POST['isActive'];
                   
            //si un champ est vides
            if(empty($userLogin) ||  empty($userFirstName) || empty($userLastName) || empty($userEmail) || empty($userBirthdate) 
                || empty($userRoad) || empty($userNpa) || empty($userTown)){
                $errors[] = "Veuillez remplir tous les champs";
           
            }else{          
                
                if(empty($userId)){
                    //recherche d'un user name correspondant au login entré
                    $checkByUserName = $userManager->userExists($userLogin);
                                        
                    //si le login est égal au login retourné par la requête
                    if($checkByUserName == TRUE){
                        $errors[] = "Le nom d'utilisateur est déjà utilisé";
                    } 
                
                    if(empty($userPasswordRaw) || empty($userPasswordVerifRaw)){
                        $errors[] = "Veuillez remplir tous les champs";
                    }
                }
                
                
                //password haché en md5   
                $userPasswordMD5 = md5($userPasswordRaw);
                $userPasswordVerifMD5 = md5($userPasswordVerifRaw);
                
                //Si les deux champs password correspondent
                if($userPasswordMD5 != $userPasswordVerifMD5){
                    $errors[] = "Les mots de passes ne sont pas identiques";
                }
                    
                //si le prénom contient que des lettres
                if(!preg_match('/^[\pL\pM\p{Zs}.-]+$/u', $userFirstName)){
                    $errors[] = "Votre prénom ne peut pas contenir de chiffres";
                }
                
                //si le nom contient que des lettres
                if(!preg_match('/^[\pL\pM\p{Zs}.-]+$/u', $userLastName)){
                    $errors[] = "Votre nom ne peut pas contenir de chiffres";
                }
                
                //email
                if(!preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $userEmail)){
                    $errors[] = "L'email n'est pas correct";
                }
                
                //si le npa contient que des chiffres
                if (!preg_match('/^[0-9]+$/', $userNpa)) {
                    $errors[] = "Le code postal ne peut pas contenir de lettres";
                }
                
                //si la ville contient que des lettres
                if(!preg_match('/^[\pL\pM\p{Zs}.-]+$/u', $userTown)){
                    $errors[] = "La ville ne peut pas contenir de chiffres";
                }
                
            }
            
            //array_filter() permet d'utiliser ensuite empty() sur le tableau d'erreurs
            $errorsArray = array_filter($errors);
            
            //s'il y a une/des d'erreur/s
            if(!empty($errorsArray)){
                //valeurs pour repopuler le formulaire
                $formUserIdValue = $userId;
                $formUserLoginValue = $userLogin;
                $formUserFirstNameValue = $userFirstName;
                $formUserLastNameValue = $userLastName;
                $formUserEmailValue = $userEmail;
                $formUserBirthdateValue = $userBirthdate;
                $formUserRoadValue = $userRoad;
                $formUserNpaValue = $userNpa;
                $formUserTownValue = $userTown;
                
                //message de confirmation de la création -> vide
                $_SESSION["user_CreationSucces"] = null;
                
            }else{
                //si l'on est en modif
                if(!empty($userId) || $userId != NULL){
                    //et que l'on ne modifie pas le password
                    if(empty($userPasswordRaw) || empty($userPasswordVerifRaw)){
                        $userPasswordParam = NULL;
                        //requête pour la modif de l'utilisateur sans modif du password
                        $userManager->modifyUserById($userId, $userLogin, $userPasswordParam, $userFirstName, $userLastName, $userEmail, $userBirthdate,
                                                     $userRoad, $userNpa, $userTown, $userIsActive, $userFkPicUser, $userisAdmin);
                        $_SESSION["user_CreationSucces"] = "<p style='color:green;'>Utilisateur modifié !</p>";
                        header($refresh);
                    }else{
                        //hash du password
                        $hash = password_hash($userPasswordMD5, PASSWORD_DEFAULT);
                        //requête pour la modificaiton de l'article
                        $userManager->modifyUserById($userId, $userLogin, $hash, $userFirstName, $userLastName, $userEmail, $userBirthdate,
                            $userRoad, $userNpa, $userTown, $userIsActive, $userFkPicUser, $userisAdmin);
                        $_SESSION["user_CreationSucces"] = "<p style='color:green;'>Utilisateur modifié !</p>";
                        header($refresh);
                    }
                    
                }else{
                    //hash du password
                    $hash = password_hash($userPasswordMD5, PASSWORD_DEFAULT);
                    //requête pour la création de l'utilisateur
                    $userCreationDb = $userManager->setNewUser($userLogin, $hash, $userFirstName, $userLastName, $userEmail, $userBirthdate,
                    $userRoad, $userNpa, $userTown, $userIsActive, $userFkPicUser, $userIsAdmin);
                    
                    $_SESSION["user_CreationSucces"] = "<p style='color:green;'>Compte utilisateur créé !</p>";
                }
            }
        }
    
    
        //ÉDITION
        if($modifParam != NULL && !empty($modifParam) && !isset($_POST['submit'])){
            $userToModify = $userManager->getUserById($modifParam);
            
            foreach($userToModify as $val){
                $formUserIdValue = $val['idUser'];
                $formUserLoginValue = $val['Login'];
                $formUserFirstNameValue = $val['FirstName'];
                $formUserLastNameValue = $val['LastName'];
                $formUserEmailValue = $val['Email'];
                $formUserBirthdateValue = $val['Birthdate'];
                $formUserRoadValue = $val['Road'];
                $formUserNpaValue = $val['NPA'];
                $formUserTownValue = $val['Town'];
            }
        }
        
        
        //ARCHIVAGE
        if($archiveParam != NULL && !empty($archiveParam) && $inactiveParam == NULL){
            $userManager->setUserInactiveById($archiveParam);
            header($refresh);
        }
        
        
        include 'views/Admin/user.php';
    }
