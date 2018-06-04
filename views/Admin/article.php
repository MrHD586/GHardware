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
       
    
    
    
    //------ TABLEAU fonctionement ------//
    
    if(!empty($row_count)){
        $per_page_html .= "<div style='text-align:center;margin:20px 0px;'>";
        $page_count = ceil($row_count/ROW_PER_PAGE);
        
        if($page_count>1) {
            for($i=1;$i<=$page_count;$i++){
                if($i==$page){
                    $per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page current" />';
                }else{
                    $per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page" />';
                }
            }
        }
        $per_page_html .= "</div>";
    }
    
    
    //lien pour les affichages des actifs et inactifs
    if($_GET['inactive']){
        $linkForDisplayedList = '<a href="index.php?controller=Admin&action=article">Affichage des actifs</a>';
    }else{
        $linkForDisplayedList = '<a href="index.php?controller=Admin&action=article&inactive=TRUE">Affichage des inactifs</a>';
    }
    
    
  
    
    echo '
        <div class="col-lg-12">
            <form name="frmSearch" action="" method="post">
                
                <div>
                    <input class="searchbar"  type="search" name="search[keyword]" value="'.$search_keyword.'" id="keyword" 
                    placeholder="Recherche" style="width:30%;">
                </div>

                '.$linkForDisplayedList.'
                
                <table id="tabadmin">
                    <thead>
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
                        <th style="width:10%;">Action</th>
            		  </tr>
                    </thead>

                    <tbody>';
                    
                        if(!empty($result)) {
                            foreach($result as $row) {
                                echo '
                                    <tr>
                                        <td>'.$row["idArticle"].'</td>
                                        <td>'.$row["Name"].'</td>
                                        <td>'.$row["Stock"].'</td>
                                        <td>'.$row["Price"].'</td>
                                        <td>'.$row["Description"].'</td>
                                        <td>'.$articleManager->getCategoryNameById($row["Fk_Category"])['CName'].'</td>
                                        <td>'.$articleManager->getBrandNameById($row["Fk_Brand"])['Name'].'</td>
                                        <td>'.$articleManager->getImageArticleNameById($row["Fk_ImageArticle"])['Link'].'</td>';
                                            
                                        if($row["isActive"] == 1){
                                            echo '<td>Oui</td>';
                                        }else{
                                            echo '<td>Non</td>';
                                        }

                                       
                                
                                        //Bouton d'édition
                                        $editButton;
                                        
                                        if($inactiveParam == TRUE){
                                            $editButton ='<a href="index.php?controller=Admin&action=article&inactive='.$inactiveParam.'&modif='.$row["idArticle"].'">
                                                          <img src="images/action_edit.gif" alt="" title="Editer" /></a>';
                                        }else{
                                            $editButton ='<a href="index.php?controller=Admin&action=article&modif='.$row["idArticle"].'">
                                                          <img src="images/action_edit.gif" alt="" title="Editer" /></a>';
                                            $archiveButton = '<a href="index.php?controller=Admin&action=article&archive='.$row["idArticle"].'" onclick="submitform()">
                                                              <img src="images/action_archive.gif" alt="" title="Archiver" /></a>';
                                        }
                                
                                  echo' <td>'.$editButton.$archiveButton.'</td>
                                    </tr>';
                            }
                        }
                       
             echo ' </tbody>
                </table>';
             
             echo $per_page_html;
             
             
      echo '</form>';
   echo'</div> ';
    
	
	
	
	
    
	//------ FORMULAIRE ------//
        
   
    //titre du formulaire
    if(!empty($modifParam)){
        $formTitle = "Modification d'un article";
        
    }else{
        $formTitle ="Saisie d'un nouvel article";
    }
    
    
    //valeur des champs 
    if($modifParam != NULL && !empty($modifParam)){
        foreach($formFill as $key => $val){
            $formArticleIdValue = $key;
            $formArticleNameValue = $key;
            $formArticleStockValue = $key;
            $formArticleNameValue = $key;
            $formArticlePriceValue = $key;
            
        }
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
                        
                      <input type="hidden" value="'.$formArticleIdValue.'" name="hiddenId"/>
                        
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
                                        if($formArticleCategoryValue == $value['idCategory']){
                                            echo '<option selected="selected" value="'.$value['idCategory'].'">'.$value['CName'].'</option>';
                                        }else{
                                            echo '<option value="'.$value['idCategory'].'">'.$value['CName'].'</option>';
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
                                        if($formArticleBrandValue == $value['idBrand']){
                                            echo '<option selected="selected" value="'.$value['idBrand'].'">'.$value['Name'].'</option>';
                                        }else{
                                            echo '<option value="'.$value['idBrand'].'">'.$value['Name'].'</option>';
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
                                        if($formArticlePicArticleValue == $value['idImageArticle']){
                                            echo '<option selected="selected" value="'.$value['idImageArticle'].'">'.$value['Link'].'</option>';
                                        }else{
                                            echo '<option value="'.$value['idImageArticle'].'">'.$value['Link'].'</option>';
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
    
 
         
	

       
