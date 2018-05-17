<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 15 Mai 2018
    #### Page views/Admin/acticle.php:
    #### 	  Page de managment des articles avec formulaire et tableau
    ################################################################################
    
    //titre du formulaire
    $formTitle = "Gestion des articles";
    
    //message lors de création réussite
    if($_SESSION['ar_CreationSucces'] != null){
        $ar_CreationSucces = $_SESSION['ar_CreationSucces']."<br/>";
    }else{
        $ar_CreationSucces = null;
    }
    
    //FORMULAIRE//
    echo ' <h3>'.$formTitle.'</h3><br/>';
    
    //affichage des messages d'erreures contenus dans le tableau errorsArray
    foreach ($errorsArray as $key => $val) {
        echo '<p style="color:red;">'.$val.'</p>';
    }
    
    echo'<form method="post" action="">
                        '.$ar_CreationSucces.'
                            
                        <p>
                			<label for="Name">Nom</label>
                			<input type="text" name="Name" value="'.$formArticleNameValue.'"/>
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
