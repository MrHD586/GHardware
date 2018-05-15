<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 08 Mai 2018
    #### Page controllers/Admin/user.php:
    #### 	  Page de managment des utilisateurs avec formulaire et tableau
    ################################################################################
    
    //include de la classe DbManager
    include("models/UserCreationManager.php");
    
    //tableau contenant les erreurs
    $errors = array();
    
    //si le formulaire est envoyé
    if(isset($_POST['submit'])){
        $userLogin = $_POST['Login'];
        $userPasswordRaw = $_POST['Password'];
        $userPasswordVerifRaw = $_POST['PasswordVerif'];
        $userFirstName = $_POST['Firstname'];
        $userLastName = $_POST['Lastname'];
        $userEmail = $_POST['Email'];
        $userBirthdate = $_POST['Birthdate'];
        $userFkPicUser = 1; // 1 = avatar par défaut
        $userIsAdmin = $_POST['isAdmin'];
        $userIsActive =$_POST['isActive'];
               
        //si un champ est vides
        if(empty($userLogin) || empty($userPasswordRaw) || empty($userPasswordVerifRaw) || empty($userFirstName)|| empty($userLastName) || empty($userEmail) || empty($userBirthdate)){
            $errors[] = "Veuillez remplir tous les champs";
       
        }else{          
            $userPasswordMD5 = md5($userPasswordRaw);
            $userPasswordVerifMD5 = md5($userPasswordVerifRaw);
            
            //instantiation de la classe LoginManager
            $creationManager = new UserCreationManager();
            
            //recherche d'un user name correspondant au login entré
            $checkByUserName = $creationManager->userExists($userLogin);
            
            //si le login est égal au login retourné par la requête
            if($checkByUserName == TRUE){
                $errors[] = "Le nom d'utilisateur est déjà utilisé";
            }
            
            //Si les deux champs password correspondent
            if($userPasswordMD5 != $userPasswordVerifMD5){
                $errors[] = "Les mots de passes ne sont pas identiques";
            }
            
            //^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$
            if(!preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $userEmail)){
                $errors[] = "L'email n'est pas correct";
            }
        }
        
        //array_filter() permet d'utiliser ensuite empty() sur le tableau d'erreurs
        $errorsArray = array_filter($errors);
        
        //s'il y a une/des d'erreur/s
        if(!empty($errorsArray)){
            //valeurs pour repopuler le formulaire
            $formUserLoginValue = $userLogin;
            $formUserFirstNameValue = $userFirstName;
            $formUserLastNameValue = $userLastName;
            $formUserEmailValue = $userEmail;
            $formUserBirthdateValue = $userBirthdate;
            
            //message de confirmation de la création -> vide
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
