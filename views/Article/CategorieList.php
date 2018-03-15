<?php
################################################################################
#### Auteur : Butticaz Yvann
#### Date : 22 F�vrier 2018
#### Page views/Article/list.php:
####       Cette page va sert � afficher l'article que l'on consulte
################################################################################

//affichage des données récupérée
foreach($Categoriearticles as $value){
    $id = $value['idArticle'];
    echo '<a href="index.php?controller=Article&action=article&id='.$id.'">';
    echo'Articles: '.$value['AName'].'';
    echo'</a>';
    echo'</br>';
}

echo'
			
			<div class="col-xs-12 col-sm-6 col-md-4">
			<!-- START ARTICLE-->	
				<div class="articlebox">
					<a id="categorylink" href="#">
						<!-- Category -->
							<div class="col-xl-12">
								Catégorie
							</div>
						
						<!-- Image -->
							<div class="col-xl-12">
								<img class="img-responsive" src="images/imagetemplate.png">
							</div>
						<!-- Price and Text -->
							<div class="col-xl-12">
								214.50
							</div>
							<div class="col-xl-12">
								NOM ARTICLE
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
							
				<!-- END ARTICLE-->
				</div>
					
			
					
					
			
			
			';

