<?php
	################################################################################
	#### Auteur : Butticaz Yvann   
	#### Date : 22 Février 2018
	#### Page views/Article/list.php:
	####       Cette page va sert à afficher l'article que l'on consulte
	################################################################################

	//affichage des données récupérées
	//echo "<pre>".var_dump($articles)."</pre>";
    foreach($articles as $articles){
    	echo '<div class="col-lg-9">
    		      <div class="row">
                       <div class="col-xs-4 col-xs-offset-4"><h1>'.$articles['AName'].'</h1></div>
                  </div>
        		  <div class="row">
                      <div class="col-lg-7"><img class="img-responsive" src="images/imagetemplate.png"></div> 
        			  <div class="col-lg-4">
        			       <div class="col-md-12">En Stock : <span class="badge text-success">'.$articles['AStock'].'</span></div>
        				   <div class="col-md-12"><h2>Prix : <span class="badge text-success">'.$articles['APrix'].'</h2></span></div>';
    	                   
    	                   if($_SESSION['UserSession']==TRUE){
        				       echo'<div class="col-md-12"><a class="btn btn-default navbar-btn" href="index.php?controller=Cart&action=bdd&id='.$articles['idArticle'].'" role="button">Ajouter au Panier</a></div>';
    	                   }else{
                               echo'<div class="col-md-12"><a class="btn btn-default navbar-btn" href="index.php?controller=Cart&action=cookie&id='.$articles['idArticle'].'" role="button">Ajouter au Panier</a></div>';
                           }
        			  echo'</div>
        		  </div>
        		  <br>
        		  <div class="row">
        		      <div class="col-sm-10">
                           <br>
                           <div class="jumbotron">
        		               '.$articles['ADescription'].'
        	               </div>
        		      </div>
        	       </div> 
				   
				   
				   <!-- Comment Space -->';
    			   foreach($Commentaire as $commentaire){
    			       $id=$commentaire['idT_Commentaire'];
    			   
    				echo'<div class="row">
    							<div class="col-lg-10">
    								
    								<div class="commentarticle">
    								
    									<div class="row">
    									<!-- Avatar -->
    										<div class="pseudoavatar">
    											<div class="col-xs-3">
    												<img width="50" height="50" src="images/defaultavatar.png">
    											</div>
    									<!-- Pseudo -->
    											<div class="col-xs-9">
    												<div class="commentpseudo">
    													<b>
    												    '.$NomUtilisateur[$id].'
    													</b>
    												</div>
    											</div>
    										</div>
    										
    									</div>
    									
    									
    									<div class="row">
    									<!-- Comment -->
    										<div class="col-xs-10 col-xs-offset-1">
    											<div class="jumbotron">
    												   '.$commentaire['CTexte'].'
    											   </div>
    										</div>
    									</div>';
			      }	
			      if($_SESSION['UserSession']==TRUE){
										echo'<!-- New Comment Writing -->
    									
    									<div class="commentform">
    										<div class="col-xs-10 col-xs-offset-1">
    											<form method="POST" action="index.php?controller=Commentaire&action=AddCommentaire&id='.$_GET['id'].'">
                                                        ';if($error==1){
                                                        echo '<p style="color:red;">Veuillez remplir le champs texte pour poster un commentaire</p>';
										                  }echo'
														<input class="comment" type="text" name="writecomment" placeholder="Ecrivez votre commentaire"/>
    												<br><button type="submit" class="btn btn-primary btn-sm">Envoyer</button>
    											</form>
    										</div>
    									</div>
    			';}
    								echo'</div>
    								
    								
    							</div>
    						</div>
    			   
    	      </div>
    		  
    		
    		  
    		
    		  
		  
	';}


























