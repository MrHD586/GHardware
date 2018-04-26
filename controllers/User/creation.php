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
    
    //variable d'erreure
    $hasError = NULL;
        
    //si le formulaire est envoyé
	if(isset($_POST['submit'])){
	    	    
	    $userLogin = $_POST['Login'];
	    $userPassword = md5($_POST['Password']);
	    $userPasswordVerif = md5($_POST['PasswordVerif']);
	    $userFirstname = $_POST['Firstname'];
	    $userLastname = $_POST['Lastname'];
	    $userEmail = $_POST['Email'];  
	    $userBirthdate = $_POST['Birthdate'];
	   
	    //si un champ sont vides
	    if($userLogin == null && $userPassword == null && $userFirstname == null && $userLastname == null && $userEmail == null && $userBirthdate == null){
	        $_SESSION["errorEmptyField"] = "Veuillez remplir tous les champs";
	        $hasError = TRUE;
	    }
	    
	    //instantiation de la classe LoginManager
	    $creationManager = new UserCreationManager();
	    
	    //recherche d'un user name correspondant au login entré
	    $checkByUserName = $creationManager->getUserName($userLogin);
	    
	    foreach($checkByUserName as $checkByUserName){
	        $loginAlreadyExsist = $checkByUserName['ULogin'];
	    }
	    
	    //si le login n'est pas égale au login retourné par la requête
	    if($userLogin == $loginAlreadyExsist){
	        $_SESSION["errorUserName"] = "Le nom d'utilisateur est déjà utilisé";
	        $hasError = TRUE;
	    }   
	    
        //Si les deux champs password correspondent
        if($userPassword != $userPasswordVerif){
           $_SESSION["errorPassword"] = "Les mots de passes ne sont pas identiques";
           $hasError = TRUE;
        }
        
        //^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$
        if(!preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $userEmail)){
           $_SESSION["errorEmail"] = "L'email n'est pas correct";
           $hasError = TRUE;
        }
     	
        //s'il n'y a pas d'erreurs
        if($hasError == TRUE){
            header($urlToCreation);
        }else{
            //hash du password
            $hash = password_hash($userPassword, PASSWORD_DEFAULT);
            //requête pour la création de l'utilisateur
            $userCreationDb = $creationManager->setNewUser($userLogin, $hash, $userFirstname, $userLastName, $userEmail, $userBirthdate, $userFkPicUser, $userisAdmin);
            header($urlToLogin);
        }
	}
		
	include 'views/User/creation.php';
							
			
?>