<?php

echo'<link href="views/Assets/css/printstyle.css" rel="stylesheet">';

$number=0;
$Prix=0;
$PrixTotal=0;
foreach($order as $value){
    if($number<=0){
        if($value['State']==0){
            
            $state='En attente du payement';
            
        }else if($value['State']==1){
            
            $state='Envoyée';
            
        }else{
            
            $state='Arrivée à destination';
            
        }
        if($value['PayementMethod']==0){
            
            $paymentmethod='Nature';
            
        }else if($value['PayementMethod']==1){
            
            $paymentmethod='Facture';
            
        }
        if($value['PayementState']==0){
            
            $paymentstate='En cours de traitement';
            
        }else if($value['PayementState']==1){
            
            $paymentstate='Payé';
            
        }else{
            
            $paymentstate='Payement refuser';
        }
    }
    foreach($articles as $values){
        if(($value['Fk_Article'])==($values['idArticle'])){
            $Prix += $value['Number']*$values['Price'];
            $PrixTotal += $value['Number']*$values['Price'];
        }
        $Prix=0;
    }
    if($number<=0){
echo'
	
	<div class="col-sm-12">
		<div class="showing">
			<div class="col-lg-offset-4 col-sm-4">
				<img id="imgprint" src="images/GHardwareLogoB.png"><br>
			</div>
		</div>
		
	</div>
	<div class="col-sm-12">
		<div class="col-lg-offset-3 col-sm-8">
					<h1>Commande '.$value['NumberOrder'].'</h1>
		</div>
		
	

';    



        
    
echo'

	<div class="hiding">
	
		<div class="col-lg-offset-2 col-sm-4">
		<ul>
			<li><strong>Nom complet : </strong></li>
			<br>
			<li><strong>Adresse : </strong></li>
			<br>
			<br>
			<br>
			<li><strong>Date de commande : </strong></li>
			<li><strong>Numéro de commande : </strong></li>
			<br>
			<li><strong>Etat de la commande : </strong></li>
			<li><strong>Méthode de payement : </strong></li>
			<li><strong>Etat du payement : </strong></li>
			<br>';
}echo'
			<li><strong>Article : </strong></li>
			<li><strong>Quantité : </strong></li>
			<li><strong>Prix : </strong></li>
			<br>
';if($number<=0){
   echo'</ul>
		</div>

        <div class="col-sm-4">
			
			'.$FirstName.' '.$LastName.'<br>
			<br>
			'.$Road.'<br>
			'.$NPA.'<br>
			'.$Town.'<br>
			<br>
			'.$value['Date'].'<br>
			'.$value['NumberOrder'].'<br>

			<br>
			Envoyée<br>
			Nature<br>
			Accepté<br>
			<br>';}
$number++;
echo'
			'.$values['Name'].'<br>
			'.$value['Number'].'<br>
			'.$Prix.' CHF<br>
			<br>';
}
echo'			
	</div>
	<div class="separation">
			<div class="col-sm-12">
			</div>
		
			<div class="col-lg-offset-2 col-sm-4">
				<ul><li><strong>TOTAL : </strong></li></ul>
			</div>
			
			<div class="col-sm-4">
				<strong>140 CHF</strong>
			</div>
		</div>
	</div>
	
';

echo'
	<div class="showing">
		<div class="col-lg-offset-4 col-sm-8">
';

