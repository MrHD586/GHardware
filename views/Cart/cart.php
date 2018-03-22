<?php
echo'

<div class="col-lg-9">

<!-- CART MENU -->
		
			<div class="row">
				
				<div class="cartmenu">
					<button type="button" class="btn btn-default" href="#">Passer la commande</button>
					<button type="button" class="btn btn-default" href="#">Vider le panier</button>
				</div>
				
			</div>
		
		<!-- ARTICLES -->';
        echo '<form action="index.php?controller=Cart&action=SupprimerArticles" method="POST">';
        Foreach($articles as $value){
        foreach($value as $value){
        $index = $value['idArticle'];
        $prixtotal = $value['APrix'] * $PanierNb[$index];
        echo'
        
		<div class="cartarticle">
        
				<center>
			<div class="row">
				<div class="col-md-2">
					<img class="img-responsive" src="images/imagetemplate.png">
				</div>
				
				<div class="col-md-6">
					<div class="row">
						<center>
						<b>'.$value['AName'].'</b>
						</center>
					</div>
				
					<div class="row">
						
						
							<input type="button" onclick="nb =document.getElementById('.$index.').value;nb--;document.getElementById('.$index.').value= nb;submit()" value="-">
							<input type="number" value="'.$PanierNb[$index].'" onchange="submit()" name="'.$index.'" id="'.$index.'"min="0" max="99">
							<input type="button" onclick="nb =document.getElementById('.$index.').value;nb++;document.getElementById('.$index.').value= nb;submit()" value="+">
						
						
					</div>
					
				</div>
					
					<div class="col-md-2 col-xs-6">
						<div class="row">
							<b>Prix Unitaire :</b>
						</div>
						<div class="row">
							<b>'.$value['APrix'].'</b>
						</div>
					</div>
					
					<div class="col-md-2 col-xs-6">
						<div class="row">
							<b>Prix Total :</b>
						</div>
						<div class="row">
							<b>'.$prixtotal.'</b>
						</div>
					</div>
					
				
			</div>
				</center>
			</div>';
        }
        }
        echo'</form>';
         
         echo '
		<!-- FIN ARTICLE -->
		
		</div>
		
		';

