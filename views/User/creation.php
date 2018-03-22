<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Page views/User/creation.php:
    #### 	  Formulaire de création de compte utilisateur
    ################################################################################
    
    //message d'erreurs
    if($_SESSION['message_erreur'] != null){
        $formErrors = $_SESSION['message_erreur'];
    }else{
        $formErrors = null;
    }
    
    echo '
        <h2>Création de votre compte</h2><br/>
		<form method="post" action="">
		      '.$formErrors.'
			<p>
				<label for="Login_User">Votre Login</label>
				<input type="text" name="Login"/>
			</p>
		          
			<p>
				<label for="Password">Votre mot de passe</label>
				<input type="password" name="Password" />
			</p>

            <p>
				<label for="Firstname">Votre prénom</label>
				<input type="text" name="Firstname" />
			</p>

            <p>
				<label for="Lastname">Votre nom</label>
				<input type="text" name="Lastname" />
			</p>

            <p>
				<label for="Email">Votre email</label>
				<input type="email" name="Email" />
			</p>

            <p>
				<label for="Birthdate">Votre date de naissance</label>
				<input type="date" name="Birthdate" />
			</p>
       
		    <p>
			    <input type="submit" name="submit" value="Envoyer"/>
		    </p>
		</form>
    ';