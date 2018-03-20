<?php 
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Page controllers/Login/login.php:
    #### 	  control du login
    ################################################################################
   
    //include de la classe DbManager
    include("models/UserCreationManager.php");
    
    session_start();
        
    // ----- LIEN POUR REDIRECTION ----- //
    //redirection sur login si erreurs
    $urlToCreation = "location:index.php?controller=User&action=creation";
    //login
    $urlToLogin = "location:index.php?controller=Login&action=login";
        
    //si le formulaire est envoyé
	if(isset($_POST['submit'])){
	    	    
	    $userLogin = $_POST['Login'];
	    $userPassword = md5($_POST['Password']);
	    $userFirstname = $_POST['Firstname'];
	    $userLastname = $_POST['Lastname'];
	    $userEmail = $_POST['Email'];  
	    $userBirthdate = $_POST['Birthdate'];
	    
	    //hash du password
	    $hash = password_hash($userPassword, PASSWORD_DEFAULT);
	   
	    //si un champ ne sont pas vides
	    if($userLogin != null && $userPassword != null && $userFirstname != null && $userLastname != null && $userEmail != null && $userBirthdate != null){	    
            //instantiation de la classe LoginManager
            $creationManager = new UserCreationManager();
           
            $userCreationDb = $creationManager->setNewUser($userLogin, $hash, $userFirstname, $userLastName, $userEmail, $userBirthdate, $userFkPicUser, $userisAdmin);           
    		
            header($urlToLogin);
	    }else{
	        $_SESSION["message_erreur"] = "Veuillez remplir tous les champs";
	        header($urlToCreation);
	    }
    		
	}
		
	
	include 'views/User/creation.php';
							
			
?>