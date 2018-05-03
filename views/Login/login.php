<?php 
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 F�vrier 2018
    #### Page views/Login/login.php:
    #### 	  Formulaire de login
    ################################################################################
    
	echo'
	
	<div class="row">
		<div class="col-xs-offset-1 col-lg-8">
			';
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
			
		</div>
	</div>
	
	<div class="row">
		<div class="col-xs-offset-1 col-lg-8">
			<form method="post" action="">
		      '.$formErrors.'
			<p>
				<!-- Login -->
				<div class="col-lg-4"><label for="Login_User">Utilisateur</label></div>
				<div class="col-lg-8"><input type="text" name="Login"/></div>
			</p>
			
			<p>
				<!-- Password -->
				<div class="col-lg-4"><label for="password">Mot de Passe</label></div>
				<div class="col-lg-8"><input type="password" name="Password" /></div>
			</p>
		
		    <p>
				<!-- Submit Button -->
			    <div class="col-xs-offset-2 col-lg-2"><input type="submit" name="submit" value="Envoyer"/></div>
                <div class="col-lg-5"><div id="forgotten"><a href="index.php?controller=User&action=creation">Vous n\'avez pas de compte ?</a></div></div>
		    </p>
		</form>
		</div>
	</div>
	
	
	';