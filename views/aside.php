<?php
    ################################################################################
    #### Auteur : Favre Valentin
    #### Date : 01.03.2018
    #### Page Header:
    ####       Ceci est le Aside qui est include dans le index.php
    ################################################################################
        
    echo '

	<!-- SIDE MENU -->
	<div class="sidemenu">
		<div class="col-lg-3">
		
		
			<div class="navbar-default sidebar" role="navigation">
				  <div class="navbar-header">
                
		<!-- Nav Button -->			
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"></a><br>
            </div>
			
			
		<!-- Nav Collapsing Menu -->		
				<div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">';
                
                //affichage des catégories dans le menu
                foreach($aside as $value){
                    echo '<li>
                     <a href="index.php?controller=Categorie&action=list&categorie='.$value['Ccategorie'].'">'.$value['Ccategorie'].'</a>
                     </li>';
                 }
                 echo'
				 <li>
		<!-- Brand Search Form  -->				
					<form method="post" action="#">
						<input class="searchbar" type="search" name="search" placeholder="Marques">
							<br><button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span> Chercher</button>
					</form>
				 </li>
                </ul>   
                </div>
         <!-- /.sidebar-collapse -->
			
			</div>
			
		
		</div>
	</div>	
	';
?>