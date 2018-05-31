<?php
    ################################################################################
    #### Auteur : Viquerat Killian
    #### Date : 10 mai 2018
    #### Page controllers/Cart/AddDeletebdd.php:
    #### Gestions des données du panier
    ################################################################################
    
    include 'models/DeleteAddCartManager.php';
    
    //declaration des variables
    $deleteaddcartManager = new DeleteAddCartManager();
    $articles = $_POST['Articles'];
    $userLogin = $_SESSION['user_name'];
    
    //récuperation des données de l'utilsateur connecter
    $user = $deleteaddcartManager->getUserName($userLogin);
    
    //attribution de l'id de l'utilisateur dans une variable
    
    foreach($user as $value){
        $iduser = $value['idUser'];
    }
    
    //Condition pour savoir si le button vider a été cliquer 
    if($_POST['vider']!= NULL){
        //vidage de toute les données du panier concernatn l'utilisateur connecter
        $deletepanierbdd = $deleteaddcartManager->deletePanier($iduser);
    }else{
        //Condition pour savoir si le post a été set avec une valeur
        if(isset($_POST[''.$articles.''])){
            //attribution de la valeur du post a une variable
            $nombrearticles= $_POST[''.$articles.''];
                //Condition pour savoir si le nombre d'articles est égale ou plus petit a 0
                if($nombrearticles<= 0){
                    //suppresion de la donnée du panier concernat cette artivles
                    $deleteartbdd = $deleteaddcartManager->deleteValueCart($iduser,$articles);
                }else{
                    //update de la donnée avec son nouveau résultat dans le panier
                    $updateartbdd = $deleteaddcartManager->updateValueCart($iduser,$articles,$nombrearticles);
                }
        }
    }
    header("location:index.php?controller=Cart&action=bdd");
