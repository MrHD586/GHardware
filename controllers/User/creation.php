<?php 
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Page controllers/Login/login.php:
    #### 	  control du login
    ################################################################################
   
    //include de la classe DbManager
    include("models/UserCreationManager.php");
    
    
    // ----- LIEN POUR REDIRECTION ----- //
    //redirection sur création si erreurs
    $urlToCreation = "location:index.php?controller=User&action=creation";
    //login
    $urlToLogin = "location:index.php?controller=Login&action=login";
    //login panier
    $urlToLoginPanier = "location:index.php?controller=Login&action=login&Paniercookie=1";
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
	    $userRoad = $_POST['Road'];
	    $userNpa = $_POST['Npa'];
	    $userTown = $_POST['Town'];
	    $userFkPicUser = 1; // 1 = avatar par défaut
	    define("userIsAdmin", 0); //les users ne sont pas par défaut admin
	    define("userIsActive", 1); //les users sont par défaut actifs
	   
	    //si un champ est vides
	    if(empty($userLogin) || empty($userPasswordRaw) || empty($userPasswordVerifRaw) || empty($userFirstName)|| empty($userLastName) || 
	        empty($userEmail) || empty($userBirthdate) || empty($userRoad) || empty($userNpa) || empty($userTown)){
	       
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
            
            //si le prénom contient que des lettres
            if(!preg_match('/^[\pL\pM\p{Zs}.-]+$/u', $userFirstName)){
                $errors[] = "Votre prénom ne peut pas contenir de chiffres";
            }
            
            //si le nom contient que des lettres
            if(!preg_match('/^[\pL\pM\p{Zs}.-]+$/u', $userLastName)){
                $errors[] = "Votre nom ne peut pas contenir de chiffres";
            }
            
            //email
            if(!preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $userEmail)){
                $errors[] = "L'email n'est pas correct";
            }
                        
            //si le npa contient que des chiffres
            if (!preg_match('/^[0-9]+$/', $userNpa)) {
                $errors[] = "Le code postal ne peut pas contenir de lettres";
            }
            
            //si la ville contient que des lettres
            if(!preg_match('/^[\pL\pM\p{Zs}.-]+$/u', $userTown)){
                $errors[] = "La ville ne de chiffres";
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
	        $formUserRoadValue = $userRoad;
	        $formUserNpaValue = $userNpa;
	        $formUserTownValue = $userTown;
	        
	    }else{
	        //hash du password
	        $hash = password_hash($userPasswordMD5, PASSWORD_DEFAULT);
	        //requête pour la création de l'utilisateur
	        $userCreationDb = $creationManager->setNewUser($userLogin, $hash, $userFirstName, $userLastName, $userEmail, $userBirthdate,
	                          $userRoad, $userNpa, $userTown, userIsActive, $userFkPicUser, userIsAdmin);
	        if($_POST['Paniercookie']==1){
	        header($urlToLoginPanier);
	        }else{
	        header($urlToLogin);
	        }
	    }
	}
		
	include 'views/User/creation.php';
							
			
?>