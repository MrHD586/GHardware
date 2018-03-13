<?php
	################################################################################
	#### Auteur : Butticaz Yvann   
	#### Date : 26 Février 2018
    #### Classe UserCreationManager :
    #### 		Cette classe possède des fonctions effectuants
    ####		des requêtes souvant utilisées.
	################################################################################

	//include de la classe DbManager
	include("models/DbManager.php");
	
	
	class UserCreationManager {
		
		private $dbManager;
		
		function __construct(){
			//instantiation de la classe DbManager
			 $this->dbManager = new DbManager();
		}
		
		
		// execute une requête
		public function setNewUser($userLogin, $userPassword, $userFirstname, $userLastName, $userEmail, $userBirthdate, 
		                        $userFkPicUser, $userisAdmin) {
		    //valeurs par défaut
		    $isActive = 1;  //les users sont par défaut actifs
            $fkPicUser = 1; //l'avatar par défaut
            $isAdmin = 0;   //les users ne sont pas par défaut admin
            
			$sql = "INSERT INTO t_user (ULogin, UPassword, UFirstName, ULastName, UEmail, UBirthdate, isActive, FK_PicUser, isAdmin)
                    VALUES ('$userLogin', '$userPassword', '$userFirstname', '$userLastName', '$userEmail', '$userBirthdate', 
                            b'$isActive', '$fkPicUser', b'$isAdmin')"; 
			$this->dbManager->Query($sql);
		}
		
	
	}
