<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 22 F�vrier 2018
#### Page views/Search/search.php:
####       Cette page sert � afficher les articles rechercher
################################################################################



echo'
    	<div class="col-lg-9">
    
    ';

foreach($Categoriearticles as $value){
    $id = $value['idArticle'];
    $fkcategorie = $value['Fk_Categories'];
    echo $aside[$fkcategorie];
    //$categorie=$aside[$fkcategorie];
    echo'
        
    		<div class="col-xs-12 col-sm-6 col-md-4">
    			<!-- START ARTICLE-->
    				<div class="articlebox">
    					<a id="categorylink" href="index.php?controller=Article&action=articlecommentaire&id='.$id.'">
    						<!-- Category -->
    							<div class="col-xl-12">
    								'.$categorie['CCategorie'].'
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
                                            ';
    if($_SESSION['UserSession']==TRUE){
        echo'<a href="index.php?controller=Cart&action=bdd&id='.$id.'&categorie='.$categorie.'"><img class="img-responsive" src="images/carticon.png"></a>';
    }else{
        echo'<a href="index.php?controller=Cart&action=cookie&id='.$id.'&categorie='.$categorie.'"><img class="img-responsive" src="images/carticon.png"></a>';
    }
    echo'</div>
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
