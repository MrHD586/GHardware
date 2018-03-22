<?php
//Récuperation du panier dans le cookie
$Panier = unserialize($_COOKIE['Panier']);
//dédoublement des valeurs du panier
$PanierNoDouble = array_unique($Panier);
//initialisation d'une variable pour l'indexation du tableau finale
$nbtableau= 0;
//pour chaque articles présent dans le panier
foreach($PanierNoDouble as $value){
    //test si la valeur du post et définie pour l'article
    if(isset($_POST[''.$value.''])){
        //test si la valeur de ce post n'est pas égale à 0 ou en dessous
        if(($_POST[''.$value.''])> 0){
        //attribution de la valeur du nombre du meme article dans une variable
        $nombrearticles=$_POST[''.$value.''];
        //pour chaque nombre d'articles 
        for($i=1;$i<=$nombrearticles;$i++){
            //Ajout dans le tableau du panier avec l'indexation de la variable inistialiser au début
            $newPanier[$nbtableau]=$value;
            //Augmentation de la variable pour rester toujours a l'index suivant pour éviter de supprimer des valeurs
            $nbtableau++;
        }
        }
}
}
//rafraichissement des valeurs dans le cookie
setcookie('Panier',serialize($newPanier));
//redirection vers l'affichage des articles dans le panier
header("location:index.php?controller=Cart&action=affichecookie");
