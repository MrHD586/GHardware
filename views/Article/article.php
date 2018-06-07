<?php
	################################################################################
	#### Auteur : Butticaz Yvann   
	#### Date : 22 Février 2018
	#### Page views/Article/list.php:
	####       Cette page va sert à afficher l'article que l'on consulte
	################################################################################

	//affichage des données récupérées
	//echo "<pre>".var_dump($articles)."</pre>";
    foreach($articles as $article){
    	echo '<div class="col-lg-9">
    		      <div class="row">
                       <div class="col-xs-4 col-xs-offset-4"><h1>'.$article['Name'].'</h1></div>
                  </div>
        		  <div class="row">
                      <div class="col-lg-7"><img class="img-responsive" src="'.$article['Link'].'"></div> 
        			  <div class="col-lg-4">
                           ';
    	                   if($article['Stock']==0){
    	                       echo'<div class="col-md-12">En Stock : <span class="badge text-success">Out of stock</span></div>';
    	                   }else{
        			           echo'<div class="col-md-12">En Stock : <span class="badge text-success">'.$article['Stock'].'</span></div>';
    	                   }
    	                   echo'
        				   <div class="col-md-12"><h2>Prix : <span class="badge text-success">'.$article['Price'].'</h2></span></div>';
    	                   if($_SESSION['userIsAdmin'] != TRUE){
    	                       if($article['Stock']!=0){
    	                           if($_SESSION['UserSession']==TRUE){
        				                echo'<div class="col-md-12"><a class="btn btn-default navbar-btn" href="index.php?controller=Cart&action=bdd&id='.$article['idArticle'].'" role="button">Ajouter au Panier</a></div>';
    	                           }else{
                                        echo'<div class="col-md-12"><a class="btn btn-default navbar-btn" href="index.php?controller=Cart&action=cookie&id='.$article['idArticle'].'" role="button">Ajouter au Panier</a></div>';
                                   }
    	                       }
    	                   }
    	                   
        			  echo'</div>
        		  </div>
        		  <br>
        		  <div class="row">
        		      <div class="col-sm-10">
                           <br>
                           <div class="jumbotron">
        		               '.$article['Description'].'
        	               </div>
        		      </div>
        	       </div> 
				   
				   
				   
		</div>
    		  
	
    		  
    		
    		  
		  
	';}


























