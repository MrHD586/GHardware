<?php
$Panier = unserialize($_COOKIE['Panier']);
foreach($Panier as $value){
echo $value; 
echo '</br>';
}