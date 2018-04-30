<?php 
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 F�vrier 2018
    #### Page views/Login/login.php:
    #### 	  Formulaire de login
    ################################################################################
    
    
    //message d'erreurs
    if($_SESSION['message_erreur'] != null){
        $formErrors = $_SESSION['message_erreur'];
    }else{
        $formErrors = null;
    }
    if($_GET['Paniercookie']==1){
        echo '<h2>Veuillez-vous connecter ou crée un compte avant de pouvoir commander</h2><br/>';
    }else{
        echo ' <h2>Connexion</h2><br/>';
    }     
    echo'
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
			    <input type="submit" name="submit" value="Envoyer"/>
               <a href="index.php?controller=User&action=creation">vous n\'avez pas de compte ?</a>
		    </p>
		</form>
    ';