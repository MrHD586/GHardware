<?php 
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Page views/Admin/home.php:
    #### 		  Page d'accueil pour l'administration
    ################################################################################
   
    
    echo'
    	<div class="col-lg-9">        
    		<div class="col-xs-12 col-sm-6 col-md-4">
    			
                <!-- START ARTICLE-->
    				<div class="articlebox">
    					<a id="categorylink" href="index.php?controller=Article&action=article&id=">
    						
                            <!-- Category -->
    							<div class="col-xl-12">

    							</div>
    								    
    						<!-- Image -->
    							<div class="col-xl-12">
    								<img class="img-responsive" src="images/imagetemplate.png">
    							</div>
    						
                            <!-- Price and Text -->
    							<div class="col-xl-12">
    								
    							</div>
    							<div class="col-xl-12">
    								
    							</div>
    								    
    							</a>
    								    
    						<!-- Notation and Cart -->
    							<div class="col-xl-12">
    								<div class="row">
    									<div class="col-xs-9">
    										*****
    									</div>
                                        <div class="col-xs-3">';
                                        
                                            if($_SESSION['UserSession']==TRUE){
                                                echo'<a href=""><img class="img-responsive" src="images/carticon.png"></a>';
                                            }else{
                                                echo'<a href=""><img class="img-responsive" src="images/carticon.png"></a>';
                                            }
                                       
                                        echo'</div>
    								</div>
    							</div>
					</div>
			</div>
    	    <!-- END ARTICLE-->
   		   
        </div>
    ';

?>
































