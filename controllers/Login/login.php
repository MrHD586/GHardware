<?php 
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Page controllers/Login/login.php:
    #### 	  control du login
    ################################################################################
   
    //include de la classe DbManager
    include("models/LoginManager.php");
    
    session_start();
        
    // ----- LIEN POUR REDIRECTION -----
    //redirection sur login si erreurs
    $urlToLogin = "location:index.php?controller=Login&action=login";
    //home
    $urlToHome = "location:index.php?controller=Site&action=home";
    //page d'administration
    $urlToAdmin = "location:index.php?controller=Admin&action=adminHome";
    
    //si true le user est connecté
    $_SESSION['UserSession'] = NULL;
    
    //grain de sel du password
    $salt = password_hash("salt-pwd", PASSWORD_DEFAULT);
    
	if(isset($_POST['submit'])) {
			    
	    $userLogin = $_POST['Login'];
	    $userPassword = $salt.md5($_POST['Password']);
	    echo $userPassword;
	    
	    //si un champ ne sont pas vides
	    if($userLogin != null && $userPassword != $salt.md5("")){	    
            //instantiation de la classe LoginManager   
            $loginManager = new LoginManager();
            echo "yes";
            $userLoginDb = $loginManager->getLogin($userLogin);
            
            $row = $userLoginDb->fetch();
            
            if($userLogin == $row['ULogin'] && $userPassword == $row['UPassword']){
                $_SESSION['UserSession'] = TRUE;
                $_SESSION['user_name'] = $userLogin;
                               
    			if($row['isAdmin'] == 1){
    			    header($urlToAdmin);
    			}else{
    			    header($urlToHome);
    			}
    		}else{
    			$_SESSION['message_erreur'] = "Le login ou le mot de passe est incorrect";
    			die(header($urlToLogin));
    		}
    		
	    }else{
	        $_SESSION["message_erreur"] = "Veuillez remplir tous les champs";
	        header($urlToLogin);
	    }
    		
	}
		
	
	include 'views/Login/login.php';
							
			
?>