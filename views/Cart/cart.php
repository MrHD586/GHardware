<?php
<<<<<<< HEAD
echo '<form action="index.php?controller=Cart&action=SupprimerArticles" method="POST">';
Foreach($articles as $value){
=======
/*Foreach($articles as $value){
>>>>>>> 28fe3195368353c7e6e38db32697df4e4df5aa8f
    foreach($value as $value){
        $index = $value['idArticle'];
        $prixtotal = $value['APrix'] * $PanierNb[$index];
        echo 'Nom Article  : ';
        echo $value['AName'];
        echo'   ';
        echo 'Prix : ' ;
        echo $value['APrix'];
        echo'   ';
        echo 'Prix total: ';
        echo $prixtotal;
        echo'   ';
        echo 'Nombre  : ';
        
               echo '<input type="number" value="'.$PanierNb[$index].'"name="'.$index.'" style="width: 50px" onchange="submit()">';
              
        echo '</br>';
        
    }
}
<<<<<<< HEAD
echo'</form>';
=======

*/

echo'

<div class="col-lg-9">

<!-- CART MENU -->
		
			<div class="row">
				
				<div class="cartmenu">
					<button type="button" class="btn btn-default" href="#">Passer la commande</button>
					<button type="button" class="btn btn-default" href="#">Vider le panier</button>
				</div>
				
			</div>
		
		<!-- ARTICLES -->
		
			<div class="cartarticle">
				<center>
			<div class="row">
				<div class="col-md-2">
					<img class="img-responsive" src="images/imagetemplate.png">
				</div>
				
				<div class="col-md-6">
					<div class="row">
						<center>
						<b>Nom Article</b>
						</center>
					</div>
				
					<div class="row">
						
						<form>
							<input type="button" onclick="#" value="-">
							<input type="number" name="quantity" min="0" max="99">
							<input type="button" onclick="#" value="+">
						</form>
						
					</div>
					
				</div>
					
					<div class="col-md-2 col-xs-6">
						<div class="row">
							<b>Prix Unitaire :</b>
						</div>
						<div class="row">
							<b>56.50</b>
						</div>
					</div>
					
					<div class="col-md-2 col-xs-6">
						<div class="row">
							<b>Prix Total :</b>
						</div>
						<div class="row">
							<b>56.50</b>
						</div>
					</div>
					
				
			</div>
				</center>
			</div>

		<!-- FIN ARTICLE -->
		
		</div>
		
		';
>>>>>>> 28fe3195368353c7e6e38db32697df4e4df5aa8f
