<?php 
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Page controllers/Login/login.php:
    #### 	  control du login
    ################################################################################
   
    //include de la classe DbManager
    include("models/LoginManager.php");
        
    // ----- LIEN POUR REDIRECTION -----
    //redirection sur login si erreurs
    $urlToLogin = "location:index.php?controller=Login&action=login";
    //home
    $urlToHome = "location:index.php?controller=Site&action=home";
    //page d'administration
    $urlToAdmin = "location:index.php?controller=Admin&action=adminHome";
    
	if(isset($_POST['enregistrer'])) {
		
	    $userLogin = $_POST['Login'];
	    $userPassword = $_POST['Password'];
	    
	    //si un champ ne sont pas vides
	    if($userLogin != null && $userPassword != null){	    
            //instantiation de la classe LoginManager   
            $loginManager = new LoginManager();
            
            $userLoginDb = $loginManager->getLogin($userLogin);
            
            $row = $userLoginDb->fetch();
            
            if($userLogin == $row['ULogin'] && $userPassword == $row['UPassword']){
                $_SESSION['user_name'] = $userLogin;
                $_SESSION['Connecter'] = TRUE;
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