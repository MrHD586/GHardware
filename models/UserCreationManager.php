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
		                          $userRoad, $userNpa, $userTown, $userIsActive, $userFkPicUser, $userIsAdmin){
            
			$sql = "INSERT INTO t_user (Login, Password, FirstName, LastName, Email, Birthdate, Road, NPA, Town, isActive, Fk_ImageUser, isAdmin)
                    VALUES ('".addslashes($userLogin)."', '$userPassword', '".addslashes($userFirstname)."', '".addslashes($userLastName)."',
                              '$userEmail', '$userBirthdate', '".addslashes($userRoad)."', '$userNpa',  '".addslashes($userTown)."', b'$userIsActive', '$userFkPicUser', b'$userIsAdmin')"; 
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
		
	       
		//Récupère les utilisateurs par id
		public function getUserById($idUser) {
		    $sql = "SELECT * FROM t_user WHERE idUser =".intval($idUser);
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
		
		//récupére et recherche les utilisateurs actives
		public function searchActiveUser($search_keyword, $limit = null){
		    $sql = "SELECT * FROM t_user WHERE isActive = 1 AND (Login LIKE :keyword OR FirstName LIKE :keyword OR LastName LIKE :keyword
                    OR Email LIKE :keyword OR Birthdate LIKE :keyword OR Road LIKE :keyword OR NPA LIKE :keyword
                    OR Town LIKE :keyword) ORDER BY idUser";
		    
		    if(empty($limit) || $limit == NULL){
		        $resultat = $this->dbManager->tablesQuery($sql, $search_keyword);
		    }else{
		        $sqlQuery = $sql.$limit;
		        $resultat = $this->dbManager->tablesQuery($sqlQuery, $search_keyword);
		    }
		    
		    return $resultat;
		}
		
		
		//récupére et recherche les utilisateurs inactives
		public function searchInactiveUser($search_keyword, $limit = null){
		    $sql = "SELECT * FROM t_user WHERE isActive = 0 AND (Login LIKE :keyword OR FirstName LIKE :keyword OR LastName LIKE :keyword
                    OR Email LIKE :keyword OR Birthdate LIKE :keyword OR Road LIKE :keyword OR NPA LIKE :keyword
                    OR Town LIKE :keyword) ORDER BY idUser";
		    
		    if(empty($limit) || $limit == NULL){
		        $resultat = $this->dbManager->tablesQuery($sql, $search_keyword);
		    }else{
		        $sqlQuery = $sql.$limit;
		        $resultat = $this->dbManager->tablesQuery($sqlQuery, $search_keyword);
		    }
		    
		    return $resultat;
		}
		
		//Modifie un utilisateurs existant
		public function modifyUserById($userId, $userLogin, $userPassword, $userFirstname, $userLastName, $userEmail, $userBirthdate,
		    $userRoad, $userNpa, $userTown, $userIsActive, $userFkPicUser, $userIsAdmin){
           if($userPassword == NULL){
               $sql = "UPDATE t_user SET Login = '".addslashes($userLogin)."', FirstName = '".addslashes($userFirstname)."', 
                    LastName = '".addslashes($userLastName)."', Email = '$userEmail', Birthdate = '$userBirthdate',
                    Road = '".addslashes($userRoad)."', NPA = '$userNpa', Town = '".addslashes($userTown)."',
                    isActive = b'$userIsActive', isAdmin = b'$userIsAdmin' WHERE idUser =".intval($userId);
           }else{
               $sql = "UPDATE t_user SET Login = '".addslashes($userLogin)."', Password = '$userPassword', 
                      FirstName = '".addslashes($userFirstname)."', LastName = '".addslashes($userLastName)."',
                      Email = '$userEmail', Birthdate = '$userBirthdate', Road = '".addslashes($userRoad)."', NPA = '$userNpa', 
                      Town = '".addslashes($userTown)."', isActive = b'$userIsActive', isAdmin = b'$userIsAdmin' WHERE idUser =".intval($userId);
           }
           
	       $resultat = $this->dbManager->Query($sql);
		}
		
		//Rend inactif les utilisateurs
		public function setUserInactiveById($userId) {
		    $sql = "UPDATE t_user SET isActive = b'0' WHERE idUser =".intval($userId);
		    $resultat = $this->dbManager->Query($sql);
		}	
	}
