<?php 
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Page views/Login/login.php:
    #### 	  Formulaire de login
    ################################################################################
?>

<!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Exercice formulaire</title>
	</head>
	<body>
		<?php
		if ($_SESSION['message_erreur'] != null)
		{
			echo $_SESSION['message_erreur'];
		}	
		?>
			
		<form method="post" action="">
		
			<p>
				<label for="Login_User">Votre Login</label>
	
				<input type="text" name="Login"/> 
					
			</p>
			
				
			<p>
				<label for="password">Votre mot de passe</label>
				<input type="password" name="Password" />
			</p>
		
		<p>
			<input type="submit" name="enregistrer" value="Envoyer"/>
		</p>
		</form>

	</body>
</html>