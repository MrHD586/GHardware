<?php
    ################################################################################
    #### Auteur : Viquerat Killian
    #### Date : 13 Mars 2018
    #### Page controllers/Cart/SupprimerArticles.php:
    #### Suppression des articles ce trouvant dans le panier
    ################################################################################
    
    session_start();
    include 'models/ArticleManager.php';
    $articleManager = new ArticleManager();
    
    //Récuperation du panier dans le cookie
    $Panier = unserialize($_COOKIE['Panier']);
    
    //dédoublement des valeurs du panier
    $PanierNoDouble = array_unique($Panier);
    
    //initialisation d'une variable pour l'indexation du tableau finale
    $nbtableau= 0;
    
    //pour chaque articles présent dans le panier
   
    if($_POST['vider']!= NULL){
        $newPanier;
    }else{
        foreach($PanierNoDouble as $value){
            //test si la valeur du post et définie pour l'article
            $article = $articleManager->getArticleById($value);
            if(isset($_POST[''.$value.''])){
                $nombre =$_POST[''.$value.''];
                foreach($article as $article){
                    if($nombre > $article['Stock']){
                       $nombre = $article['Stock'];
                    }
                
                
                //attribution de la valeur du nombre du meme article dans une variable
                $nombrearticles=$nombre;
                //pour chaque nombre d'articles 
                for($i=1;$i<=$nombrearticles;$i++){
                    //Ajout dans le tableau du panier avec l'indexation de la variable initialiser au début
                    $newPanier[$nbtableau]=$value;
                    //Augmentation de la variable pour rester toujours a l'index suivant pour éviter de supprimer des valeurs
                    $nbtableau++;
                }
                }
        }
    }
    }
    //rafraichissement des valeurs dans le cookie
    setcookie('Panier',serialize($newPanier));
    //redirection vers l'affichage des articles dans le panier
    header("location:index.php?controller=Cart&action=displayCookie");
