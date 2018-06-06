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
<script src="js/jquery/jquery-1.9.0.min.js"></script>
<!-- <msdropdown> -->
<link rel="stylesheet" type="text/css" href="css/msdropdown/dd.css" />
<script src="js/msdropdown/jquery.dd.js"></script>
<!-- </msdropdown> -->


    

<tr>
    <td valign="top">
    <select id="payments" name="payments" style="width:250px;">
        <option value="" data-description="Choos your payment gateway">Payment Gateway</option>
        <option value="amex" data-image="'.$_SESSION['user_image'].'" data-description="My life. My card...">Amex</option>
        <option value="Discover" data-image="'.$_SESSION['user_image'].'" data-description="It pays to Discover...">Discover</option>
        <option value="Mastercard" data-image="'.$_SESSION['user_image'].'" data-title="For everything else..." data-description="For everything else...">Mastercard</option>
        <option value="cash" data-image="'.$_SESSION['user_image'].'" data-description="Sorry not available..." disabled="true">Cash on devlivery</option>
        <option value="Visa" data-image="'.$_SESSION['user_image'].'" data-description="All you need...">Visa</option>
        <option value="Paypal" data-image="'.$_SESSION['user_image'].'" data-description="Pay and get paid...">Paypal</option>
    </select> &nbsp;
    <select style="width:200px" class="tech" name="tech" id="tech" onchange="showValue(this)">
      <option value="calendar" data-image="images/msdropdown/icons/icon_calendar.gif">Calendar</option>
      <option value="shopping_cart" data-image="images/msdropdown/icons/icon_cart.gif">Shopping Cart</option>
      <option value="cd" data-image="images/msdropdown/icons/icon_cd.gif" name="cd">CD</option>
      <option value="email"  data-image="images/msdropdown/icons/icon_email.gif">Email</option>
      <option value="faq" data-image="images/msdropdown/icons/icon_faq.gif">FAQ</option>
      <option value="games" data-image="images/msdropdown/icons/icon_games.gif">Games</option>
      <option value="music" data-image="images/msdropdown/icons/icon_music.gif">Music</option>
      <option value="phone" data-image="images/msdropdown/icons/icon_phone.gif">Phone</option>
      <option value="graph" data-image="images/msdropdown/icons/icon_sales.gif">Graph</option>
      <option value="secured" data-image="images/msdropdown/icons/icon_secure.gif">Secured</option>
      <option value="video" data-image="images/msdropdown/icons/icon_video.gif">Video</option>
      <option value="cd" data-image="images/msdropdown/icons/icon_cd.gif" name="cd">CD</option>
    </select>
    </td>
  </tr>





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
             
					   
					   
					   