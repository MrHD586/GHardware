<?php

echo'<link href="views/Assets/css/printstyle.css" rel="stylesheet">';

$number=0;
$Prix=0;
$PrixTotal=0;

echo'

	<div class="col-sm-12">
		<div class="showing">
			<div class="col-lg-offset-4 col-sm-4">
				<img id="imgprint" src="images/GHardwareLogoB.png"><br>
			</div>
		</div>
		
	</div>
	<div class="col-sm-12">
		<div class="col-lg-offset-2 col-sm-8">
					<h1>Commande N°019584940393</h1>
		
	

';    



echo'
	
';

foreach($order as $value){
    if($number<=0){
        echo'<li>Adresse : '.$FirstName.' '.$LastName.'</br>'.$Road.'</br>'.$NPA.' '.$Town.'</br></li>';
        echo '<li>Date de commande : '.$value['Date'].'</li>';
        echo '<li>Numero commande : '.$value['NumberOrder'].'</li>';
        if($value['State']==0){
        
            echo'<li>Etat commande : '.'En attente du payement'.'</li>';
        
        }else if($value['State']==1){
        
            echo'<li>Etat commande : '.'Envoyée'.'</li>';
        
        }else{
        
            echo'<li>Etat commande : '.'Arrivée à destination'.'</li>';
        
        }
        if($value['PayementMethod']==0){
        
            echo'<li>Payement methode : '.'Nature'.'</li>';
        
        }else if($value['PayementMethod']==1){
        
            echo'<li>Payement methode : '.'Facture'.'</li>';
        
        }
        if($value['PayementState']==0){
        
            echo'<li>Etat payement : '.'En cours de traitement'.'</li>';
        
        }else if($value['PayementState']==1){
        
            echo'<li>Etat payement : '.'Payé'.'</li>';
        
        }else{
        
            echo'<li>Etat payement : '.'Payement refuser'.'</li>';
        }
        $number++;   
    }
    foreach($articles as $values){
        if(($value['Fk_Article'])==($values['idArticle'])){
            $Prix += $value['Number']*$values['Price'];
            $PrixTotal += $value['Number']*$values['Price'];
            echo '<li>Article : '.$values['Name'].'</li>';
            echo '<li>Nombre commandé : '.$value['Number'].'</li>';
            echo '<li>Prix:'.$Prix.'</li>';
        }
    }
    $Prix=0;
}
echo'<br><strong><li>Total prix : '.$PrixTotal;

echo'</strong></li></ul></div>
	</div>';

