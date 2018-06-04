<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 22 F�vrier 2018
    #### Page views/Article/list.php:
    ####       Cette page sert � afficher l'article que l'on consulte
    ################################################################################
    

    
    
    echo'
    	<div class="col-lg-9">';
    
    foreach($CategoryArticle as $value){
        $id = $value['idArticle'];
        echo'
    			
    		<div class="col-xs-12 col-sm-6 col-md-4">	
    			<!-- START ARTICLE-->	
    				<div class="articlebox">
    					<a id="categorylink" href="index.php?controller=Article&action=articlecommentaire&id='.$id.'">
    						<!-- Category -->
    							<div class="col-xl-12">
    								'.$category.'
    							</div>
    						
    						<!-- Image -->
    							<div class="col-xl-12">
    								<img class="img-responsive" src="'.$value['Link'].'">
    							</div>
    						<!-- Price and Text -->
    							<div class="col-xl-12">

    								'.$value['Price'].'

    								'.$value['APrix'].'CHF

    							</div>
    							<div class="col-xl-12">
    								'.$value['Name'].'
    							</div>
    							
    							</a>	
    							
    						<!-- Notation and Cart -->
    							<div class="col-xl-12">
    								<div class="row">';
                                    if($value['Stock']==0){
                                        echo'<div class="col-xs-9">
                                        Out of Stock
                                        </div><div class="col-xs-3">';
                                    }else{
                                           if($_SESSION['userIsAdmin'] != TRUE){
                                               
                                                    if($_SESSION['UserSession']==TRUE){
                                                        echo'<a href="index.php?controller=Cart&action=bdd&id='.$id.'&categorie='.$category.'"><img class="img-responsive" src="images/carticon.png"></a>';
                                                    }else{
                                                        echo'<a href="index.php?controller=Cart&action=cookie&id='.$id.'&categorie='.$category.'"><img class="img-responsive" src="images/carticon.png"></a>';
                                                    }
                                                
                                           }
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
