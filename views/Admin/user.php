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
    echo ' <h3>'.$formTitle.'</h3><br/>';
    
    //affichage des messages d'erreures contenus dans le tableau errorsArray
    foreach ($errorsArray as $key => $val) {
        echo '<p style="color:red;">'.$val.'</p>';
    }
    
    echo'<form method="post" action="">
            '.$user_CreationSucces.'

            <p>
    			<label for="Login_User">Login</label>
    			<input type="text" name="Login" value="'.$formUserLoginValue.'"/>
    		</p>
                  
    		<p>
    			<label for="Password">Mot de passe</label>
    			<input type="password" name="Password"/>
    		</p>
                  
            <p>
    			<label for="PasswordVerif">Confirmation du mot de passe</label>
    			<input type="password" name="PasswordVerif"/>
    		</p>
                  
            <p>
    			<label for="Firstname">Prénom</label>
    			<input type="text" name="Firstname" value="'.$formUserFirstNameValue.'"/>
    		</p>
                  
            <p>
    			<label for="Lastname">Nom</label>
    			<input type="text" name="Lastname" value="'.$formUserLastNameValue.'"/>
    		</p>
                  
            <p>
    			<label for="Email">Email</label>
    			<input type="email" name="Email" value="'.$formUserEmailValue.'"/>
    		</p>
                  
            <p>
    			<label for="Birthdate">Date de naissance</label>
    			<input type="date" name="Birthdate" value="'.$formUserBirthdateValue.'"/>
    		</p>
            
             <p>
    			<label for="Right">Droit</label></br>
                <input type="radio" name="isAdmin" value="0" checked="checked">Utilisateur</input></br>
                <input type="radio" name="isAdmin" value="1">Administrateur</input>
    		</p>

            <p>
    			<label for="IsActive">Actif</label></br>
    		    <input type="radio" name="isActive" value="1" checked="checked">Oui</input></br>
                <input type="radio" name="isActive" value="0">Non</input>
    		</p>
                  
    	    <p>
    		    <input type="submit" name="submit" value="Envoyer"/>
    	    </p>
    	</form>
        ';