<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 01 Juin 2018
#### Page controllers/order/order.php:
#### Gestion des donnée de la order
################################################################################

include 'models/OrderManager.php';

session_start();
$commandeManager = new OrderManager();
//récuperation du nom d'utilisateur
$userLogin = $_SESSION['user_name'];
//récuperation des donnée de l'utilisateur par rapport a son login
$user = $commandeManager->getUserByLogin($userLogin);
// attribution de l'id de l'utilisateur a une variable
foreach($user as $value){
    $iduser = $value['idUser'];
}
//récuperation des donnée du panier de l'utilisateurr
$Panieruser = $commandeManager->getPanierByUserId($iduser);
//Condition pour savoir si l'utilisateur veux passer la commande
if(isset($_POST['continuer'])){
    //test pour savoir si l'utilisateur a choisit un moyen de payment
    if(isset($_POST['payment'])){
        //récuperation de la method de payement
        $PayementMethod=$_POST['payment'];
        //timestamp pour le numéro de l'order
        $NumberOrder=time();
        //date d'aujourd'hui pour le passage de la commande
        $Date=Date("Y-m-d");
        //état de la commande a 0 par défaut
        $State= 0;
        //état du payement a 0
        $PayementState= 0;
        //pour chaque articles du panier faire un enregistrement dans la table order
        foreach($Panieruser as $value){
            //récuperation de l'id du cart
            $Fk_Cart=$value['idCart'];
            //recuperation de l'id de l'article
            $idarticle=$value['Fk_Article'];
            //Ajout dans la base de donnée de l'enregistrement pour l'order avec la Date,Numéro de commande, Etat de commande, Moyen de payement, l'etat du payement, Article du panier
            $Orderuser= $commandeManager->setNewOrder($Date, $NumberOrder, $State, $PayementMethod, $PayementState, $Fk_Cart);
            //mise à jour du champ isOrder dans la table cart pour savoir que l'article ce trouve dans une commande
            $UpdatePanier= $commandeManager->updateValuePanier($Fk_Cart);
            //récuperation des donnée de l'article ajouté à la commande
            $Article=$commandeManager->getArticleById($idarticle);
            //For pour calculer le nouveau stock
            foreach($Article as $values){
                //calcul du nouveau stock
                $NewStock=($values['Stock'])-($value['Number']);
            }
            //mise à jour du stock dans la base de donnée
            $UpdateArticle= $commandeManager->updateValueArticle($NewStock,$idarticle);
        }
    //redirection sur la page ou l'utilisateur voit toute ces commande
    header("location:index.php?controller=User&action=AllCommande");
    }
//test pour savoir si l'utilisateur n'a voulu ne pas finaliser sa commande
}else if(isset($_POST['annuler'])){
    //redirection sur le panier
    header("location:index.php?controller=Cart&action=bdd");
}
//récupertion des donnée des category pour avoir leur nom
$aside = $commandeManager->getCategoryName();

include 'views/aside.php';
include 'views/Order/order.php';