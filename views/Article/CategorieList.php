<?php
################################################################################
#### Auteur : Butticaz Yvann
#### Date : 22 F�vrier 2018
#### Page views/Article/list.php:
####       Cette page va sert � afficher l'article que l'on consulte
################################################################################

//affichage des données récupérée

$categorie = $_GET['categorie'];

echo'
	<div class="col-lg-9">
	
	
';

foreach($Categoriearticles as $value){
    $id = $value['idArticle'];
    echo'
			
		<div class="col-xs-12 col-sm-6 col-md-4">	
			<!-- START ARTICLE-->	
				<div class="articlebox">
					<a id="categorylink" href="#">
						<!-- Category -->
							<div class="col-xl-12">
								'.$categorie.'
							</div>
						
						<!-- Image -->
							<div class="col-xl-12">
								<img class="img-responsive" src="images/imagetemplate.png">
							</div>
						<!-- Price and Text -->
							<div class="col-xl-12">
								'.$value['APrix'].'
							</div>
							<div class="col-xl-12">
								'.$value['AName'].'
							</div>
							
							</a>	
							
						<!-- Notation and Cart -->
							<div class="col-xl-12">
								<div class="row">
									<div class="col-xs-9">
										*****
									</div><div class="col-xs-3">
										<a href="#"><img class="img-responsive" src="images/carticon.png"></a>
									</div>
								</div>
							</div>
					</div>
				</div>		
				<!-- END ARTICLE-->
				
					
			
					
					
			
			
			';
}

echo'
	
	</div>
';
