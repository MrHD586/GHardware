<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 07 Mai 2018
    #### Page views/Admin/home.php:
    #### 	  Page d'accueil pour les admins
    ################################################################################
    

    //links
    $userAdmin = "index.php?controller=Admin&action=user";
    $userOrder = "index.php?controller=Admin&action=order";
    $userComment = "index.php?controller=Admin&action=comment";
    $articleAdmin = "index.php?controller=Admin&action=article";
    $brandAdmin = "index.php?controller=Admin&action=brand";
    $categoryAdmin = "index.php?controller=Admin&action=category";
    $imageAdmin = "index.php?controller=Admin&action=imageArticle";
    

	echo '
		
			<div class="col-lg-9">
			
			
			
			<!-- ADMIN -->
			
			<!-- User -->
			<div class="col-xs-12 col-sm-6 col-md-3">
				
				<div class="articlebox">
					<a id="categorylink" href="'.$userAdmin.'">
					
							<div class="col-xl-12">
								<center>Utilisateurs</center>
							</div>
								<div class="col-xl-12">
								<img class="img-responsive" src="images/adduser.png">
							</div>
							
							</a>	
							
					</div>
				</div>

            <!-- Order -->
    			<div class="col-xs-12 col-sm-6 col-md-3">
    				
    				<div class="articlebox">
    					<a id="categorylink" href="'.$userOrder.'">
    					
    							<div class="col-xl-12">
    								<center>Commandes</center>
    							</div>
    								<div class="col-xl-12">
    								<img class="img-responsive" src="images/order.png">
    							</div>
    							
    							</a>	
    							
    					</div>
    				</div>
            
            <!-- Comment -->
    			<div class="col-xs-12 col-sm-6 col-md-3">
    				
    				<div class="articlebox">
    					<a id="categorylink" href="'.$userComment.'">
    					
    							<div class="col-xl-12">
    								<center>Commentaires</center>
    							</div>
    								<div class="col-xl-12">
    								<img class="img-responsive" src="images/comment.png">
    							</div>
    							
    							</a>	
    							
    					</div>
    				</div>

				
			<!-- New Article -->	
			<div class="col-xs-12 col-sm-6 col-md-3">
				
				<div class="articlebox">
					<a id="categorylink" href="'.$articleAdmin.'">
					
							<div class="col-xl-12">
								<center>Articles</center>
							</div>
													<div class="col-xl-12">
								<img class="img-responsive" src="images/article.png">
							</div>
							
							</a>	
							
					</div>
				</div>
			
			<!-- New Brand -->
			<div class="col-xs-12 col-sm-6 col-md-3">
				
				<div class="articlebox">
					<a id="categorylink" href="'.$brandAdmin.'">
					
							<div class="col-xl-12">
								<center>Marques</center>
							</div>
													<div class="col-xl-12">
								<img class="img-responsive" src="images/mark.png">
							</div>
							
							</a>	
							
					</div>
				</div>
				
			<!-- New Category -->
			<div class="col-xs-12 col-sm-6 col-md-3">
				
				<div class="articlebox">
					<a id="categorylink" href="'.$categoryAdmin.'">
					
							<div class="col-xl-12">
								<center>Catégories</center>
							</div>
													<div class="col-xl-12">
								<img class="img-responsive" src="images/category.png">
							</div>
							
							</a>	
							
					</div>
				</div>


            <!-- New Image -->
			<div class="col-xs-12 col-sm-6 col-md-3">
				
				<div class="articlebox">
					<a id="categorylink" href="'.$imageAdmin.'">
					
							<div class="col-xl-12">
								<center>Images</center>
							</div>
								<div class="col-xl-12">
								<img class="img-responsive" src="images/images.png">
							</div>
							
							</a>	
							
					</div>
				</div>
				
			<!-- FIN ADMIN -->
			


				</div>


	';
