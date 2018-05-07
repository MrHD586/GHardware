<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 07 Mai 2018
    #### Page views/Admin/home.php:
    #### 	  Page d'accueil pour les admins
    ################################################################################
    

    //links
    $userAdmin = "index.php?controller=Admin&action=user";
    $articleAdmin = "index.php?controller=Admin&action=article";
    $brandAdmin = "index.php?controller=Admin&action=brand";
    $categoryAdmin = "index.php?controller=Admin&action=category";
    

	echo '
		
			<div class="col-lg-9">
			
			
			
			<!-- ADMIN -->
			
			<!-- User -->
			<div class="col-xs-12 col-sm-6 col-md-3">
				
				<div class="articlebox">
					<a id="categorylink" href="'.$userAdmin.'">
					
							<div class="col-xl-12">
								<center>Nouvel Utilisateur</center>
							</div>
								<div class="col-xl-12">
								<img class="img-responsive" src="images/adduser.png">
							</div>
							
							</a>	
							
					</div>
				</div>
				
			<!-- New Article -->	
			<div class="col-xs-12 col-sm-6 col-md-3">
				
				<div class="articlebox">
					<a id="categorylink" href="'.$articleAdmin.'">
					
							<div class="col-xl-12">
								<center>Nouvel Article</center>
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
								<center>Nouvelle Marque</center>
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
								<center>Nouvelle Catégorie</center>
							</div>
													<div class="col-xl-12">
								<img class="img-responsive" src="images/category.png">
							</div>
							
							</a>	
							
					</div>
				</div>
				
			<!-- FIN ADMIN -->
			


				</div>


	';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>GHardware</title>
	</head>

	<body>
	</body>
</html>
