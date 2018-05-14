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
    
    //message d'erreurs champs vides
    if($_SESSION['user_ErrorEmptyField'] != null){
        $user_ErrorEmptyField = $_SESSION['user_ErrorEmptyField']."<br/>";
    }else{
        $user_ErrorEmptyField = null;
    }
    
    //message d'erreurs nom d'utilisateur
    if($_SESSION['user_ErrorUserName'] != null){
        $user_ErrorUserName = $_SESSION['user_ErrorUserName']."<br/>";
    }else{
        $user_ErrorUserName = null;
    }
    
    //message d'erreurs mot de passe
    if($_SESSION['user_ErrorPassword'] != null){
        $user_ErrorPassword = $_SESSION['user_ErrorPassword']."<br/>";
    }else{
        $user_ErrorPassword = null;
    }
    
    //message d'erreurs email
    if($_SESSION['user_ErrorEmail'] != null){
        $user_ErrorEmail = $_SESSION['user_ErrorEmail']."<br/>";
    }else{
        $user_ErrorEmail = null;
    }
    
    
    //FORMULAIRE//
    echo ' <h3>'.$formTitle.'</h3><br/>';
    
    echo'<form method="post" action="">
            '.$user_CreationSucces.'
            '.$user_ErrorEmptyField.'
            '.$user_ErrorUserName.'
            '.$user_ErrorPassword.'
            '.$user_ErrorEmail.'

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
    			<input type="date" name="Birthdate" value="'.$formUserEmailValue.'"/>
    		</p>
            
             <p>
    			<label for="Right">Droit</label></br>
                <input type="radio" name="IsAdmin" value="0" checked="checked">Utilisateur</input></br>
                <input type="radio" name="IsAdmin" value="1">Administrateur</input>
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