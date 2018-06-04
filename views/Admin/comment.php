<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Page views/Admin/user.php:
    #### 	  Page de managment des utilisateurs avec formulaire et tableau
    ################################################################################
    
    //titre du formulaire
    $pageTitle = "Gestion des commentaires";
    
    //message lors de création réussite
    if($_SESSION['comment_CreationSucces'] != null){
        $comment_CreationSucces = $_SESSION['comment_CreationSucces']."<br/>";
    }else{
        $comment_CreationSucces = null;
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
    if($_GET['validate']){
        $linkForDisplayedList = '<a href="index.php?controller=Admin&action=comment">Affichage des "en attente"</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                 <a href="index.php?controller=Admin&action=comment&refused=TRUE"> Affichage des refusés</a>';
    }elseif($_GET['refused']){
        $linkForDisplayedList = '<a href="index.php?controller=Admin&action=comment">Affichage des "en attente"</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                 <a href="index.php?controller=Admin&action=comment&validate=TRUE">Affichage des validés</a>';
    }else{
        $linkForDisplayedList = '<a href="index.php?controller=Admin&action=comment&validate=TRUE">Affichage des validés</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                 <a href="index.php?controller=Admin&action=comment&refused=TRUE">Affichage des refusés</a>';
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
            			<th>Article</th>
                        <th>État</th>
                        <th>Text</th>
                        <th>User</th>
                        <th style="width:10%;">Action</th>
            		  </tr>
                    </thead>
                    
                    <tbody>';
    
                    if(!empty($result)) {
                        foreach($result as $row) {
                            echo '
                                <tr>
                                    <td>'.$row["idComment"].'</td>
                                    <td>'.$commentManager->getArticleNameById($row["Fk_Article"])['Name'].'</td>';
                                    if($row["State"] == 0){
                                        echo '<td>En attente</td>';
                                    }elseif($row["State"] == 1){
                                        echo '<td>Refusé</td>';
                                    }elseif($row["State"] == 2){
                                        echo '<td>Validé</td>';
                                    }
                            echo'
                                    <td>'.$row["Text"].'</td>
                                    <td>'.$commentManager->getUserLoginById($row["Fk_User"])['Login'].'</td>';
                                    
                            
                            
                            //Bouton d'édition
                            $editButton;
                            
                            if($refusedParam == TRUE){
                                $editButton ='<a href="index.php?controller=Admin&action=comment&refused='.$refusedParam.'&modif='.$row["idComment"].'">
                                              <img src="images/action_edit.gif" alt="" title="Editer" /></a>';
                            
                            }elseif($validateParam == TRUE){
                                $editButton ='<a href="index.php?controller=Admin&action=comment&refused='.$validateParam.'&modif='.$row["idComment"].'">
                                              <img src="images/action_edit.gif" alt="" title="Editer" /></a>';
                                    
                            }else{
                                $editButton ='<a href="index.php?controller=Admin&action=comment&modif='.$row["idComment"].'">
                                              <img src="images/action_edit.gif" alt="" title="Editer" /></a>';
                            }
                                
                                echo' <td>'.$editButton.'</td>
                                </tr>';
                        }
                    }
    
             echo ' </tbody>
                </table>';
    
        echo $per_page_html;
    
    
      echo '</form>';
   echo'</div> ';
    
    
    
    
    
    
    
    //------ FORMULAIRE ------//    
    //valeur des champs
    if($modifParam != NULL && !empty($modifParam)){
        
        
        $formTitle = "Modification d'un commentaire";
        
        $resetButton = '<input type="submit" name="reset" value="Annuler"/>';   
        
        foreach($formFill as $key => $val){
            $formCommentIdValue = $key;
            $formCommentStateValue = $key;
            $formCommentTextValue = $key;
        }
    
    
        echo'
                    <form method="post" action="">
                        <h3>'.$formTitle.'</h3>
        ';
            
                    //affichage des messages d'erreures contenus dans le tableau errorsArray
                    foreach ($errorsArray as $key => $val) {
                        echo '<p style="color:red;">'.$val.'</p>';
                    }
                        
        echo '
                        './/message de validation
                        $comment_CreationSucces.'
                        
                        
                        <input type="hidden" value="'.$formCommentIdValue.'" name="hiddenId"/>
    
                         <p>
                            <div class="col-lg-4"><label for="Text">Texte</label></div>
                			<div class="col-lg-8"><input class="comment" type="text" name="Text" value="'.$formCommentTextValue.'"/></div>
                		 </p>
    
                         <p>
                			<div class="col-lg-4"><label for="State">État</label></div></br>
                            <div class="col-lg-12"><input type="radio" name="State" value="0">En attente</input></div></br>
                            <div class="col-lg-12"><input type="radio" name="State" value="1">Refusé</input></div></br>
                            <div class="col-lg-12"><input type="radio" name="State" value="2" checked="checked">Validé</input></div>
                		</p>
                        
                                                 
                	    <p>
                            <div class="col-lg-12"></div>
                    		<div class="col-xs-offset-2 col-lg-2">
                                <input type="submit" name="submit" value="Envoyer"/> 
                                '.$resetButton.'
                            </div>
                    	    <div class="col-lg-12"></div>
                          </p>
                	</form>';
    }
    