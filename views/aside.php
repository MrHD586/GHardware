<?php
    ################################################################################
    #### Auteur : Favre Valentin
    #### Date : 01.03.2018
    #### Page Header:
    ####       Ceci est le Aside qui est include dans le index.php
    ################################################################################
    
    echo '
		<div class="row">
	
	<!-- SIDE MENU -->
		<div class="col-lg-3">
			<div class="navbar-default sidebar" role="navigation">
				  <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
					                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"></a><br>
            </div>
				<div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">';
                    
                foreach($aside as $value){
                    echo '<li>
                     <a href="#">'.$value.'</a>
                     </li>';
                 }
                 echo'
                </ul>  
                </div>
                <!-- /.sidebar-collapse -->
			
			</div>
		</div>
	';
?>