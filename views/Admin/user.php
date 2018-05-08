<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 08 Mai 2018
    #### Page views/Admin/user.php:
    #### 	  Page de managment des utilisateur avec formulaire et tableau
    ################################################################################

    echo'
    	<div class="row">
    		<div class="col-xs-offset-1 col-lg-8">
        ';
    
                //messages d'erreurs
                if($_SESSION['message_erreur'] != null){
                    $formErrors = $_SESSION['message_erreur'];
                }else{
                    $formErrors = null;
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
    				<div class="col-lg-8"><input type="text" name="Login"/></div>';
                 
                    if($_GET['Paniercookie']==1){
                        echo' <input type="hidden" name="Paniercookie" value="1">';
                    }
                   
                echo'
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