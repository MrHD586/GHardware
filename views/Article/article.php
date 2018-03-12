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
                   <div class="col-lg-4 col-lg-offset-4"><h1>'.$articles['AName'].'</h1></div>
              </div>
    		  <div class="row">
                  <div class="col-lg-7 col-xs-offset-1"><img class="img-responsive" src="images/imagetemplate.png"></div> 
    			  <div class="col-lg-4">
    			       <div class="col-md-12">En Stock : <span class="badge text-success">'.$articles['AStock'].'</span></div>
    				   <div class="col-md-12"><h2>Prix : <span class="badge text-success">'.$articles['APrix'].'</h2></span></div>
    				   <div class="col-md-12"><button type="button" class="btn btn-default navbar-btn" href="#">Ajouter au Panier</button></div>	
    			  </div>
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
	      </div>
	';}


























