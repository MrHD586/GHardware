<?php
	session_start();
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Page views/User/creation.php:
    #### 	  Formulaire de création de compte utilisateur
    ################################################################################
    
    //titre du formulaire
    $formTitle = "Création de compte";
    
    echo ' <div class="row">
		<div class="col-xs-offset-1 col-lg-8"> 
		
		<h3>'.$formTitle.'</h3><br/>';
    
    //affichage des messages d'erreures contenus dans le tableau errorsArray
    foreach ($errorsArray as $key => $val) {
        echo '<p style="color:red;">'.$val.'</p>';
    }       
	
	echo'<form method="post" action="">
		      
			<p>
				<div class="col-lg-4"><label for="Login_User">Votre Login</label></div>
				<div class="col-lg-8"><input type="text" name="Login" value="'.$formUserLoginValue.'"/></div>
			</p>
		          
			<p>
				<div class="col-lg-4"><label for="Password">Votre mot de passe</label></div>
				<div class="col-lg-8"><input type="password" name="Password" /></div>
			</p>

            <p>
				<div class="col-lg-4"><label for="PasswordVerif">Confirmation MDP</label></div>
				<div class="col-lg-8"><input type="password" name="PasswordVerif" /></div>
			</p>

            <p>
				<div class="col-lg-4"><label for="Firstname">Votre prénom</label></div>
				<div class="col-lg-8"><input type="text" name="Firstname" value="'.$formUserFirstNameValue.'"/></div>
			</p>

            <p>
				<div class="col-lg-4"><label for="Lastname">Votre nom</label></div>
				<div class="col-lg-8"><input type="text" name="Lastname" value="'.$formUserLastNameValue.'"/></div>
			</p>

            <p>
				<div class="col-lg-4"><label for="Email">Votre email</label></div>
				<div class="col-lg-8"><input type="email" name="Email" value="'.$formUserEmailValue.'"/></div>
			</p>

            <p>
				<div class="col-lg-4"><label for="Birthdate">Votre date de naissance</label></div>
				<div class="col-lg-8"><input type="date" name="Birthdate" value="'.$formUserBirthdateValue.'"/></div>
			</p>
			
			<p>
				<div class="col-lg-4"><label for="Road">Rue</label></div>
				<div class="col-lg-8"><input type="text" name="Road" value="'.$formUserRoadValue.'"/></div>
			</p>
			
			<p>
				<div class="col-lg-4"><label for="Npa">Code Postal</label></div>
				<div class="col-lg-8"><input type="text" name="Npa" maxlength="4" value="'.$formUserNpaValue.'"/></div>
			</p>

			<p>
				<div class="col-lg-4"><label for="Town">Ville</label></div>
				<div class="col-lg-8"><input type="text" name="Town" value="'.$formUserTownValue.'"/></div>
			</p>';
			include 'captcha.php';
			//<p>
				//<div class="col-lg-4"><label for="captcha">Recopiez les chiffres : <img src="../captcha.php" alt="Captcha" /></label></div>
				//<div class="col-lg-8"><input type="text" name="captcha" id="captcha" /></div>
			//</p>
            if($_GET['Paniercookie']==1){
                echo' <input type="hidden" name="Paniercookie" value="1">';
            }
            if($_SESSION['captcharéussi']==1){
            echo'
       
		    <p>
			    <div class=" col-lg-12"><input type="submit" name="submit" value="Envoyer"/></div>
		    </p>';  
            }
		echo'</form>
	</div>
		</div>
    ';