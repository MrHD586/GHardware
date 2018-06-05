<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 24 Mai 2018
    #### Page controllers/User/profile.php:
    #### 		  Gestions des données de la page profile
    ################################################################################
   
    include 'models/ProfileManager.php';
    
    
    //Lien pour "refresh"
    $refresh ="location:index.php?controller=User&action=profile";
    
    //Lien pour sur la page login
    $loginPage ="location:index.php?controller=Login&action=login&newpass=true";
    
    $profileManager = new ProfileManager();
    
    $aside = $profileManager->getCategoryName();
    
    // contient le nom de l'utilisateur connecté actuellement
    $userLogin = $_SESSION['user_name'];
    
    
    $userInfos = getUserByLogin($userLogin);
    
    foreach($userInfos as $value){
        $userInfoId = $value['idUser'];
        $userInfoPassword = $value['Password'];
        $userInfoFirstName = $value['FirstName'];
        $userInfoLastName = $value['LastName'];
        $userInfoBirthDate = $value['Birthdate'];
        $userInfoRoad = $value['Road'];
        $userInfoNpa = $value['NPA'];
        $userInfoTown = $value['Town'];
    }
    
    
    
    
    
    //--- modification du login ---//
    
    if($_GET['modif'] == 'login'){
        if(isset($_POST['submit'])){
            $userNewLogin = $_POST['login'];
            
            if(empty($userNewLogin)){
                $errors[] = "Veuillez entrer un login";
            }else{
                if($userNewLogin == $userLogin){
                    $errors[] = "Le nom d'utilisateur est égal à l'actuel";
                }else{
                    //recherche d'un login correspondant à l'article name entré
                    $checkByUserLogin = $profileManager->userLoginExists($userNewLogin);
                    
                    //si le nom est égal au nom retourné par la requête
                    if($checkByUserLogin == TRUE){
                        $errors[] = "Le nom d'utilisateur est déjà utilisé";
                    }
                }
            }
            
            //array_filter() permet d'utiliser ensuite empty() sur le tableau d'erreurs
            $errorsArray = array_filter($errors);
            
            //s'il y a une/des d'erreur/s
            if(!empty($errorsArray)){
                //message de confirmation de la création 
                $_SESSION["ModifSucces"] = NULL;
                
            }else{
                
                $profileManager->modifyUserLoginById($userInfoId, $userNewLogin);
                
                //message de confirmation de la création 
                $_SESSION["ModifSucces"] = "<p style='color:green;'>Nom d'utilisateur modifié !</p>";
                
                $_SESSION['user_name'] = $userNewLogin;
                
                header($refresh);
            }
        }
    }
    
    
    
    
    //--- modification du prénom ---//
    
    if($_GET['modif'] == 'firstname'){
        if(isset($_POST['submit'])){
            $userNewFirstName = $_POST['firstname'];
            
            if(empty($userNewFirstName)){
                $errors[] = "Veuillez remplir le champ";
            }else{
                if($userNewFirstName == $userInfoFirstName){
                    $errors[] = "Le prénom est égal à l'actuel";
                }
            }
            
            //array_filter() permet d'utiliser ensuite empty() sur le tableau d'erreurs
            $errorsArray = array_filter($errors);
            
            //s'il y a une/des d'erreur/s
            if(!empty($errorsArray)){
                //message de confirmation de la création 
                $_SESSION["ModifSucces"] = NULL;
                
            }else{
                
                 
                $profileManager->modifyUserFirstNameById($userInfoId, $userNewFirstName);
                
                //message de confirmation de la création 
                $_SESSION["ModifSucces"] = "<p style='color:green;'>Prénom modifié !</p>";
                
                header($refresh);
            }
        }
    }
    
    
    
    //--- modification du nom ---//
    
    if($_GET['modif'] == 'lastname'){
        if(isset($_POST['submit'])){
            $userNewLastName = $_POST['lastname'];
            
            if(empty($userNewLastName)){
                $errors[] = "Veuillez remplir le champ";
            }else{
                if($userNewLastName == $userInfoLastName){
                    $errors[] = "Le nom est égal à l'actuel";
                }
            }
            
            //array_filter() permet d'utiliser ensuite empty() sur le tableau d'erreurs
            $errorsArray = array_filter($errors);
            
            //s'il y a une/des d'erreur/s
            if(!empty($errorsArray)){
                //message de confirmation de la création 
                $_SESSION["ModifSucces"] = NULL;
                
            }else{
                
                
                $profileManager->modifyUserLastNameById($userInfoId, $userNewLastName);
                
                //message de confirmation de la création 
                $_SESSION["ModifSucces"] = "<p style='color:green;'>Nom modifié !</p>";
                
                header($refresh);
            }
        }
    }
    
    
    
    
    
    //--- modification du date de naissance ---//
    
    if($_GET['modif'] == 'birthdate'){
        if(isset($_POST['submit'])){
            $userNewBirthDate = $_POST['birthdate'];
            
            if(empty($userNewBirthDate)){
                $errors[] = "Veuillez remplir le champ";
            }else{
                if($userNewBirthDate == $userInfoBirthDate){
                    $errors[] = "La date de naissance est égale à l'actuelle";
                }
            }
            
            //array_filter() permet d'utiliser ensuite empty() sur le tableau d'erreurs
            $errorsArray = array_filter($errors);
            
            //s'il y a une/des d'erreur/s
            if(!empty($errorsArray)){
                //message de confirmation de la création 
                $_SESSION["ModifSucces"] = NULL;
                
            }else{
                
                
                $profileManager->modifyUserBirthDateById($userInfoId, $userNewBirthDate);
                
                //message de confirmation de la création 
                $_SESSION["ModifSucces"] = "<p style='color:green;'>Date de naissance modifiée !</p>";
                
                header($refresh);
            }
        }
    }
    
    
    
    
    
    
    //--- modification de l'adresse ---//
    
    if($_GET['modif'] == 'address'){
        if(isset($_POST['submit'])){
            $userNewRoad = $_POST['road'];
            $userNewNpa = $_POST['npa'];
            $userNewTown = $_POST['town'];
            
            if(empty($userNewRoad) || empty($userNewNpa) || empty($userNewTown)){
                $errors[] = "Veuillez remplir tous les champs";
            }else{
                if($userNewRoad == $userInfoRoad){
                    $errors[] = "La rue est égale à l'actuelle";
                }
                
                //si le npa contient que des chiffres
                if (!preg_match('/^[0-9]+$/', $userNewNpa)) {
                    $errors[] = "Le code postal ne peut pas contenir de lettres";
                }
            }
            
            //array_filter() permet d'utiliser ensuite empty() sur le tableau d'erreurs
            $errorsArray = array_filter($errors);
            
            //s'il y a une/des d'erreur/s
            if(!empty($errorsArray)){ 
                //variables pour repopuler les champs
                $formUserRoad = $userNewRoad;
                $formUserNpa = $userNewNpa;
                $formUserTown = $userNewTown;
                
                //message de confirmation de la création
                $_SESSION["ModifSucces"] = NULL;
                
            }else{
                
                
                $profileManager->modifyUserAddressById($userInfoId, $userNewRoad, $userNewNpa, $userNewTown);
                
                //message de confirmation de la création
                $_SESSION["ModifSucces"] = "<p style='color:green;'>Adresse modifiée !</p>";
                
                header($refresh);
            }
        }
    }
    
    
   
    if($_GET['modif'] == 'password'){
        
        
        
    }
  
    //--- modification du mot de passe ---//
    
    if($_GET['modif'] == 'password'){
        if(isset($_POST['submit'])){
            $userOldPassword = $_POST['oldPassword'];
            $userNewPassword = $_POST['newPassword'];
            $userNewPasswordConfirm = $_POST['confirmNewPassword'];
            
            if(empty($userOldPassword) || empty($userNewPassword) || empty($userNewPasswordConfirm)){
                $errors[] = "Veuillez remplir tous les champs";
            }else{
                if($userNewPassword != $userNewPasswordConfirm){
                    $errors[] = "le nouveau mot de passe et la confirmation ne sont pas identique";
                }
            }
            
            //array_filter() permet d'utiliser ensuite empty() sur le tableau d'erreurs
            $errorsArray = array_filter($errors);
            
            
            //s'il y a une/des d'erreur/s
            if(!empty($errorsArray)){
                
                //message de confirmation de la création
                $_SESSION["ModifSucces"] = NULL;
                
            }else{
                //champs password md5
                $userOldPasswordMd5 = md5($userOldPassword);
                $userNewPasswordMd5 = md5($userNewPassword);
                
                
                //verification du password md5 selon l'actuel
                $isValid = password_verify($userOldPasswordMd5, $userInfoPassword);
                
                if(!$isValid){
                    //message de confirmation de la création
                    $_SESSION["ModifSucces"] = NULL;
                    $errorsArray[] = "Votre ancien mot de passe est faux";
                    
                }else{
                    
                    //hash du nouveau password
                    $hash = password_hash($userNewPasswordMd5, PASSWORD_DEFAULT);
                    
                    $profileManager->modifyUserPasswordById($userInfoId, $hash);
                    
                    //message de confirmation de la création
                    $_SESSION["ModifSucces"] = "<p style='color:green;'>Mot de passe modifié !</p>";
                    session_destroy();
                    header($loginPage);
                }
                
                 
            }
        }
    }
    
    
    
    
    
    
    //--- FONCTIONS ---//
    
    function getUserByLogin($userLogin){
        $profileManager = new ProfileManager();
        $getUserByLogin = $profileManager->getUserByLogin($userLogin);
        return $getUserByLogin;
    }
    
    
    
    
    include 'views/aside.php';
    include 'views/User/profile.php';