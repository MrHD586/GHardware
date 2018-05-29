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



        <select>
            <option></option>


        </select>



';
       
            if($_GET['inactive']){
                echo '<a style="margin-left:590px;"href="index.php?controller=Admin&action=article">Affichage des actifs</a>';
            }else{
                echo '<a style="margin-left:540px;"href="index.php?controller=Admin&action=article&inactive=TRUE">Affichage des inactifs</a>';
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
    foreach ($tableList as $value) {
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
                    $archiveButton = '<a href="index.php?controller=Admin&action=article&archive='.$value["idArticle"].'" onclick="submitform()">
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
                            
                            
                            
//https://www.phpflow.com/php/simple-pagination-with-php-and-mysql-using-jquery/

                            
    echo'                        
                            
        <table class="table table-bordered">
            <thead>
                <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Stock</th>
                </tr>
            </thead>
            <tbody>
    ';
    
        
    
        $limit = 4;
        $paginationList = $tableList;
        $row = count($paginationList); 
       
       
        
        $total_records = $row[0];  
        $total_pages = ceil($total_records / $limit);  
        
        $pagLink = "<nav><ul class='pagination'>";  
        
        for ($i=1; $i<=$total_pages; $i++) {  
            $pagLink .= "<li><a href='index.php?controller=Admin&action=article&page=".$i."'>".$i."</a></li>";  
        }
        
        echo $pagLink . "</ul></nav>";
        
        foreach ($paginationList as $row) {
            
            echo'
                    <tr>
                    	<td>'.$row["AName"].'</td>
                    	<td>'.$row["APrix"].'</td>
                    	<td>'.$row["AStock"].'</td>
                    </tr>';
        }
        echo'
            </tbody>
        </table>
    ';
                                
        echo'
            <script type="text/javascript">
                $(document).ready(function(){
                    $(\'.pagination\').pagination({
                        items: $total_records,
           				itemsOnPage: $limit,
                		cssStyle: \'light-theme\',
                		currentPage : $page,
                        hrefTextPrefix : \'index.php?page=\'
                    });
                });
            </script> ';
   
    
    
        
        #################################################################
        #
        #	Programme:		index.php
        #	Auteur:			Tony Favre-Bulle
        #
        #################################################################
        #
        # 	Date :			Novembre 2017
        #	Version :		1.0 - Etape No 2 (Reprise)
        #	Révisions :
        #
        #################################################################
        #
        #	Afficheur dynamique de données depuis un fichier CSV
        #	(génération dynamique du code HTML)
        #
        #################################################################
        
        // Données pour les essais
        $Titre_Liste = array();
        $Liste = array();
        
        
        // Initialisation des variables
        $path_files='./Files/';					// Dossier des fichiers ressources
        $data_file='voie_C.csv';				// Fichier de données
        $database_titles=array();				// Titres des Items des la base
        $database=array();						// Liste des utilisateurs pour authentification
        $choice=array("5","10","20","50","100");// Option du choix d'affichage d'article par page
        $Nb_Tot_Page = 1;						// Nombre total de page du catalogue
        $window_title = "CATALOGUE";			// Titre de la fenêtre HTML
        $sub_title = " Liste des produits";		// Titre de la page
        $email = "administrateur@MonShop.ch";	// Afresse mai pour le contact
        
        //////////////////////////////////////////////////////////////////////////////////////////////////
        // Chargement des données du fichier CSV en mémoire (dans un tableau multi-dimensionnel)
        //////////////////////////////////////////////////////////////////////////////////////////////////
        // Le dossier existe-t-il ?
        if( is_dir($path_files) )
        {
            // Ouverture du dossier
            if( $path = opendir($path_files) )
            {
                // Lecture des fichiers présents
                while( ($file = readdir($path)) != FALSE )
                {
                    // Est-ce un fichier de données ?
                    if( $file != '.' && $file != '..' )
                    {
                        // Est-ce le bon fichier de données ?
                        if ( $file == $data_file )
                        {
                            // Ouverture du fichier en lecture
                            $handle = fopen($path_files.$file, "r");
                            
                            // Récupération des titres des colonnes (Première ligne du fichier CSV)
                            $database_titles=fgetcsv($handle, 1000, ";");
                            
                            // Récupération des données du fichier CSV (jusqu'à la fin du fichier)
                            $index = 0;
                            while ( ($data = fgetcsv($handle, 1000, ";")) !== FALSE )
                            {
                                // Mémorise le nombre d'Items par ligne de donnée
                                $fields = count($data);
                                
                                foreach ($data as $key => $value)
                                {
                                    // Récupère les données dans un tableau à deux dimensions
                                    $database[$index][$key]=$value;
                                }
                                
                                // Incrémente compteur donnée suivante
                                $index++;
                            }
                            
                            // Fermeture du fichier
                            fclose($handle);
                        }
                        else
                        {
                            // Message d'avertissement en cas d'echec
                            echo 'Le fichier n\'existe pas ou n\'est pas disponible pour l\'instant...<br/>';
                        }
                    }
                }
            }
            
            // Fermeture du dossier
            closedir($path);
        }
        else
        {
            // Message d'avertissement en cas d'echec
            echo 'Le dossier spécifié n\'existe pas...<br/>';
        }
        
        //////////////////////////////////////////////////////////////////////////////////////////////////
        // Traitement des informations transmises dans l'URL ($_POST) et calculs de formattage des pages
        //////////////////////////////////////////////////////////////////////////////////////////////////
        // Récupération de la page sélectionnée et Protection contre des injection malicieuses dans l'URL
        if ( isset($_POST['Page']) && ($_POST['Page'] > 1) )
        {
            $Page_Courante = $_POST['Page'];
        }
        else
        {
            $Page_Courante = 1;			// Numéro de la page courante par défaut(catalogue)
        }
        
        // Récupération du nombre d'articles par page sélectionnés et
        //Protection contre des injection malicieuses dans l'URL
        if ( isset($_POST['Nb_Article']) && ( $_POST['Nb_Article'] > 1 ) )
        {
            $Nb_Art_Page = $_POST['Nb_Article'];
        }
        else
        {
            $Nb_Art_Page = $choice[2];	// Choix par défaut du nombre d'articles par page
        }
        
        // Nombre d'articles totaux (catalogue)
        $Nb_Art_Total = count($database);
        
        // Nombre total de pages (catalogue)
        $Nb_Tot_Page = ceil($Nb_Art_Total / $Nb_Art_Page);
        
        // Nombre d'Items par articles
        $Nb_Items_Art = count($database[0]);
        
        // Détection du nième passage et correction du dépassement de page en fonction du nombre d'articles par page
        if ( isset($_POST['Page_Courante']) )
        {
            if ( $Page_Courante > $Nb_Tot_Page )
            {
                $Page_Courante = 1;		// Numéro de la page courante par défaut(catalogue)
            }
        }
        
        // Calcul des intervalles pour les articles (catalogue)
        $Dernier_Art_Page = ($Page_Courante * $Nb_Art_Page);
        $Premier_Art_Page = ($Dernier_Art_Page - $Nb_Art_Page);
        
        // Détection de la fin de liste (page non complète)
        if ( $Dernier_Art_Page > $Nb_Art_Total )
        {
            $Dernier_Art_Page = $Nb_Art_Total;
        };
        
        //////////////////////////////////////////////////////////////////////////////////////////////////
        // Génération de la partie HTML (dynamiquement)
        //////////////////////////////////////////////////////////////////////////////////////////////////
        echo '<!DOCTYPE html>
	<html lang="fr">
		<head>
			<meta charset="iso-8859-1" />
			<meta name="description" content="i-ct, module 133, web, css" />
			<title>'.$window_title.'</title>
		</head>
		<body>
			<h1>'.$sub_title.'</h1>
		<hr>';
        
        // Envoi du script sur lui-même indépendament du nom du fichier( $_SERVER[PHP_SELF'] )
        echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'" name="Liste">
		<table width="100%" align="center" border="0">
		<tr>
			<td>Articles par page : <select name="Nb_Article" onchange="document.Liste.submit();">';
        foreach ($choice as $Nb_Art)
        {
            echo '<option';
            
            // Affichage avec focus correct du nombre d'articles dans la liste
            if ( isset ($_POST['Nb_Article']) &&  ($_POST['Nb_Article'] == $Nb_Art) )
            {
                echo ' selected';
            }elseif ($Nb_Art == $Nb_Art_Page )
            {
                echo ' selected';
            }
            echo'>'.$Nb_Art.'</option>';
        }
        echo '</select>';
        
        echo '</td>
            
			<td align="right">Page : <select name="Page" onchange="document.Liste.submit();">';
        for ( $Page=1; $Page <= $Nb_Tot_Page; $Page++ )
        {
            echo '<option';
            
            // Affichage avec focus correct du nombre de pages dans la liste
            if ( $Page==$Page_Courante )
            {
                echo ' selected';
            }
            echo'>'.$Page.'</option>';
        }
        echo '</select>';
        echo '</td>
		</tr>
		</table>
		</br>
		<hr>';
        
        // Affichage du contenu de la page (articles du catalogue)
        echo '<table width="100%" align="center" border="0" bgcolor="dcdcdc">';
        
        // Affichage des titres du tableau
        echo '<tr>';
        foreach ($database_titles as $Titre)
        {
            echo '<th align="left" bgcolor="dcdcdc">'.$Titre.'</th>';
        }
        echo '</tr>';
        
        // Affichage des articles
        echo'<tr valign=center>';
        for ($Article=$Premier_Art_Page; $Article < $Dernier_Art_Page; $Article++)
        {
            for ( $Item=0; $Item < $Nb_Items_Art; $Item++)
            {
                echo'<td align="left" bgcolor="ffffff">'.$database[$Article][$Item].'</td>';
            }
            echo'</tr>';
        }
        
        echo'</table>';
        
        echo '<hr>';
        echo '<input type="hidden" name="Page_Courante" value="'.$Page_Courante.'">'; // Mémorisation de la page courante
        echo'</form>';
        
        // Affichage du pied de page
        echo '<center>|&nbsp&nbsp<a href="javascript:window.print()">Imprimer la page</a>&nbsp&nbsp|&nbsp&nbsp<a
			href="mailto:'.$email.'">Contact</a>&nbsp&nbsp|</center></br>';
        
        echo '</body>
</html>';
        //////////////////////////////////////////////////////////////////////////////////////////////////
        // Fin du script
        //////////////////////////////////////////////////////////////////////////////////////////////////
        ?>
	
    
    
    
    
                    
