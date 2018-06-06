<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 14 Mai 2018
    #### Page views/Admin/category.php:
    #### 	  Page de managment des categories avec formulaire et tableau
    ################################################################################
    
    //titre du formulaire
    $pageTitle = "Gestion des catégories";
    
    //message lors de création réussite
    if($_SESSION['cat_CreationSucces'] != null){
        $cat_CreationSucces = $_SESSION['cat_CreationSucces']."<br/>";
    }else{
        $cat_CreationSucces = null;
    }
    
    
    //------ Haut de page ------//
    echo '
        <div class="row">
			<div class="col-xs-offset-1 col-lg-8">
                <h3>'.$pageTitle.'</h3><br/>';
    
    
    
    
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
        $linkForDisplayedList = '<a href="index.php?controller=Admin&action=category">Affichage des actifs</a>';
    }else{
        $linkForDisplayedList = '<a href="index.php?controller=Admin&action=category&inactive=TRUE">Affichage des inactifs</a>';
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
                        <th>Actif</th>
                        <th style="width:10%;">Action</th>
            		  </tr>
                    </thead>
                    
                    <tbody>';
    
                        if(!empty($result)) {
                            foreach($result as $row) {
                                echo '
                                    <tr>
                                        <td>'.$row["idCategory"].'</td>
                                        <td>'.$row["CName"].'</td>';
                                
                                if($row["isActive"] == 1){
                                    echo '<td>Oui</td>';
                                }else{
                                    echo '<td>Non</td>';
                                }
                                
                                
                                //Bouton d'édition
                                $editButton;
                                
                                if($inactiveParam == TRUE){
                                    $editButton ='<a href="index.php?controller=Admin&action=category&inactive='.$inactiveParam.'&modif='.$row["idCategory"].'">
                                                                              <img src="images/action_edit.gif" alt="" title="Editer" /></a>';
                                    
                                    //Le bouton d'archivage n'est pas afficher si le tableau affiche les élements inactifs
                                }else{
                                    $editButton ='<a href="index.php?controller=Admin&action=category&modif='.$row["idCategory"].'">
                                                                              <img src="images/action_edit.gif" alt="" title="Editer" /></a>';
                                    $archiveButton = '<a href="index.php?controller=Admin&action=category&archive='.$row["idCategory"].'" onclick="submitform()">
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
        $formTitle = "Modification d'une catégorie";        
    }else{
        $formTitle ="Saisie d'une nouvelle catégorie";
    }
    
      
    
    
    echo '
                <form method="post" action="">
                    <h3>'.$formTitle.'</h3>
    ';
    
                //affichage des messages d'erreures contenus dans le tableau errorsArray
                foreach ($errorsArray as $key => $val) {
                    echo '<p style="color:red;">'.$val.'</p>';
                }
    echo '
                    './/message de validation
                      $cat_CreationSucces.'

                    <input type="hidden" value="'.$formCategoryIdValue.'" name="hiddenId"/>
                        
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
                        <div class="col-lg-12"></div>
                		<div class="col-xs-offset-2 col-lg-2">
                            <input type="submit" name="submit" value="Envoyer"/> 
                            <a href="index.php?controller=Admin&action=category"><input type="button" name="reset" value="Annuler"/></a>
                        </div>
                	    <div class="col-lg-12"></div>
                    </p>
            	</form></div></div>';
    