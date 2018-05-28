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
                <h2>'.$pageTitle.'</h2><br/>';
       
    
    //------ TABLEAU ------//
    echo '
        <div class="col-lg-12">
        ';
        
            if($_GET['inactive']){
                echo '<a style="margin-left:590px;"href="index.php?controller=Admin&action=article">Affichage des actifs</a>';
            }else{
                echo '<a style="margin-left:580px;"href="index.php?controller=Admin&action=article&inactive=TRUE">Affichage des inactifs</a>';
            }
    echo '
            <table id="tabadmin">
    		  <tr>
    			<th>ID</th>
    			<th>Nom</th>
    			<th>Stock</th>
    			<th>Prix</th>
    			<th>Description</th>
    			<th>Catégorie</th>
                <th>Marque</th>
                <th>Image</th>
                <th>Actif</th>
                <th>Action</th>
    		  </tr>
    ';
    
  
    //affichage de toutes les données articles dans le form
    foreach ($TableList as $value) {
        echo '
              <tr>
        		<td>'.$value["idArticle"].'</td>
        		<td>'.$value["AName"].'</td>
        		<td>'.$value["AStock"].'</td>
        		<td>'.$value["APrix"].'</td>
        		<td>'.$value["ADescription"].'</td>
        		<td>'.$value["Fk_Categories"].'</td>
                <td>'.$value["Fk_Marque"].'</td>
        		<td>'.$value["Fk_PicArticles"].'</td>
         ';
                if($value["isActive"] == 1){
                    echo '<td>Oui</td>';
                }else{
                    echo '<td>Non</td>';
                }
                
                //Bouton d'édition
                $editButton = '<a href="index.php?controller=Admin&action=article&modif='.$value["idArticle"].'">
                               <img src="images/action_edit.gif" alt="" title="Editer" /></a>';
                
                //Le bouton d'archivage n'est pas afficher si le tableau affiche les élements inactifs
                if(!$inactiveParam){
                    $archiveButton = '<a href="index.php?controller=Admin&action=article&archive='.$value["idArticle"].'" onclick="return confirm("Voulez-vous vraiment archiver cet élément ?")">
                                      <img src="images/action_archive.gif" alt="" title="Archiver" /></a>';
                }
                
                
        echo '
                <td>'.$editButton.$archiveButton.'</td>
        	  </tr>
        ';
    }
        			  
	echo '  </table>     
		</div> ';
    
	
    
	//------ FORMULAIRE ------//
        
   
    //titre du formulaire
    if(!empty($modifParam)){
        $formTitle = "Modification d'un article";
        
    }else{
        $formTitle ="Saisie d'un nouvel article";
    }
    
    
    echo'
                <form method="post" action="">
                      <h3>'.$formTitle.'</h3>

        ';
                //affichage des messages d'erreures contenus dans le tableau errorsArray
                foreach ($errorsArray as $key => $val) {
                    echo '<p style="color:red;">'.$val.'</p>';
                }
    echo'            
                      
                      './/message de validation
                        $ar_CreationSucces.'
                        
                      <input type="hidden" value="'.$formArticleIdValue.'" id="hiddenId" name="hiddenId"/>
                        
                      <p>
                		<div class="col-lg-4"><label for="Name">Nom</label></div>
                		<div class="col-lg-8"><input type="text" name="Name" value="'.$formArticleNameValue.'"/></div>
                	  </p>

                      <p>
            			<div class="col-lg-4"><label for="Stock">Stock</label></div>
            			<div class="col-lg-8"><input type="text" name="Stock" value="'.$formArticleStockValue.'"/></div>
            		  </p>

                      <p>
            			<div class="col-lg-4"><label for="Price">Prix</label></div>
            			<div class="col-lg-8"><input type="text" name="Price" value="'.$formArticlePriceValue.'"/></div>
            		  </p>
                      
                      <p>
            			<div class="col-lg-4"><label for="Description">Déscription</label></div>
            			<div class="col-lg-8"><input type="text" name="Description" value="'.$formArticleDescriptionValue.'"/></div>
            		  </p>
                      
                      <p>
            			<div class="col-lg-4"><label for="Category">Catégorie</label></div>
            			<div class="col-lg-12">
                            <select name="Category">
                               <option style="display:none;" selected label="Veulliez choisir une catégorie " value="0">
                                '; foreach($categoryNameSelect as $value){
                                        if($formArticleCategoryValue == $value['idCategories']){
                                            echo '<option selected="selected" value="'.$value['idCategories'].'">'.$value['CCategorie'].'</option>';
                                        }else{
                                            echo '<option value="'.$value['idCategories'].'">'.$value['CCategorie'].'</option>';
                                        }
                                   }
                            echo '
                            </select>
                        </div>
            		  </p>

                      <p>
            			<div class="col-lg-4"><label for="Brand">Marque</label></div>
            			<div class="col-lg-12">
                            <select name="Brand">
                                <option style="display:none;" selected label="Veulliez choisir une marque" value="0">
                                '; foreach($brandNameSelect as $value){
                                        if($formArticleBrandValue == $value['idT_Marque']){
                                            echo '<option selected="selected" value="'.$value['idT_Marque'].'">'.$value['MMarque'].'</option>';
                                        }else{
                                            echo '<option value="'.$value['idT_Marque'].'">'.$value['MMarque'].'</option>';
                                        }
                                  }
                            echo '
                            </select>
                        </div>
            		  </p>

                      <p>
            			<div class="col-lg-4"><label for="PicArticle">Images</label></div>
            			<div class="col-lg-12">
                            <select name="PicArticle">
                                <option style="display:none;" selected label="Veulliez choisir une image" value="0">
                                '; foreach($picArticleSelect as $value){
                                        if($formArticlePicArticleValue == $value['idT_PicArticles']){
                                            echo '<option selected="selected" value="'.$value['idT_PicArticles'].'">'.$value['PPicArticles'].'</option>';
                                        }else{
                                            echo '<option value="'.$value['idT_PicArticles'].'">'.$value['PPicArticles'].'</option>';
                                        }
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
                		<div class="col-xs-offset-2 col-lg-2">
                            <input type="submit" name="submit" value="Envoyer"/> 
                            <input type="submit" name="reset" value="Annuler"/>
                        </div>
                	    <div class="col-lg-12"></div>
                      </p>
            	</form>
            </div>
        </div>';
