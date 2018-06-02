<?php 
$number=0;
$PrixTotale=0;
foreach($order as $value){
    
    if($number<=0){
    echo $value['Date'].'</br>';
    echo $value['NumberOrder'].'</br>';
    if($value['State']==0){
        
        echo'En attente du payement'.'<br>';
        
    }else if($value['State']==1){
        
        echo'Envoyer'.'<br>';
        
    }else{
        
        echo'Arriver à destination'.'<br>';
        
    }
    if($value['PayementMethod']==0){
        
        echo'Nature'.'<br>';
        
    }else if($value['PayementMethod']==1){
        
        echo'Facture'.'<br>';
        
    }
    if($value['PayementState']==0){
        
        echo'En cour de traitement'.'<br>';
        
    }else if($value['PayementState']==1){
        
        echo'Payer'.'<br>';
        
    }else{
        
        echo'Payement refuser'.'<br>';
    }
    $number++;   
    }
    
    foreach($articles as $articles){
        if(($value['Fk_Article'])==($articles['idArticle'])){
            echo '1';
            $Prixtotale += $value['Number']*$articles['Price'];
            echo $articles['Name'].'</br>';
            echo $value['Number'].'</br>';
            echo $Prixtotale.'</br>';
        }
    }
    $PrixTotale=0;
}