<?php
//<button type="submit" name="vider" value="1" class="btn btn-default">Vider le panier</button>
echo'

<div class="col-lg-9">

		<!-- CART MENU -->	
			<div class="row">
				
				<div class="cartmenu">
		<!-- Order the cart content button -->
                <form action="index.php?controller=Login&action=login&Paniercookie=1" method="POST">
					<input type="submit" name="commande" value="Passer la commande">
                </form>
				
		<!-- Discard the shopping cart button -->
                <form action="index.php?controller=Cart&action=SupprimerArticles" method="POST">
                    <input type="submit" name="vider" value="Vider le panier">
				</form>
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
			
			<!-- Article Image -->
				<div class="col-md-2">
					<img class="img-responsive" src="images/imagetemplate.png">
				</div>
				
			<!-- Article Name -->
				
				<div class="col-md-6">
					<div class="row">
						<center>
						<b>'.$value['AName'].'</b>
						</center>
					</div>
				
					<div class="row">
						
				<!-- + and - Buttons -->	
							<input type="button" onclick="nb =document.getElementById('.$index.').value;nb--;document.getElementById('.$index.').value= nb;submit()" value="-">
								<input type="number" value="'.$PanierNb[$index].'" onchange="submit()" name="'.$index.'" id="'.$index.'"min="0" max="99">
									<input type="button" onclick="nb =document.getElementById('.$index.').value;nb++;document.getElementById('.$index.').value= nb;submit()" value="+">
						
						
					</div>
					
				</div>
				
					<!-- Unit Price -->
						
						<div class="col-md-2 col-xs-6">
							<div class="row">
								<b>Prix Unitaire :</b>
							</div>
							<div class="row">
								<b>'.$value['APrix'].'</b>
							</div>
						</div>
						
					<!-- Full Price -->
						
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

