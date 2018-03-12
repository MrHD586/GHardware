<?php
$id=$_GET['id'];
$Panier = array($id);
$urlToarticle = "location:index.php?controller=Article&action=article&id=".$id."";
if(isset($_COOKIE["Panier"])){
    $tempPanier = $_COOKIE["Panier"];
    array_push($tempPanier, "".$Panier."");
    setcookie("Panier","".$tempPanier."");
    header($urlToarticle);
}else{
    setcookie("Panier","".$Panier."");
    header($urlToarticle);
}