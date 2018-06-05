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
		<div class="col-lg-offset-4 col-sm-4">
					<h1>Commande N°019584940393</h1>
				</div>
	</div>
	
	<div class="col-lg-offset-2 col-sm-4">
		<ul>
			<br>
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
			<br>
			<li><strong>Article : </strong></li>
			<li><strong>Quantité : </strong></li>
			<li><strong>Prix : </strong></li>
			<br>
		<ul>
			
	</div><div class="col-sm-4">
			'.$FirstName.' '.$LastName.'<br>
			<br>
			Chemin de MescouillesMickey 13<br>
			1080<br>
			Vevey<br>
			<br>
			01.01.2018<br>
			019584940393<br>
			<br>
			Envoyée<br>
			Nature<br>
			Accepté<br>
			<br>
			Corsair CX550M<br>
			2<br>
			140 CHF<br>
			<br>
			
	</div>
	
	<div class="col-sm-12">
		<span class="separation">
	</div>

	<div class="col-lg-offset-2 col-sm-4">
		<ul><li><strong>TOTAL : </strong></li></ul>
	</div>
	
	<div class="col-sm-4">
		<strong>140 CHF</strong>
	</div>
		
	
	

';    

/*

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

echo'</strong></li></ul>';

*/