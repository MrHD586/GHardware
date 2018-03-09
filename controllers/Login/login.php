<?php 
################################################################################
#### Auteur : Butticaz Yvann
#### Date : 27 Février 2018
#### Page controllers/Login/login.php:
#### 		  control du login
################################################################################
   
    //include de la classe DbManager
    include("models/DbManager.php");
        
	if(isset($_POST['enregistrer'])) {
		
	    if($_POST['Login']){
	       
	        private $dbManager;
	        
	        //instantiation de la classe DbManager
	        $this->dbManager = new DbManager();
	        
			$userName = $_POST['Login'];
		
			$sql = 'SELECT * FROM t_user WHERE ULogin = :userName';

			$sql->bindParam(':userName', $userName);

			$resultat = $this->dbManager->Query($sql);

			$row = $resultat->fetch();					
			if (is_array($row) && $_POST['password'] == $row['Mot_De_Passe_User']){
				if($row['Fk_Privileges'] == 1){
					?> <script>document.location.href="?page=admin";</script><?php
				}else{
					?> <script>document.location.href="?page=accueil_comptable";</script><?php
				}
			}else{
				$_SESSION['message_erreur'] = "Le login ou le mot de passe est incorrect";
				?> <script>document.location.href="?page=accueil";</script><?php
			}
			
					
		}else{
			$_SESSION['message_erreur'] = "Le nom d'utilisateur est inconnu";
			?> <script>document.location.href="?page=accueil";</script><?php
			//header('Location: index.php');
		} 
		
		
		
		
	}
		
	
	include 'views/Login/login.php';
							
			
?>