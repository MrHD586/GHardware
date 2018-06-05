<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Page views/Admin/user.php:
    #### 	  Page de managment des utilisateurs avec formulaire et tableau
    ################################################################################
    
    //titre du formulaire
    $pageTitle = "Gestion des comptes";
    
    //message lors de création réussite
    if($_SESSION['user_CreationSucces'] != null){
        $user_CreationSucces = $_SESSION['user_CreationSucces']."<br/>";
    }else{
        $user_CreationSucces = null;
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
        $linkForDisplayedList = '<a href="index.php?controller=Admin&action=user">Affichage des actifs</a>';
    }else{
        $linkForDisplayedList = '<a href="index.php?controller=Admin&action=user&inactive=TRUE">Affichage des inactifs</a>';
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
            			<th>Login</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Date de naissance</th>
                        <th>Rue</th>
                        <th>NPA</th>
                        <th>Ville</th>
                        <th>Actif</th>
                        <th>Admin</th>
                        <th style="width:10%;">Action</th>
            		  </tr>
                    </thead>
                    
                    <tbody>';
    
                    if(!empty($result)) {
                        foreach($result as $row) {
                            echo '
                                <tr>
                                    <td>'.$row["idUser"].'</td>
                                    <td>'.$row["Login"].'</td>
                                    <td>'.$row["FirstName"].'</td>
                                    <td>'.$row["LastName"].'</td>
                                    <td>'.$row["Email"].'</td>
                                    <td>'.$row["Birthdate"].'</td>
                                    <td>'.$row["Road"].'</td>
                                    <td>'.$row["NPA"].'</td>
                                    <td>'.$row["Town"].'</td>';
                            
                            if($row["isActive"] == 1){
                                echo '<td>Oui</td>';
                            }else{
                                echo '<td>Non</td>';
                            }
                            
                            if($row["isAdmin"] == 1){
                                echo '<td>Oui</td>';
                            }else{
                                echo '<td>Non</td>';
                            }
                            
                            
                            //Bouton d'édition
                            $editButton;
                            
                            if($inactiveParam == TRUE){
                                $editButton ='<a href="index.php?controller=Admin&action=user&inactive='.$inactiveParam.'&modif='.$row["idUser"].'">
                                              <img src="images/action_edit.gif" alt="" title="Editer" /></a>';
                                
                            }else{
                                $editButton ='<a href="index.php?controller=Admin&action=user&modif='.$row["idUser"].'">
                                                                                              <img src="images/action_edit.gif" alt="" title="Editer" /></a>';
                                $archiveButton = '<a href="index.php?controller=Admin&action=user&archive='.$row["idUser"].'" onclick="submitform()">
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
        $formTitle = "Modification d'un utilisateur";        
    }else{
        $formTitle ="Saisie d'un nouvel utilisateur";        
    }
    
    
    //valeur des champs
    if($modifParam != NULL && !empty($modifParam)){
        $passwordInModif = '<p style="color:orange;">Si les champs mot de passe sont vide, le mot de passe ne sera pas modifié ! </p>';
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
                    $user_CreationSucces.'
                    
                    
                    <input type="hidden" value="'.$formUserIdValue.'" name="hiddenId"/>

                    '.$passwordInModif.'
                    
                    <p>
            			<div class="col-lg-4"><label for="Login_User">Login</label></div>
            			<div class="col-lg-8"><input type="text" name="Login" value="'.$formUserLoginValue.'"/></div>
            		</p>
                          
                    <p>
                        <div class="col-lg-4"><label for="Password">Mot de passe</label></div>
                        <div class="col-lg-8"><input type="password" name="Password" /></div>
                    </p>
                        
                    <p>
                        <div class="col-lg-4"><label for="PasswordVerif">Confirmation</label></div>
                        <div class="col-lg-8"><input type="password" name="PasswordVerif"/></div>
                    </p>            		
 
                    <p>
            			<div class="col-lg-4"><label for="FirstName">Prénom</label></div>
            			<div class="col-lg-8"><input type="text" name="FirstName" value="'.$formUserFirstNameValue.'"/></div>
            		</p>
                          
                    <p>
            			<div class="col-lg-4"><label for="LastName">Nom</label></div>
            			<div class="col-lg-8"><input type="text" name="LastName" value="'.$formUserLastNameValue.'"/></div>
            		</p>
                          
                    <p>
            			<div class="col-lg-4"><label for="Email">Email</label></div>
            			<div class="col-lg-8"><input type="email" name="Email" value="'.$formUserEmailValue.'"/></div>
            		</p>
                          
                    <p>
            			<div class="col-lg-4"><label for="Birthdate">Date de naissance</label></div>
            			<div class="col-lg-8"><input type="date" name="Birthdate" value="'.$formUserBirthdateValue.'"/></div>
            		</p>
                    
                    <p>
        				<div class="col-lg-4"><label for="Road">Rue</label></div>
        				<div class="col-lg-8"><input type="text" name="Road" value="'.$formUserRoadValue.'"/></div>
        			</p>
        			
        			<p>
        				<div class="col-lg-4"><label for="Npa">Code Postal</label></div>
        				<div class="col-lg-8"><input type="text" name="Npa" maxlength="4" value="'.$formUserNpaValue.'"/></div>
        			</p>
        
        			<p>
        				<div class="col-lg-4"><label for="Town">Ville</label></div>
        				<div class="col-lg-8"><input type="text" name="Town" value="'.$formUserTownValue.'"/></div>
        			</p>

                     <p>
            			<div class="col-lg-4"><label for="Right">Droit</label></div></br>
                        <div class="col-lg-12"><input type="radio" name="isAdmin" value="0" checked="checked">Utilisateur</input></div></br>
                        <div class="col-lg-12"><input type="radio" name="isAdmin" value="1">Administrateur</input></div>
            		</p>
        
                    <p>
            			<div class="col-lg-4"><label for="IsActive">Actif</label></div></br>
            		    <div class="col-lg-12"><input type="radio" name="isActive" value="1" checked="checked">Oui</input></div></br>
                        <div class="col-lg-12"><input type="radio" name="isActive" value="0">Non</input></div>
            		</p>
                          
            	    <p>
                        <div class="col-lg-12"></div>
                		<div class="col-xs-offset-2 col-lg-2">
                            <input type="submit" name="submit" value="Envoyer"/> 
                            <a href="index.php?controller=Admin&action=user"><input type="button" name="reset" value="Annuler"/></a>
                        </div>
                	    <div class="col-lg-12"></div>
                    </p>
            	</form>';
    