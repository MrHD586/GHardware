<?php
Foreach($articles as $value){
    foreach($value as $value){
        $index = $value['idArticle'];
        $prixtotal = $value['APrix'] * $PanierNb[$index];
        echo 'Nom Article  : ';
        echo $value['AName'];
        echo'   ';
        echo 'Prix : ' ;
        echo $value['APrix'];
        echo'   ';
        echo 'Nombre  : ';
        echo $PanierNb[$index];
        echo'   ';
        echo 'Prix total: ';
        echo $prixtotal;
        echo '</br>';
        
    }
}