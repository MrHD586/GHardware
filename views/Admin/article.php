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
    
    // Option du choix d'affichage d'article par page
    $choice = array("5","10","15","20","50");
    
    // Nombre de pages par défaut
    $Nb_Tot_Page = 1;						
    
    //si le post select page est set ou diffèrent de 1 
    if(isset($_POST['Page']) && ($_POST['Page'] > 1)){
        $Page_Courante = $_POST['Page'];
    }else{
        // Numéro de la page courante par défaut(catalogue)
        $Page_Courante = 1;
    }
    
    // Récupération du nombre d'articles par page sélectionnés
    if(isset($_POST['Nb_Article']) && ($_POST['Nb_Article'] > 1)){
        $Nb_Art_Page = $_POST['Nb_Article'];
    }else{
        $Nb_Art_Page = $choice[0];	// Choix par défaut du nombre d'articles par page
    }
    
    // Nombre d'articles totaux
    $Nb_Art_Total = count($tableList);
    
    // Nombre total de pages
    $Nb_Tot_Page = ceil($Nb_Art_Total / $Nb_Art_Page);
    
    // Nombre d'Items par articles
    $Nb_Items_Art = count($tableList[0]);
    
    // Détection du nième passage et correction du dépassement de page en fonction du nombre d'articles par page
    if (isset($_POST['Page_Courante'])){
        if ($Page_Courante > $Nb_Tot_Page) {
            $Page_Courante = 1;		// Numéro de la page courante par défaut(catalogue)
        }
    }
    
    // Calcul des intervalles pour les articles (catalogue)
    $Dernier_Art_Page = ($Page_Courante * $Nb_Art_Page);
    $Premier_Art_Page = ($Dernier_Art_Page - $Nb_Art_Page);
    
    // Détection de la fin de liste (page non complète)
    if ($Dernier_Art_Page > $Nb_Art_Total){
        $Dernier_Art_Page = $Nb_Art_Total;
    }
    
    
    
    
    
    echo '
        <div class="col-lg-12">
            <form method="post" action="" name="Liste">
                
                <!-- select du nombre d\'articles par pages -->
                Articles par page : <select name="Nb_Article" onchange="document.Liste.submit();">';
    
                    foreach($choice as $Nb_Art){
                        echo '<option';
                        
                        // Affichage avec focus correct du nombre d'articles dans la liste
                        if(isset($_POST['Nb_Article']) &&  ($_POST['Nb_Article'] == $Nb_Art)){
                            echo ' selected';
                        }elseif ($Nb_Art == $Nb_Art_Page) {
                            echo ' selected';
                        }
                        
                        echo'>'.$Nb_Art.'</option>';
                    }
                    
                    echo '</select>
                         
                         <!-- select de la page à afficher -->
                         Page : <select name="Page" onchange="document.Liste.submit();">
                    ';
                    
                    for($Page=1; $Page <= $Nb_Tot_Page; $Page++){
                        echo '<option';
                        
                        // Affichage avec focus correct du nombre de pages dans la liste
                        if($Page == $Page_Courante){
                            echo ' selected';
                        }
                        
                        echo'>'.$Page.'</option>';
                    }
                    
                        echo '</select>';
                   
                        //lien pour les affichages des actifs et inactifs
                        if($_GET['inactive']){
                            echo '<a style="margin-left:590px;"href="index.php?controller=Admin&action=article">Affichage des actifs</a>';
                        }else{
                            echo '<a style="margin-left:540px;"href="index.php?controller=Admin&action=article&inactive=TRUE">Affichage des inactifs</a>';
                        }
           echo '</form>';
                        
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
                    
                    
                    
                    
                    // Affichage des articles
                    echo'<tr>';
                
                
                    for($Article = $Premier_Art_Page; $Article < $Dernier_Art_Page; $Article++){
                        for( $Item=0; $Item < $Nb_Items_Art; $Item++){
                            echo'<td>'.$tableList[$Article][$Item].'</td>';
                        }
                    
                        //Bouton d'édition
                        $editButton = '<a href="index.php?controller=Admin&action=article&modif='.$value["idArticle"].'">
                            <img src="images/action_edit.gif" alt="" title="Editer" /></a>';
                        
                        //Le bouton d'archivage n'est pas afficher si le tableau affiche les élements inactifs
                        if(!$inactiveParam){
                            $archiveButton = '<a href="index.php?controller=Admin&action=article&archive='.$value["idArticle"].'" onclick="submitform()">
                                <img src="images/action_archive.gif" alt="" title="Archiver" /></a>';
                        }
                        
                        echo'<td>'.$editButton.$archiveButton.'</td>';
                    
                        echo'</tr>';
                    }
            
                
                   echo'</table>';
                echo '<input type="hidden" name="Page_Courante" value="'.$Page_Courante.'">'; // Mémorisation de la page courante
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
            $formArticleNameValue = $val;
            $formArticleNameValue = $val;
            
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
    
 
         
	
        echo $row_count;
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

        ?>
        <form name='frmSearch' action='' method='post'>
        <div ><input type='text' name='search[keyword]' value="<?php echo $search_keyword; ?>" id='keyword' maxlength='25'></div>
        <table class='tbl-qa'>
          <thead>
        	<tr>
        	  <th class='table-header' width='20%'>Title</th>
        	  <th class='table-header' width='40%'>Description</th>
        	  <th class='table-header' width='20%'>Date</th>
        	</tr>
          </thead>
          <tbody id='table-body'>
        	<?php
        	if(!empty($result)) { 
        	    foreach($result as $row) {
        	?>
        	  <tr class='table-row'>
        		<td><?php echo $row['AName']; ?></td>
        		<td><?php echo $row['ADescription']; ?></td>
        		<td><?php echo $row['APrix']; ?></td>
        	  </tr>
            <?php
        		}
        	}
        	?>
          </tbody>
        </table>
        <?php echo $per_page_html; ?>
        </form>
        </body>
        </html>
