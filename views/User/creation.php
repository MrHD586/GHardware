<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Page views/User/creation.php:
    #### 	  Formulaire de création de compte utilisateur
    ################################################################################
    
    //titre du formulaire
    $formTitle = "Gestion de compte";
    
    echo ' <h2>'.$formTitle.'</h2><br/>';
    
    //affichage des messages d'erreures contenus dans le tableau errorsArray
    foreach ($errorsArray as $key => $val) {
        echo '<p style="color:red;">'.$val.'</p>';
    }   
	
	echo'<form method="post" action="">
		      
			<p>
				<label for="Login_User">Votre Login</label>
				<input type="text" name="Login" value="'.$formUserLoginValue.'"/>
			</p>
		          
			<p>
				<label for="Password">Votre mot de passe</label>
				<input type="password" name="Password" />
			</p>

            <p>
				<label for="PasswordVerif">Confirmation du mot de passe</label>
				<input type="password" name="PasswordVerif" />
			</p>

            <p>
				<label for="Firstname">Votre prénom</label>
				<input type="text" name="Firstname" value="'.$formUserFirstNameValue.'"/>
			</p>

            <p>
				<label for="Lastname">Votre nom</label>
				<input type="text" name="Lastname" value="'.$formUserLastNameValue.'"/>
			</p>

            <p>
				<label for="Email">Votre email</label>
				<input type="email" name="Email" value="'.$formUserEmailValue.'"/>
			</p>

            <p>
				<label for="Birthdate">Votre date de naissance</label>
				<input type="date" name="Birthdate" value="'.$formUserBirthdateValue.'"/>
			</p>
       
		    <p>
			    <input type="submit" name="submit" value="Envoyer"/>
		    </p>
		</form>
    ';