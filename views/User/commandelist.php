<?php
################################################################################
#### Auteur : Valentin Favre
#### Date : 24 Mai 2018
#### Page de Commande (Affichage)
################################################################################
echo'
	<div class="col-lg-10 col-lg-offset-1">
    
    
    
				<center>
			<div class="row">
    
			<!-- Date Commande -->
    
				<div class="col-md-3">
					<div class="row">
						<center>
						<b>Date commande</b>
						</center>
					</div>
				</div>
			<!-- Commande N° -->
				<div class="col-md-2">
					<div class="row">
						<center>
						<b>N°de commande</b>
						</center>
					</div>
				</div>
    
    
			<!-- Etat livraison -->
    
						<div class="col-md-2">
							<div class="row">
								<center>
						<b>Etat de la livraison</b>
								</center>
							</div>
						</div>
    
			<!-- Etat paiement -->
    
						<div class="col-md-2">
							<div class="row">
								<center>
						<b>Etat du paiement</b>
								</center>
							</div>
						</div>
    
			<!-- Prix Total -->
    
						<div class="col-md-3">
							<div class="row">
								<center>
						<b>Prix Total</b>
								</center>
							</div>
						</div>
    
					</div>
				</center>';
$number=0;
foreach($Order as $value){
    if($value['NumberOrder'] == $number){
        
    }else{
        $number= $value['NumberOrder'];
        if($value['PayementState']==0){
            $PayementState='En cour de traitement';
        }else if($value['PayementState']==1){
            $PayementState='Payer';
        }else{
            $PayementState='Payement refuser';
        }
        if($value['State']==0){
            $State='En attente du payement';
        }else if($value['State']==1){
            $State='Envoyer';        
        }else{
            $State='Arriver à destination';
        }
       
echo'
       
    
		<div class="commandarticle">
			<a class="commandlink" href="#">
				<center>
			<div class="row">
    
			<!-- Date Commande -->
    
				<div class="col-md-3">
					<div class="row">
						<center>
						'.$value['Date'].'
						</center>
					</div>
				</div>
			<!-- Commande N° -->
				<div class="col-md-2">
					<div class="row">
						<center>
						'.$value['NumberOrder'].'
						</center>
					</div>
				</div>
    
    
			<!-- Etat livraison -->
    
						<div class="col-md-2">
							<div class="row">
								<center>
						'.$State.'
								</center>
							</div>
						</div>
    
			<!-- Etat paiement -->
    
						<div class="col-md-2">
							<div class="row">
								<center>
						'.$PayementState.'
								</center>
							</div>
						</div>
    
					</div>
				</center>
			</a>
		</div>';
    }
}    
echo'</div>';
