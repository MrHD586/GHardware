<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 14 Mai 2018
    #### Page views/Admin/category.php:
    #### 	  Page de managment des categories avec formulaire et tableau
    ################################################################################
    
    //titre du formulaire
    $formTitle = "Gestion des catégories";
    
    //message lors de création réussite
    if($_SESSION['cat_CreationSucces'] != null){
        $cat_CreationSucces = $_SESSION['cat_CreationSucces']."<br/>";
    }else{
        $cat_CreationSucces = null;
    }
    
    //message d'erreurs champs vides
    if($_SESSION['cat_ErrorEmptyField'] != null){
        $cat_ErrorEmptyField = $_SESSION['cat_ErrorEmptyField']."<br/>";
    }else{
        $cat_ErrorEmptyField = null;
    }
    
    //message d'erreurs nom
    if($_SESSION['cat_ErrorName'] != null){
        $cat_ErrorName = $_SESSION['cat_ErrorName']."<br/>";
    }else{
        $cat_ErrorName = null;
    }
    
    //FORMULAIRE//
    echo ' <h3>'.$formTitle.'</h3><br/>';
    
    echo'<form method="post" action="">
                '.$cat_CreationSucces.'
                '.$cat_ErrorEmptyField.'
                    
                <p>
        			<label for="Name">Nom</label>
        			<input type="text" name="Name"/>
        		</p>

                <p>
    			    <label for="IsActive">Actif</label></br>
    		        <input type="radio" name="IsAdmin" value="1" checked="checked">Oui</input></br>
                    <input type="radio" name="IsAdmin" value="0">Non</input>
    		    </p>
                    
        	    <p>
        		    <input type="submit" name="submit" value="Envoyer"/>
        	    </p>
        	</form>
            ';