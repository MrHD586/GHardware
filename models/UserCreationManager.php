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
		
		
		//Crée un nouvel utilisateur
		public function setNewUser($userLogin, $userPassword, $userFirstname, $userLastName, $userEmail, $userBirthdate, 
		                           $userRoad, $userNpa, $userTown, $userIsActive, $userFkPicUser, $userisAdmin) {
		    //valeurs par défaut
		    $isActive = 1;  //les users sont par défaut actifs
            
			$sql = "INSERT INTO t_user (Login, Password, FirstName, LastName, Email, Birthdate, Road, NPA, Town, isActive, FK_PicUser, isAdmin)
                    VALUES ('$userLogin', '$userPassword', '$userFirstname', '$userLastName', '$userEmail', '$userBirthdate', 
                            '$userRoad', '$userNpa', '$userTown', b'$userIsActive', '$userFkPicUser', b'$userisAdmin')"; 
			$this->dbManager->Query($sql);
		}
		
		//Récupère user par login
		public function userExists($userLogin){
		    $sql = "SELECT COUNT(*) AS userExist FROM t_user WHERE Login = '$userLogin'";
		    $resultat = $this->dbManager->Query($sql);
		    $donnees = $resultat->fetch();
		    $resultat->closeCursor();
		    $resultOfCount = $donnees['userExist'];
		    
		    if($resultOfCount != 0){
		        $resultat = TRUE;
		    }else{
		        $resultat = FALSE;
		    }
		    
		    return $resultat;
		}
		
	
	}
