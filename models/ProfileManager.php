<?php
	################################################################################
	#### Auteur : Butticaz Yvann   
	#### Date : 24 Mai 2018
    #### Classe ProfileManager :
	#### 		Cette classe posè�de des fonctions effectuants
    ####		des requêtes souvant utilisées.
	################################################################################

	//include de la classe DbManager
	include("models/DbManager.php");
	
	class ProfileManager {
		
		private $dbManager;
		
		function __construct(){
			//instantiation de la classe DbManager
			 $this->dbManager = new DbManager();
		}
		
		// récupére les noms des catégories
		public function getCategoryName() {
		    $sql = "SELECT CName FROM t_category WHERE isActive = 1 ORDER BY CName";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
		
		
		//Vérifie si le login exsiste déjà ou non
		public function userLoginExists($userLogin){
		    $sql = "SELECT COUNT(*) AS loginExists FROM t_user WHERE Login = '$userLogin'";
		    $resultat = $this->dbManager->Query($sql);
		    $donnees = $resultat->fetch();
		    $resultat->closeCursor();
		    $resultOfCount = $donnees['loginExists'];
		    
		    if($resultOfCount != 0){
		        $resultat = TRUE;
		    }else{
		        $resultat = FALSE;
		    }
		    
		    return $resultat;
		}
		
		
		//Récupère l'id d'un utilisateur selon son login
		public function getUserByLogin($userLogin){
		    $sql = "SELECT * FROM t_user WHERE Login ='$userLogin'";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
		
		//Modifie le login
		public function modifyUserLoginById($userId, $userLogin){
		    $sql = "UPDATE t_user SET Login = '".addslashes($userLogin)."' WHERE idUser =".intval($userId);
		        
		    $resultat = $this->dbManager->Query($sql);
		}
		
		//Modifie le prénom
		public function modifyUserFirstNameById($userId, $userFirstName){
		    $sql = "UPDATE t_user SET FirstName = '".addslashes($userFirstName)."' WHERE idUser =".intval($userId);
		    
		    $resultat = $this->dbManager->Query($sql);
		}
		
		//Modifie le nom
		public function modifyUserLastNameById($userId, $userLastName){
		    $sql = "UPDATE t_user SET LastName = '".addslashes($userLastName)."' WHERE idUser =".intval($userId);
		    
		    $resultat = $this->dbManager->Query($sql);
		}
		
		//Modifie la date de naissance
		public function modifyUserBirthDateById($userId, $userBirthDate){
		    $sql = "UPDATE t_user SET Birthdate = '$userBirthDate' WHERE idUser =".intval($userId);
		    
		    $resultat = $this->dbManager->Query($sql);
		}
		
		//Modifie l'adresse
		public function modifyUserAddressById($userId, $userRoad, $userNpa, $userTown){
		    $sql = "UPDATE t_user SET Road = '".addslashes($userRoad)."', NPA = '$userNpa', Town = '".addslashes($userTown)."'
                    WHERE idUser =".intval($userId);
		    
		    $resultat = $this->dbManager->Query($sql);
		}
		
		//Modifie le mot de passe
		public function modifyUserPasswordById($userId, $userPassword){
		    $sql = "UPDATE t_user SET Password = '$userPassword'  WHERE idUser =".intval($userId);
		    
		    $resultat = $this->dbManager->Query($sql);
		}
	}
