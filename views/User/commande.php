<?php 

echo'<link href="views/Assets/css/printstyle.css" rel="stylesheet">';

$number=0;
$Prix=0;
$PrixTotal=0;

echo'

	<div class="col-sm-12">
		<div class="showing">
			<div class="col-lg-offset-4 col-sm-4">
				<img class="showing" id="imgprint" src="images/GHardwareLogoB.png">
				<h1>Commande</h1>
			</div>
		</div>
	</div>
	
	<div class="col-lg-offset-2 col-sm-10">

';    

echo'
	<ul>
';

foreach($order as $value){
    if($number<=0){
        echo'<li>Adresse : '.$FirstName.' '.$LastName.'</br>'.$Road.'</br>'.$NPA.' '.$Town.'</br></li>';
        echo '<li>Date de commande : '.$value['Date'].'</li></br>';
        echo '<li>Numero commande : '.$value['NumberOrder'].'</li></br>';
        if($value['State']==0){
        
            echo'<li>Etat commande : '.'En attente du payement'.'</li><br>';
        
        }else if($value['State']==1){
        
            echo'<li>Etat commande : '.'Envoyer'.'</li><br>';
        
        }else{
        
            echo'<li>Etat commande : '.'Arriver à destination'.'</li><br>';
        
        }
        if($value['PayementMethod']==0){
        
            echo'<li>Payement methode : '.'Nature'.'</li><br>';
        
        }else if($value['PayementMethod']==1){
        
            echo'<li>Payement methode : '.'Facture'.'</li><br>';
        
        }
        if($value['PayementState']==0){
        
            echo'<li>Etat payement : '.'En cours de traitement'.'</li><br>';
        
        }else if($value['PayementState']==1){
        
            echo'<li>Etat payement : '.'Payé'.'</li><br>';
        
        }else{
        
            echo'<li>Etat payement : '.'Payement refuser'.'</li><br>';
        }
        $number++;   
    }
    foreach($articles as $values){
        if(($value['Fk_Article'])==($values['idArticle'])){
            $Prix += $value['Number']*$values['Price'];
            $PrixTotal += $value['Number']*$values['Price'];
            echo '<li>Article:'.$values['Name'].'</li></br>';
            echo '<li>Nombre commandé:'.$value['Number'].'</li></br>';
            echo '<li>Prix:'.$Prix.'</li></br>';
        }
    }
    $Prix=0;
}
echo'<br><strong><li>Total prix : '.$PrixTotal;

echo'</strong></li></ul></div>';