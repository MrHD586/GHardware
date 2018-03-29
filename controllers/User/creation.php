<?php 
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 F�vrier 2018
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
	    $userPasswordVerif = md5($_POST['PasswordVerif']);
	    $userFirstname = $_POST['Firstname'];
	    $userLastname = $_POST['Lastname'];
	    $userEmail = $_POST['Email'];  
	    $userBirthdate = $_POST['Birthdate'];
	   
	   
	    //si un champ ne sont pas vides
	    if($userLogin != null && $userPassword != null && $userFirstname != null && $userLastname != null && $userEmail != null && $userBirthdate != null){	    
           
	        //Si les deux champs password correspondent
	        if($userPassword == $userPasswordVerif){
    	        //instantiation de la classe LoginManager
                $creationManager = new UserCreationManager();
                
                //recherche d'un user name correspondant au login entré
                $checkByUserName = $creationManager->getUserName($userLogin);
                
                foreach($checkByUserName as $checkByUserName){
                    $loginAlreadyExsist = $checkByUserName['ULogin'];
                }
                
                //si le login n'est pas égale au login retourné par la requête
                if($userLogin != $loginAlreadyExsist){
                    //hash du password
                    $hash = password_hash($userPassword, PASSWORD_DEFAULT);
                    $userCreationDb = $creationManager->setNewUser($userLogin, $hash, $userFirstname, $userLastName, $userEmail, $userBirthdate, $userFkPicUser, $userisAdmin);           
                    header($urlToLogin);
                }else{
                    $_SESSION["message_erreur"] = "Le nom d'utilisateur est déjà utilisé";
                    header($urlToCreation);
                }
	        }else{
	            $_SESSION["message_erreur"] = "Les mots de passes ne sont pas identiques";
	            header($urlToCreation);
	        }
	    }else{
	        $_SESSION["message_erreur"] = "Veuillez remplir tous les champs";
	        header($urlToCreation);
	    }
    		
	}
		
	include 'views/User/creation.php';
							
			
?>