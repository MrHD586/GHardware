<?php
$Panier = unserialize($_COOKIE['Panier']);
$PanierNoDouble = array_unique($Panier);
$nbtableau= 0;
foreach($PanierNoDouble as $value){
    if(isset($_POST[''.$value.''])){
        $nombrearticles=$_POST[''.$value.''];
        for($i=1;$i<=$nombrearticles;$i++){
            $newPanier[$nbtableau]=$value;
            $nbtableau++;
        }
    }else{
        $Nombre = array_count_values($Panier);
        for($i++;$i<=$Nombre;$i){
        $newPanier[$nbtableau]=$value;
        $nbtableau++;
        }
    }   
}
setcookie('Panier',serialize($newPanier));
header("location:index.php?controller=Cart&action=affichecookie");
