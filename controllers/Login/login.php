<?php 
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Page controllers/Login/login.php:
    #### 	  control du login
    ################################################################################
   
    //include de la classe DbManager
    include("models/LoginManager.php");
        
	if(isset($_POST['enregistrer'])) {
		
	    if($_POST['Login']){
	        
	        //instantiation de la classe LoginManager
	        $loginManager = new LoginManager();
	        
	        $userLogin = $_POST['Login'];

	        $userLoginDb = $loginManager->getLogin($userLogin);

	        $row = $userLoginDb;	
	        
			if (is_array($row) && $_POST['Password'] == $row['UPassword']){
				if($row['isAdmin'] == 1){
					//redirection sur la page admin
				}else{
				    //redirection sur la page home
				}
			}else{
				$_SESSION['message_erreur'] = "Le login ou le mot de passe est incorrect";
				//redirection sur la page login 
			}
			
					
		}else{
			$_SESSION['message_erreur'] = "Le nom d'utilisateur est inconnu";
			//redirection sur la page login
		} 
		
	}
		
	
	include 'views/Login/login.php';
							
			
?>