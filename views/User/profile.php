<?php
    ################################################################################
    #### Auteur : Valentin Favre
    #### Date : 24 Mai 2018
    #### Page de Profil 
    ################################################################################


    //message lors réussite de modification
    if($_SESSION['ModifSucces'] != null){
        $ModifSucces = $_SESSION['ModifSucces']."<br/>";
    }else{
        $ModifSucces = null;
    }
    
 

    echo '	

    	<div class="col-lg-9">
    		<div class="row">
        
               <!-- AVATAR -->
               <div class="col-sm-3">
    				<div class="col-xs-12">
    					<img id="avatarmenu" width="135" height="135" src="'.$_SESSION['user_image'].'">
    				</div>
    				
    				<div class="col-xs-12">
    					<a class="btn btn-default navbar-btn" href="" role="button">Changer Avatar</a>
    				</div>
    		   </div>';
    
    
                //affichage des messages d'erreures contenus dans le tableau errorsArray
                foreach ($errorsArray as $key => $val) {
                    echo '<p style="color:red;">'.$val.'</p>';
                }
                
                echo $ModifSucces;
    		   
         echo' <div	class="col-xs-9">
    		   
                    <!-- LOGIN -->
    				<div class="col-sm-12">
    					<div class="col-sm-6">
    						<b>Nom d\'utilisateur : </b>&nbsp;&nbsp;
    						<a class="btn btn-default navbar-btn" href="index.php?controller=User&action=profile&modif=login" role="button">Modifier</a>
                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$userLogin.'&nbsp;&nbsp;
    				     </div>';
                
                        if($_GET['modif'] == 'login'){
    					   echo'
        				        <div class="col-sm-12">
            						<form method="post" action="">
                                        <input type="hidden" value="'.$userIds.'" name="hiddenId"/>
                                        <input class="searchbar" type="text" name="login" placeholder="Nom d\'utilisateur">
                                        <button type="submit" class="btn btn-primary btn-sm" name="submit">Valider</button>
                                    </form>
        					    </div>';
                        }
                        
    	     echo ' </div>
    				
    
    
                    <!-- USERFIRSTNAME -->
                    <div class="col-sm-12">
    					<div class="col-sm-6">
    						</br><b>Prénom : </b>&nbsp;&nbsp;
                            <a class="btn btn-default navbar-btn" href="index.php?controller=User&action=profile&modif=firstname" role="button">Modifier</a> 
                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$userInfoFirstName.'&nbsp;&nbsp;        
    					</div>';
    				    
    				    if($_GET['modif'] == 'firstname'){
    				        echo'
            					<div class="col-sm-12">
            						<form method="post" action="">
                                        <input class="searchbar" type="text" name="firstname" placeholder="Prénom">
                                        <button type="submit" class="btn btn-primary btn-sm" name="submit">Valider</button>
                                    </form>
            					</div>';
    				    }
    				    
    	     echo '	</div>
    				
    				
    
                    <!-- USERlASTNAME -->
    				<div class="col-sm-12">
    					<div class="col-sm-6">
    						</br><b>Nom :</b>&nbsp;&nbsp;
                                <a class="btn btn-default navbar-btn" href="index.php?controller=User&action=profile&modif=lastname" role="button">Modifier</a>
                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$userInfoLastName.'&nbsp;&nbsp;
    					</div>';
    	     
                	    if($_GET['modif'] == 'lastname'){
                	       echo'
                				<div class="col-sm-12">
                					<form method="post" action="">
                                        <input class="searchbar" type="text" name="lastname" placeholder="Nom">
                                        <button type="submit" class="btn btn-primary btn-sm" name="submit">Valider</button>
                                    </form>
                				</div>';
                	    }
                	    
             echo '	</div>
    
                            
    
    				<!-- BIRTHDATE --> 
    				<div class="col-sm-12">
    					<div class="col-sm-6">
    						</br><b>Date de Naissance : </b>&nbsp;&nbsp;
                            <a class="btn btn-default navbar-btn" href="index.php?controller=User&action=profile&modif=birthdate" role="button">Modifier</a>
                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$userInfoBirthDate.'&nbsp;
    					</div>';
    					
                         if($_GET['modif'] == 'birthdate'){
                             echo'
            					 <div class="col-sm-12">
            					     <form method="post" action="">
                                         <input class="searchbar" type="date" name="birthdate">
                                        <button type="submit" class="btn btn-primary btn-sm" name="submit">Valider</button>
                                     </form>
            					 </div>';
                         }
                         
             echo '	</div>
    				
    
    
                    <!-- ADDRESS -->
    				<div class="col-sm-12">
    					<div class="col-sm-6">
    						</br><b>Adresse : </b>&nbsp;&nbsp;
                            <a class="btn btn-default navbar-btn" href="index.php?controller=User&action=profile&modif=address" role="button">Modifier</a>
                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$userInfoRoad.'</br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$userInfoNpa.'</br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$userInfoTown.'</br>
    					</div>';
             
                        if($_GET['modif'] == 'address'){
                            echo'
            					<div class="col-sm-12">
            						<form method="post" action="">
                                        <input class="searchbar" type="text" name="road" placeholder="Rue" value="'.$formUserRoad.'">
                                        <input class="searchbar" type="text" name="npa" maxlength="4" placeholder="Code postal" value="'.$formUserNpa.'">
                                        <input class="searchbar" type="text" name="town" placeholder="Ville" value="'.$formUserTown.'">
                                        <button type="submit" class="btn btn-primary btn-sm" name="submit">Valider</button>
                                    </form>
            					</div>';
                        }
                        
             echo '	</div>
    				
    
    
                    <!-- PASSWORD -->
    				<div class="col-sm-12">
    					<div class="col-sm-12">
    						</br><b>Mot de passe : </b>&nbsp;&nbsp;
                            <a class="btn btn-default navbar-btn" href="index.php?controller=User&action=profile&modif=password" role="button">Modifier</a>
    					</div>';
                        
                        if($_GET['modif'] == 'password'){
                            echo'
                                <div class="col-sm-12">
                                    <form method="post" action="">
            							<input class="searchbar" type="password" name="oldPassword" placeholder="Ancien mot de passe">
            							<input class="searchbar" type="password" name="newPassword" placeholder="Nouveau mot de passe">
            							<input class="searchbar" type="password" name="confirmNewPassword" placeholder="Confirmer le nouveau mot de passe">
                                        <button type="submit" class="btn btn-primary btn-sm" name="submit">Valider</button>
                                    </form>
            					</div>';
                        }
                        
             echo '	</div>
    				
    		   </div>
    		</div>
    	</div>';
             
					   
					   
					   