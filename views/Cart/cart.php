<?php
echo '<form action="index.php?controller=Cart&action=SupprimerArticles" method="POST">';
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
        echo 'Prix total: ';
        echo $prixtotal;
        echo'   ';
        echo 'Nombre  : ';
        
               echo '<input type="number" value="'.$PanierNb[$index].'"name="'.$index.'" style="width: 50px" onchange="submit()">';
              
        echo '</br>';
        
    }
}
echo'</form>';