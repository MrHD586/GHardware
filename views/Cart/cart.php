<?php
/*Foreach($articles as $value){
    foreach($value as $value){
        $index = $value['idArticle'];
        $prixtotal = $value['APrix'] * $PanierNb[$index];
        echo 'Nom Article  : ';
        echo $value['AName'];
        echo'   ';
        echo 'Prix : ' ;
        echo $value['APrix'];
        echo'   ';
        echo 'Nombre  : ';
        echo $PanierNb[$index];
        echo'   ';
        echo 'Prix total: ';
        echo $prixtotal;
        echo '</br>';
        
    }
}

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