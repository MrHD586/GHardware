<?php 
$number=0;
$Prix=0;
$PrixTotal=0;
foreach($order as $value){
    
    if($number<=0){
    echo 'Date de commande:'.$value['Date'].'</br>';
    echo 'Numero commande:'.$value['NumberOrder'].'</br>';
    if($value['State']==0){
        
        echo'Etat commande:'.'En attente du payement'.'<br>';
        
    }else if($value['State']==1){
        
        echo'Etat commande:'.'Envoyer'.'<br>';
        
    }else{
        
        echo'Etat commande:'.'Arriver à destination'.'<br>';
        
    }
    if($value['PayementMethod']==0){
        
        echo'Payement methode:'.'Nature'.'<br>';
        
    }else if($value['PayementMethod']==1){
        
        echo'Payement methode:'.'Facture'.'<br>';
        
    }
    if($value['PayementState']==0){
        
        echo'Etat payement:'.'En cour de traitement'.'<br>';
        
    }else if($value['PayementState']==1){
        
        echo'Etat payement:'.'Payer'.'<br>';
        
    }else{
        
        echo'Etat payement:'.'Payement refuser'.'<br>';
    }
    $number++;   
    }
    foreach($articles as $values){
        if(($value['Fk_Article'])==($values['idArticle'])){
            $Prix += $value['Number']*$values['Price'];
            $PrixTotal += $value['Number']*$values['Price'];
            echo 'Article:'.$values['Name'].'</br>';
            echo 'Nombre commandé:'.$value['Number'].'</br>';
            echo 'Prix totale:'.$Prix.'</br>';
        }
    }
    $Prix=0;
}
echo'Total:'.$PrixTotal;