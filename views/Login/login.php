<?php 
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Page views/Login/login.php:
    #### 	  Formulaire de login
    ################################################################################
    
    //message d'erreurs
    if($_SESSION['message_erreur'] != null){
        $formErrors = $_SESSION['message_erreur'];
    }else{
        $formErrors = null;
    }

    echo '
		<form method="post" action="">
		      '.$formErrors.'
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
    ';