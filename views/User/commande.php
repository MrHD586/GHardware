<?php 
$number=0;
$PrixTotale=0;
foreach($order as $value){
    if($number<=0){
    echo $value['Date'].'</br>';
    echo $value['NumberOrder'].'</br>';
    if($value['State']==0){
        
        $State='En attente du payement'.'<br>';
        
    }else if($value['State']==1){
        
        $State='Envoyer'.'<br>';
        
    }else{
        
        $State='Arriver à destination'.'<br>';
        
    }
    if($value['PayementMethod']==0){
        
        $State='Nature'.'<br>';
        
    }else if($value['PayementMethod']==1){
        
        $State='Facture'.'<br>';
        
    }
    if($value['PayementState']==0){
        
        $PayementState='En cour de traitement';
        
    }else if($value['PayementState']==1){
        
        $PayementState='Payer';
        
    }else{
        
        $PayementState='Payement refuser';
    }
    $number++;   
    }
    foreach($articles as $articles){
        if($value['Fk_Article']==$articles['idArticle']){
            $Prixtotale += $value['Number']*$articles['Price'];
            echo $articles['Name'].'</br>';
            echo $value['Number'].'</br>';
            echo $Prixtotale.'</br>';
        }
    }
    
}