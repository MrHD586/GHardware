<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 15 Mai 2018
    #### Page views/Admin/acticle.php:
    #### 	  Page de managment des articles avec formulaire et tableau
    ################################################################################
    
    //titre du formulaire
    $pageTitle = "Gestion des articles";
    
    //message lors de création réussite
    if($_SESSION['ar_CreationSucces'] != null){
        $ar_CreationSucces = $_SESSION['ar_CreationSucces']."<br/>";
    }else{
        $ar_CreationSucces = null;
    }
    
    //------ Haut de page ------//
    echo '
        <div class="row">
			<div class="col-xs-offset-1 col-lg-8">
                <h3>'.$pageTitle.'</h3><br/>';
    
    
    //------ TABLEAU ------//
    echo '
		        <div class="col-lg-12">
			        <table id="tabadmin">
        			  <tr>
        				<th>ID</th>
        				<th>Login</th>
        				<th>Prénom</th>
        				<th>Nom</th>
        				<th>E-Mail</th>
        				<th>Date de naissance</th>
        				<th>Droits</th>
        				<th>Actif</th>
        			  </tr>
        			  <tr>
        				<td>1</td>
        				<td>Login</td>
        				<td>Prénom</td>
        				<td>Nom</td>
        				<td>E-Mail</td>
        				<td>Date de naissance</td>
        				<td>Droits</td>
        				<td>Actif</td>
        			  </tr>
        			  <tr>
        				<td>2</td>
        				<td>Login</td>
        				<td>Prénom</td>
        				<td>Nom</td>
        				<td>E-Mail</td>
        				<td>Date de naissance</td>
        				<td>Droits</td>
        				<td>Actif</td>
        			  </tr>
        			  <tr>
        				<td>3</td>
        				<td>Login</td>
        				<td>Prénom</td>
        				<td>Nom</td>
        				<td>E-Mail</td>
        				<td>Date de naissance</td>
        				<td>Droits</td>
        				<td>Actif</td>
        			  </tr>
			        </table>
		        </div> ';
    
    
    //affichage des messages d'erreures contenus dans le tableau errorsArray
    foreach ($errorsArray as $key => $val) {
        echo '<p style="color:red;">'.$val.'</p>';
    }
    
    //------ FORMULAIRE ------//
    echo'
                <form method="post" action="">
                      '.$ar_CreationSucces.'
                        
                      <p>
                		<div class="col-lg-4"><label for="Name">Nom</label></div>
                		<div class="col-lg-8"><input type="text" name="Name" value="'.$formArticleNameValue.'"/></div>
                	  </p>

                      <p>
            			<div class="col-lg-4"><label for="Stock">Stock</label></div>
            			<div class="col-lg-8"><input type="text" name="stock" value="'.$formArticleStockValue.'"/></div>
            		  </p>

                      <p>
            			<div class="col-lg-4"><label for="Price">Prix</label></div>
            			<div class="col-lg-8"><input type="text" name="price" value="'.$formArticlePriceValue.'"/></div>
            		  </p>
                      
                      <p>
            			<div class="col-lg-4"><label for="Description">Déscription</label></div>
            			<div class="col-lg-8"><input type="text" name="description" value="'.$formArticleDescriptionValue.'"/></div>
            		  </p>
                      
                      <p>
            			<div class="col-lg-4"><label for="Category">Catégorie</label></div>
            			<div class="col-lg-12">
                            <select name="category">
                                '; foreach($categoryNameSelect as $value){
                                echo '<option value="'.$value['Ccategorie'].'">'.$value['Ccategorie'].'</option>';
                                   }
                            echo '
                            </select>
                        </div>
            		  </p>

                      <p>
            			<div class="col-lg-4"><label for="Brand">Marque</label></div>
            			<div class="col-lg-12">
                            <select name="Brand">
                                '; foreach($brandName as $value){
                                        echo '<option value="'.$value.'">'.$value.'</option>';
                                   }
                            echo '
                            </select>
                        </div>
            		  </p>

                      <p>
            			<div class="col-lg-4"><label for="PicArticle">Images</label></div>
            			<div class="col-lg-12">
                            <select name="PicArticle">
                                '; foreach($picArticle as $value){
                                        echo '<option value="'.$value.'">'.$value.'</option>';
                                   }
                            echo '
                            </select>
                        </div>
            		  </p>
                			    
                      <p>
            			<div class="col-lg-4"><label for="IsActive">Actif</label></br></div>
            		    <div class="col-lg-12"><input type="radio" name="isActive" value="1" checked="checked">Oui</input></br></div>
                        <div class="col-lg-12"><input type="radio" name="isActive" value="0">Non</input></div>
            		  </p>
                			    
                	  <p>
                        <div class="col-lg-12"></div>
                		<div class="col-xs-offset-2 col-lg-2"><input type="submit" name="submit" value="Envoyer"/></div>
                	    <div class="col-lg-12"></div>
                      </p>
            	</form>
            </div>
        </div>';
