<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Page views/User/creation.php:
    #### 	  Formulaire de création de compte utilisateur
    ################################################################################
    
   
    //message d'erreurs champs vide
    if($_SESSION['errorEmptyField'] != null){
        $errorEmptyField = $_SESSION['errorEmptyField']."<br/>";
    }else{
        $errorEmptyField = null;
    }

    //message d'erreurs nom d'utilisateur
    if($_SESSION['errorUserName'] != null){
        $errorUserName = $_SESSION['errorUserName']."<br/>";
    }else{
        $errorUserName = null;
    }
       
    //message d'erreurs mot de passe
    if($_SESSION['errorPassword'] != null){
        $errorPassword = $_SESSION['errorPassword']."<br/>";
    }else{
        $errorPassword = null;
    }
    
    //message d'erreurs email
    if($_SESSION['errorEmail'] != null){
        $errorEmail = $_SESSION['errorEmail']."<br/>";
    }else{
        $errorEmail = null;
    }
    echo ' <h2>Création de votre compte</h2><br/>';
     
		echo'<form method="post" action="">
		      '.$errorEmptyField.'
              '.$errorUserName.'
              '.$errorPassword.'
              '.$errorEmail.'
			<p>
				<label for="Login_User">Votre Login</label>
				<input type="text" name="Login"/>
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