<?php 
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 F�vrier 2018
    #### Page controllers/Login/login.php:
    #### 	  control du login
    ################################################################################
   
    //include de la classe DbManager
    include("models/UserCreationManager.php");
        
    // ----- LIEN POUR REDIRECTION -----
    //redirection sur login si erreurs
    $urlToCreation = "location:index.php?controller=User&action=creation";
    //login
    $urlToLogin = "location:index.php?controller=Login&action=login";
    
	if(isset($_POST['enregistrer'])) {
		
	    $userLogin = $_POST['Login'];
	    $userPassword = md5($_POST['Password']);
	    $userFirstname = $_POST['Firstname'];
	    $userLastname = $_POST['Lastname'];
	    $userEmail = $_POST['Email'];
	    $userBirthdate = $_POST['Birthdate'];
	    
	    
	    //si un champ ne sont pas vides
	    if($userLogin != null && $userPassword != md5("") && $userFirstname != null && $userLastname != null && $userEmail != null && $userBirthdate != null){	    
            //instantiation de la classe LoginManager   
            $creationManager = new UserCreationManager();
            echo "1";
            
            $userCreationDb = $creationManager->setUser($userLogin, $userPassword, $userFirstname, $userLastName, $userEmail, $userBirthdate, $userFkPicUser, $userisAdmin);
            echo "2";            
    		
	    }else{
	        $_SESSION["message_erreur"] = "Veuillez remplir tous les champs";
	        header($urlToCreation);
	    }
    		
	}
		
	
	include 'views/User/creation.php';
							
			
?>