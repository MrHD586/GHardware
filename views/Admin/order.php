<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 04 Juin 2018
    #### Page views/Admin/user.php:
    #### 	  Page de managment des utilisateurs avec formulaire et tableau
    ################################################################################
    
    //titre du formulaire
    $pageTitle = "Gestion des commandes";
    //message lors de création réussite
    if($_SESSION['order_CreationSucces'] != null){
        $order_CreationSucces = $_SESSION['order_CreationSucces']."<br/>";
    }else{
        $order_CreationSucces = null;
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
    $linkForDisplayedList = 'Affichage :&nbsp;&nbsp;<a href="index.php?controller=Admin&action=order">| en attente de payement |</a>&nbsp;&nbsp;
                             <a href="index.php?controller=Admin&action=order&send=TRUE">| envoyées |</a>&nbsp;&nbsp;
                             <a href="index.php?controller=Admin&action=order&delivered=TRUE">| délivrées |</a>';
  
    
    
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
                			<th>N°</th>
                            <th>Date</th>
                            <th>État commande</th>
                            <th>Methode payement</th>
                            <th>État du payement</th>
                            <th style="width:10%;">Action</th>
                		  </tr>
                        </thead>
                        
                        <tbody>';
    
    if(!empty($result)) {
        foreach($result as $row) {
            echo '
                <tr>
                    <td>'.$row["idOrder"].'</td>
                    <td>'.$row["NumberOrder"].'</td>
                    <td>'.$row["Date"].'</td>';
                    
                    //état
                    if($row["State"] == 0){
                        echo '<td>En attente de payement</td>';
                    }elseif($row["State"] == 1){
                        echo '<td>Envoyée</td>';
                    }elseif($row["State"] == 2){
                        echo '<td>Délivrée</td>';
                    }  
                    
                    //methode de payement
                    if($row["PaymentMethod"] == 0){
                        echo '<td>Nature</td>';
                    }else{
                        echo '<td>Facture</td>';
                    }

                    //état du payement
                    if($row["PayementState"] == 0){
                        echo '<td>En attente de payement</td>';
                    }elseif($row["PayementState"] == 1){
                        echo '<td>Validé</td>';
                    }elseif($row["PayementState"] == 2){
                        echo '<td>Refusé</td>';
                    } 
                        
            
            //Bouton d'édition
            $editButton;
            
            if($deliveredParam == TRUE){
                $editButton ='<a href="index.php?controller=Admin&action=order&delivered='.$deliveredParam.'&modif='.$row["idOrder"].'">
                              <img src="images/action_edit.gif" alt="" title="Editer" /></a>';
                
            }elseif($sendParam == TRUE){
                $editButton ='<a href="index.php?controller=Admin&action=order&send='.$sendParam.'&modif='.$row["idOrder"].'">
                              <img src="images/action_edit.gif" alt="" title="Editer" /></a>';
                
            }else{
                $editButton ='<a href="index.php?controller=Admin&action=order&modif='.$row["idOrder"].'">
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
    
    
    
    //message de validation
    echo $order_CreationSucces;
    
    
    
    //------ FORMULAIRE ------//
    //valeur des champs
    if($modifParam != NULL && !empty($modifParam)){
        $formTitle = "Modification d'une commande";
        
        
        echo'
            <form method="post" action="">
                <h3>'.$formTitle.'</h3>
            ';
        
        //affichage des messages d'erreures contenus dans le tableau errorsArray
        foreach ($errorsArray as $key => $val) {
            echo '<p style="color:red;">'.$val.'</p>';
        }
        
        echo '
                           
                
            <input type="hidden" value="'.$formCommentIdValue.'" name="hiddenId"/>
                
             <p>
                <div class="col-lg-4"><label for="Text">Numéro de commande</label></div>
                <div class="col-lg-8"><input class="comment" type="text" name="Text" value="'.$formOrderNumberValue.'" style="width:25%;" readonly/></div>
    		 </p>
    			    
             <p>
    			<div class="col-lg-4"><label for="State">État commande</label></div></br>
                <div class="col-lg-12"><input type="radio" name="State" value="2" checked="checked">Délivrée</input></div>
                <div class="col-lg-12"><input type="radio" name="State" value="1">Envoyée</input></div></br>
                <div class="col-lg-12"><input type="radio" name="State" value="0">En attente du payement</input></div></br>
    		</p>
    
            <p>
    			<div class="col-lg-4"><label for="PayementState">État payement</label></div></br>
                <div class="col-lg-12"><input type="radio" name="PayementState" value="1" checked="checked">Validé</input></div></br>
                <div class="col-lg-12"><input type="radio" name="PayementState" value="0">En traitement</input></div></br>
                <div class="col-lg-12"><input type="radio" name="PayementState" value="2">Refusé</input></div>
    		</p>
    			    
    			    
    	    <p>
                <div class="col-lg-12"></div>
        		<div class="col-xs-offset-2 col-lg-2">
                    <input type="submit" name="submit" value="Envoyer"/>
                    <a href="index.php?controller=Admin&action=order"><input type="button" name="reset" value="Annuler"/></a>
                </div>
        	    <div class="col-lg-12"></div>
            </p>
    	</form></div></div>';
    }
