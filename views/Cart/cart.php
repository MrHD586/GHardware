<?php
//<button type="submit" name="vider" value="1" class="btn btn-default">Vider le panier</button>
echo'

<div class="col-lg-9">

		<!-- CART MENU -->	
			<div class="row">
				
				<div class="cartmenu">
		<!-- Order the cart content button -->
			<div class="col-sm-offset-2 col-sm-4" id="carticon" >';
            if($error==1){
            echo '<p style="color:red;">Vous ne pouvez pas passer une commande sans articles dans le panier</p>';
            }
            if($vide==1){
            echo'<form action="index.php?controller=Cart&action=displayCookie&vide=1" method="POST">
					<input type="submit" name="commande" value="Passer la commande" disabled>
                </form>';
            }else{
            echo'
                <form action="index.php?controller=Login&action=login&Paniercookie=1" method="POST">
					<input type="submit" name="commande" value="Passer la commande">
                </form>';
            }
			echo'</div>
				
		<!-- Discard the shopping cart button -->
					<div class="col-sm-4" id="carticon">
						<form action="index.php?controller=Cart&action=DeleteArticlecookie" method="POST">
							<input type="submit" name="vider" value="Vider le panier">
						</form>
					</div>
                </div>    
			</div>
		
		<!-- ARTICLES -->';
        echo '<form action="index.php?controller=Cart&action=deleteArticlecookie" method="POST">';
        Foreach($articles as $value){
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
							<input type="button" onclick="nb=document.getElementById('.$index.').value;nb--;document.getElementById('.$index.').value=nb;submit()" value="-">
								<input id="cartnumber" type="number" value="'.$PanierNb[$index].'" onchange="submit()" name="'.$index.'" id="'.$index.'"min="0" max="99">
									<input type="button" onclick="nb=document.getElementById('.$index.').value;nb++;document.getElementById('.$index.').value=nb;submit()" value="+">
						
						
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
        echo'</form>';
         
         echo '
		<!-- FIN ARTICLE -->
		
		</div>
		
		';

