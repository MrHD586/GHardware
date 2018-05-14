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
    //redirection sur création si erreurs
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
	    $userFkPicUser = 1; // 1 = avatar par défaut
	    define("userIsAdmin", 0); //les users ne sont pas par défaut admin
	    define("userIsActive", 1); //les users sont par défaut actifs
	   
	    //si un champ est vides
	    if($userLogin == null || $userPassword == null || $userFirstname == null || $userLastname == null || $userEmail == null || $userBirthdate == null){
	        $_SESSION["errorEmptyField"] = "Veuillez remplir tous les champs";
	        $hasError = TRUE;
	    }else{
	        
	        $_SESSION["errorEmptyField"] = null;
	    
    	    //instantiation de la classe LoginManager
    	    $creationManager = new UserCreationManager();
    	    
    	    //recherche d'un user name correspondant au login entré
    	    $checkByUserName = $creationManager->getUserName($userLogin);
    	    
    	    foreach($checkByUserName as $checkByUserName){
    	        $loginAlreadyExsist = $checkByUserName['ULogin'];
    	    }
    	    
    	    //si le login est égal au login retourné par la requête
    	    if($userLogin == $loginAlreadyExsist){
    	        $_SESSION["errorUserName"] = "Le nom d'utilisateur est déjà utilisé";
    	        $hasError = TRUE;
    	    }else{
    	        $_SESSION["errorUserName"] = null;
    	    }
    	    
            //Si les deux champs password correspondent
            if($userPassword != $userPasswordVerif){
               $_SESSION["errorPassword"] = "Les mots de passes ne sont pas identiques";
               $hasError = TRUE;
            }else{
                $_SESSION["errorPassword"] = null;
            }
            
            //^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$
            if(!preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $userEmail)){
               $_SESSION["errorEmail"] = "L'email n'est pas correct";
               $hasError = TRUE;
            }else{
                $_SESSION["errorEmail"] = null;
            }
	    }
	    
	    //s'il y a une/des d'erreur/s
	    if($hasError == TRUE){
	        header($urlToCreation);
	    }else{
	        //hash du password
	        $hash = password_hash($userPassword, PASSWORD_DEFAULT);
	        //requête pour la création de l'utilisateur
	        $userCreationDb = $creationManager->setNewUser($userLogin, $hash, $userFirstname, $userLastname, $userEmail, $userBirthdate, userIsActive, $userFkPicUser, userIsAdmin);
	        header($urlToLogin);
	    }
	}
		
	include 'views/User/creation.php';
							
			
?>