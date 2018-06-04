<?php
    //<button type="submit" name="vider" value="1" class="btn btn-default">Vider le panier</button>
    echo'
        
    <div class="col-lg-9">
    		<!-- CART MENU -->
    			<div class="row">
    				<div class="cartmenu">
    		<!-- Order the cart content button -->
    			<div class="col-sm-offset-2 col-sm-4" id="carticon" >';
                   if($Vide==1){
                    echo'<form action="index.php?controller=Cart&action=bdd&vide=1" method="POST">
    					   <input type="submit" name="commande" value="Passer la commande">
                        </form>';
                    }else{
                    echo'<form action="index.php?controller=Order&action=order" method="POST">
    					<input type="submit" name="commande" value="Passer la commande">
                    </form>';
                    }
    			echo'</div>
        
    		<!-- Discard the shopping cart button -->
    					<div class="col-sm-4" id="carticon">
    						<form action="index.php?controller=Cart&action=UpdateDeletebdd" method="POST">
    							<input type="submit" name="vider" value="Vider le panier">
    						</form>
    					</div>
                    </div>
    			</div>
        
    		<!-- ARTICLES -->';
            Foreach($articlesbdd as $value){
                foreach($value as $value){
                    $index = $value['idArticle'];
                    if($nombre[$index] > $value['Stock']){
                        $nombre[$index]=$value['Stock'];
                    }
                    $prixtotal = $value['Price'] * $nombre[$index];
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
                						<b>'.$value['Name'].'</b>
                						</center>
                					</div>
                						    
                					<div class="row">
                						    
                				<!-- + and - Buttons -->
                                <form action="index.php?controller=Cart&action=UpdateDeletebdd" method="POST">
                							<input type="button" onclick="nb =document.getElementById('.$index.').value;nb--;document.getElementById('.$index.').value= nb;submit()" value="-">
                								<input type="number" value="'.$nombre[$index].'" onchange="submit()" name="'.$index.'" id="'.$index.'"min="0" max="99">
                									<input type="button" onclick="nb =document.getElementById('.$index.').value;nb++;document.getElementById('.$index.').value= nb;submit()" value="+">
                									<input type="hidden" name="Articles" value="'.$index.'">
                                </form>  
                									    
                					</div>
                									    
                				</div>
                									    
                					<!-- Unit Price -->
                									    
                						<div class="col-md-2 col-xs-6">
                							<div class="row">
                								<b>Prix Unitaire :</b>
                							</div>
                							<div class="row">
                								<b>'.$value['Price'].'</b>
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
    
    echo '
    		<!-- FIN ARTICLE -->
        
    		</div>
        
    		';
