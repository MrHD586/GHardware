<?php 
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 F�vrier 2018
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
    $urlToAdmin = "location:index.php?controller=Admin&action=home";
    
    //si true le user est connect�
    $_SESSION['UserSession'] = NULL;
    
	if(isset($_POST['submit'])) {
			    
	    $userLogin = $_POST['Login'];
	    $userPassword = md5($_POST['Password']);
	    
	    //si un champ ne sont pas vides
	    if($userLogin != null && $userPassword != null){	    
            //instantiation de la classe LoginManager   
            $loginManager = new LoginManager();
            $userLoginDb = $loginManager->getLogin($userLogin);
            
            $row = $userLoginDb->fetch();
            
            //verification du password hashé
            $isValid = password_verify($userPassword, $row['UPassword']);
            
            if($userLogin == $row['ULogin'] && $isValid){
                $_SESSION['UserSession'] = TRUE;
                $_SESSION['user_name'] = $userLogin;
                               
    			if($row['isAdmin'] == 1){
    			    $_SESSION['userIsAdmin'] = TRUE; 
    			    header($urlToAdmin);
    			}else{
    			    if($_GET['Paniercookie']==1){
    			    header('index.php?controller=Cart&action=CookieToBdd');
    			    }else{
    			    header($urlToHome);
    			    }
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