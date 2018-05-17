<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Page views/Admin/user.php:
    #### 	  Page de managment des utilisateurs avec formulaire et tableau
    ################################################################################
    
    //titre du formulaire
    $formTitle = "Gestion de compte";
    
    //message lors de création réussite
    if($_SESSION['user_CreationSucces'] != null){
        $user_CreationSucces = $_SESSION['user_CreationSucces']."<br/>";
    }else{
        $user_CreationSucces = null;
    }
        
    
    //FORMULAIRE//
    echo '<div class="row">
		<div class="col-xs-offset-1 col-lg-8"> 
		<h3>'.$formTitle.'</h3><br/>';
    
    //affichage des messages d'erreures contenus dans le tableau errorsArray
    foreach ($errorsArray as $key => $val) {
        echo '<p style="color:red;">'.$val.'</p>';
    }
    
    echo'<form method="post" action="">
            '.$user_CreationSucces.'

            <p>
    			<div class="col-lg-4"><label for="Login_User">Login</label></div>
    			<div class="col-lg-8"><input type="text" name="Login" value="'.$formUserLoginValue.'"/></div>
    		</p>
                  
    		<p>
    			<div class="col-lg-4"><label for="Password">Mot de passe</label></div>
    			<div class="col-lg-8"><input type="password" name="Password"/></div>
    		</p>
                  
            <p>
    			<div class="col-lg-4"><label for="PasswordVerif">Confirmation MDP</label></div>
    			<div class="col-lg-8"><input type="password" name="PasswordVerif"/></div>
    		</p>
                  
            <p>
    			<div class="col-lg-4"><label for="Firstname">Prénom</label></div>
    			<div class="col-lg-8"><input type="text" name="Firstname" value="'.$formUserFirstNameValue.'"/></div>
    		</p>
                  
            <p>
    			<div class="col-lg-4"><label for="Lastname">Nom</label></div>
    			<div class="col-lg-8"><input type="text" name="Lastname" value="'.$formUserLastNameValue.'"/></div>
    		</p>
                  
            <p>
    			<div class="col-lg-4"><label for="Email">Email</label></div>
    			<div class="col-lg-8"><input type="email" name="Email" value="'.$formUserEmailValue.'"/></div>
    		</p>
                  
            <p>
    			<div class="col-lg-4"><label for="Birthdate">Date de naissance</label></div>
    			<div class="col-lg-8"><input type="date" name="Birthdate" value="'.$formUserBirthdateValue.'"/></div>
    		</p>
            
             <p>
    			<div class="col-lg-4"><label for="Right">Droit</label></div></br>
                <div class="col-lg-12"><input type="radio" name="isAdmin" value="0" checked="checked">Utilisateur</input></div></br>
                <div class="col-lg-12"><input type="radio" name="isAdmin" value="1">Administrateur</input></div>
    		</p>

            <p>
    			<div class="col-lg-4"><label for="IsActive">Actif</label></div></br>
    		    <div class="col-lg-12"><input type="radio" name="isActive" value="1" checked="checked">Oui</input></div></br>
                <div class="col-lg-12"><input type="radio" name="isActive" value="0">Non</input></div>
    		</p>
                  
    	    <p>
				<div class="col-lg-12"></div>
    		    <div class="col-lg-2"><input type="submit" name="submit" value="Envoyer"/></div>
				<div class="col-lg-12"></div>
		   </p>
    	</form>
		
			</div>
		</div>
        ';