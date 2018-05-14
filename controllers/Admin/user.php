<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 08 Mai 2018
    #### Page controllers/Admin/user.php:
    #### 	  Page de managment des utilisateurs avec formulaire et tableau
    ################################################################################
    
    //include de la classe DbManager
    include("models/UserCreationManager.php");
    
    session_start();
        
    //variable d'erreure
    $hasError = NULL;
    
    $erros = array();
    
    class adminUser {
        
    }
    //si le formulaire est envoyé
    if(isset($_POST['submit'])){
        print_r("hello");
        $userLogin = $_POST['Login'];
        $userPassword = md5($_POST['Password']);
        $userPasswordVerif = md5($_POST['PasswordVerif']);
        $userFirstName = $_POST['Firstname'];
        $userLastName = $_POST['Lastname'];
        $userEmail = $_POST['Email'];
        $userBirthdate = $_POST['Birthdate'];
        $userFkPicUser = 1; // 1 = avatar par défaut
        $userIsAdmin = $_POST['IsAdmin'];
        $userIsActive =$_POST['IsActive'];
               
        //si un champ est vides
        if($userLogin == null || $userPassword == null || $userFirstName == null || $userLastName == null || $userEmail == null || $userBirthdate == null){
            $_SESSION["user_ErrorEmptyField"] = "Veuillez remplir tous les champs";
            $erros[] = "Veuillez remplir tous les champs";
            $hasError = TRUE;
        }else{
            
            $_SESSION["user_ErrorEmptyField"] = null;
            
            //instantiation de la classe LoginManager
            $creationManager = new UserCreationManager();
            
            //recherche d'un user name correspondant au login entré
            $checkByUserName = $creationManager->userExists($userLogin);
            
            //si le login est égal au login retourné par la requête
            if($checkByUserName == TRUE){
                $errors[] = "Le nom d'utilisateur est déjà utilisé";
                $hasError = TRUE;
            }else{
                $_SESSION["user_ErrorUserName"] = null;
            }
            
            //Si les deux champs password correspondent
            if($userPassword != $userPasswordVerif){
                $_SESSION["user_ErrorPassword"] = "Les mots de passes ne sont pas identiques";
                $hasError = TRUE;
            }else{
                $_SESSION["user_ErrorPassword"] = null;
            }
            
            //^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$
            if(!preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $userEmail)){
                $_SESSION["user_ErrorEmail"] = "L'email n'est pas correct";
                $hasError = TRUE;
            }else{
                $_SESSION["user_ErrorEmail"] = null;
            }
        }
        
        //s'il y a une/des d'erreur/s
        if($hasError == TRUE){
            //valeurs pour reremplire le formulaire
            $formUserLoginValue = $userLogin;
            $formUserFirstNameValue = $userFirstName;
            $formUserLastNameValue = $userLastName;
            $formUserEmailValue = $userEmail;
            $formUserBirthdateValue = $userBirthdate;
            
            $_SESSION["user_CreationSucces"] = null;
        }else{
            //hash du password
            $hash = password_hash($userPassword, PASSWORD_DEFAULT);
            //requête pour la création de l'utilisateur
            $userCreationDb = $creationManager->setNewUser($userLogin, $hash, $userFirstName, $userLastName, $userEmail, $userBirthdate, $userIsActive, $userFkPicUser, $userIsAdmin);
            $_SESSION["user_CreationSucces"] = "<p style='color:green;'>Compte utilisateur créé !</p>";
        }
    }
    
    include 'views/Admin/user.php';
