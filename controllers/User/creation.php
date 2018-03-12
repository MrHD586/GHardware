<?php 
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
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
	    $userPassword = $_POST['Password'];
	    $userFirstname = $_POST['Firstname'];
	    $userLastname = $_POST['Lastname'];
	    $userEmail = $_POST['Email'];
	    $userBirthdate = $_POST['Birthdate'];
	    
	    
	    //si un champ ne sont pas vides
	    if($userLogin != null && $userPassword != null && $userFirstname != null && $userLastname != null && $userEmail != null && $userBirthdate != "0000-00-00"){	    
            //instantiation de la classe LoginManager   
            $creationManager = new UserCreationManager();
            echo "yes";
            
            $userCreationDb = $creationManager->setUser($userLogin, $userPassword, $userFirstname, $userLastName, $userEmail, $userBirthdate, $userFkPicUser, $userisAdmin);
            
            $row = $userLoginDb->fetch();
            
    		
	    }else{
	        $_SESSION["message_erreur"] = "Veuillez remplir tous les champs";
	        header($urlToCreation);
	    }
    		
	}
		
	
	include 'views/User/creation.php';
							
			
?>