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
			
		<form method="post" action="index.php?page=connexion">
		
			<p>
				<label for="Login_User">Votre Login</label>
	
				<input type="text" name="Login"  placeholder="Login" /> 
					
			</p>
			
				
			<p>
				<label for="password">Votre mot de passe</label>
				<input type="password" name="password" />
			</p>
		<?php 
			echo '<p> Votre adresse IP ' . $_SERVER['REMOTE_ADDR'] . ' </p>'; 
		?>
		
		<p>
			<input type="submit" name="enregistrer" value="Envoyer"/>
		</p>
		</form>
		<a href="index.php?destroy=true"> Destroy</a>

	</body>
</html>