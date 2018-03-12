<?php
	################################################################################
	#### Auteur : Butticaz Yvann   
	#### Date : 26 F�vrier 2018
    #### Classe UserCreationManager :
    #### 		Cette classe poss�de des fonctions effectuants
    ####		des requ�tes souvant utilis�es.
	################################################################################

	//include de la classe DbManager
	include("models/DbManager.php");
	
	
	class UserCreationManager {
		
		private $dbManager;
		
		function __construct(){
			//instantiation de la classe DbManager
			 $this->dbManager = new DbManager();
		}
		
		
		// execute une requ�te
		public function setUser($userLogin, $userPassword, $userFirstname, $userLastName, $userEmail, $userBirthdate, 
		                        $userFkPicUser, $userisAdmin) {
		    //valeurs par d�faut
            $isActive = 1;  //les users sont par d�faut actifs
            $fkPicUser = 1; //l'avatar par d�faut
            $isAdmin = 0;   //les users ne sont pas par d�faut admin
            
            //Si la valeur est diff�rente que celle par d�faut
            if($userFkPicUser != $fkPicUser){
                $fkPicUser = $userFkPicUser;
            }
            
            //Si la valeur est diff�rente que celle par d�faut
            if($userisAdmin != $isAdmin ){
                $isAdmin = $userisAdmin;
            }
            
			$sql = "INSERT INTO t_user (ULogin, UPassword, UFirstName, ULastName, UEmail, UBirthdate, isActive, FK_PicUser, isAdmin)
                    VALUES ('$userLogin', '$userPassword', '$userFirstname', '$userLastName', '$userEmail', '$userBirthdate', 
                            '$isActive', '$fkPicUser', '$isAdmin')"; 
			$resultat = $this->dbManager->Query($sql);
			return $resultat->fetchAll();
		}
		
	
	}
