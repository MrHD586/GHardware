<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 F�vrier 2018
    #### Page Header:
    ####       Ceci est le header qui est include dans le index.php
    ################################################################################
        
    session_start();
    
    echo '
        <!DOCTYPE html>
        <html>
          <head>
        	<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
        	<title>Ghardware</title>
        	<link <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          	<link href="views/assets/css/addstyle.css" rel="stylesheet">
            <link href="views/Assets/css/bootstrap.css" rel="stylesheet">
        
          </head>
          
          
          <body>
          
          <div class="container"
          
            <!-- Header Menu -->
          	<header>
        		<div class="row">
        			<div class="col-sm-3"><a href="index.php"><img class="img-responsive" src="images/GHardwareLogoB.png"></a></div>
        			<div class="col-sm-9">
            	<!-- Login / Logout Button -->
        				<div class="col-xs-offset-8 col-lg-4"><a href='.$loginHref.'>'.$loginText.'</a>'.$deconectButton.'
						
						</div>
						
        				<div class="col-sm-8">
        	   <!-- Navigation (Logo + Search + Panier) -->
        					<form method="post" action="#"><br><input class="searchbar" type="search" name="search" placeholder="Recherche"><button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span> Chercher</button></form>
        				</div>
        				  <div class="col-sm-1">';
        	//test pour savoir si l'utilisateur est connecté			  
            if($_SESSION['UserSession']==TRUE){
                //si il est connecté utilisation du manager pour le panier bdd
                echo'<a class="btn btn-default navbar-btn" href="index.php?controller=Cart&action=affichebdd" role="button">Panier <span class="badge text-success"></span></a>';
                
            }else{
                //recuperation du cookie
                $Panier = unserialize($_COOKIE['Panier']);
                //test pour savoir si le cookie a des valeur a 'intérieur
                if($Panier[0]!=NULL){
                    //attribution du nombre d'articles dans une variable pour afficher a coté du bouton panier
                    $Nombre = count($Panier);
                }else{
                    //attribution d'aucun valeur pour que rien ne s'affiche a cote du bonton
                    $Nombre = NULL;
                }
                //si il n'est pas connecté utilisation du panier avec les cookies
                echo'<a class="btn btn-default navbar-btn" href="index.php?controller=Cart&action=affichecookie" role="button">Panier <span class="badge text-success">'.$Nombre.'</span></a>';
            }
          echo' 
		  
		  </div>
		  
		  <div class="col-sm-3">';
		  
            //titre et fonction du bouton
            if($_SESSION['user_name'] != null){
                $loginButtonText = $_SESSION['user_name'];
                $loginButtonHref ="DropdownButtonFonction()";
            }else{
                $loginButtonText = "login";
                $loginButtonHref ="location.href = 'index.php?controller=Login&action=login';";
            }
          
                
		 echo'
		  <div class="dropdown">
				<button onclick="'.$loginButtonHref.'" class="btn btn-default navbar-btn dropbtn">'.$loginButtonText.'</button> 
				  <div id="myDropdown" class="dropdown-content">				
    					<a href="index.php?controller=Site&action=profil">Profil</a>
    					<a href="index.php?controller=Cart&action=bdd">Panier</a>
                        <a href="">Commandes</a>
                        <a href="">Liste de souhaits</a>
                        <a href="index.php?controller=Login&action=logout"> Deconnexion</a>
				    </div>
			</div>
        			</div>
        		</div>
			
        	</header>
        	
        	
        	<!-- ROW for Central Part | DO NOT TOUCH-->
        	<div class="row">
			
			<script>
				function DropdownButtonFonction() {
					document.getElementById("myDropdown").classList.toggle("show");
				}
				window.onclick = function(event) {
				  if (!event.target.matches(\'.dropbtn\')) {
					var dropdowns = document.getElementsByClassName("dropdown-content");
					var i;
					for (i = 0; i < dropdowns.length; i++) {
					  var openDropdown = dropdowns[i];
					  if (openDropdown.classList.contains(\'show\')) {
						openDropdown.classList.remove(\'show\');
					  }
					}
				  }
				}
			</script>

	';
?>

<!--
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
	</head>
</html>

-->