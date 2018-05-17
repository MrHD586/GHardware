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
    
    //FORMULAIRE//
    echo ' <div class="row">
		<div class="col-xs-offset-1 col-lg-8"> 
	
			<h3>'.$formTitle.'</h3><br/>';
    
    //affichage des messages d'erreures contenus dans le tableau errorsArray
    foreach ($errorsArray as $key => $val) {
        echo '<p style="color:red;">'.$val.'</p>';
    }
    
    echo'<form method="post" action="">
                '.$cat_CreationSucces.'
                    
                <p>
        			<div class="col-lg-2"><label for="Name">Nom</label></div>
        			<div class="col-lg-10"><input type="text" name="Name" value="'.$formCategoryNameValue.'"/></div>
        		</p>

                <p>
    			    <div class="col-lg-2"><label for="IsActive">Actif</label></br></div>
    		        <div class="col-lg-12"><input type="radio" name="isActive" value="1" checked="checked">Oui</input></br></div>
                    <div class="col-lg-12"><input type="radio" name="isActive" value="0">Non</input></div>
    		    </p>
                    
        	    <p>
        		    <div class="col-lg-4"><input type="submit" name="submit" value="Envoyer"/></div>
        	    </p>
        	</form>
			
			</div>
				</div>
            ';