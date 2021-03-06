<?php
################################################################################
#### Auteur : Viquerat Killian
#### Date : 01 Juin 2018
#### Classe OrderManager :
#### 		Cette classe possède des fonctions effectuants
####		des requêtes souvant utilisées.
################################################################################

//include de la classe DbManager
include("models/DbManager.php");


class OrderManager {
    
    private $dbManager;
    
    function __construct(){
        //instantiation de la classe DbManager
        $this->dbManager = new DbManager();
    }
    
    //Récupère les noms des catègories
    public function getCategoryName() {
        $sql = "SELECT CName FROM t_category WHERE isActive = 1 ORDER BY CName";
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetchAll();
    }
    
    //récupération du user par login
    public function getUserByLogin($userLogin){
        $sql = "SELECT * FROM t_user WHERE Login = '$userLogin'";
        $resultat = $this->dbManager->Query($sql);
        return $resultat;
    }
    
    // récupération du login par id
    public function getUserLoginById($userId){
        $sql = "SELECT Login FROM t_user WHERE idUser = '$userId'";
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetch();
    }
    
    
    // récupération du panier celon l'id du user
    public function getPanierByUserId($iduser) {
        $sql = "SELECT * FROM t_cart WHERE Fk_User='$iduser' AND isOrder=0" ;
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetchAll();
    }
    //création d'une commande
    public function setNewOrder($Date, $NumberOrder, $State, $PayementMethod, $PayementState, $Fk_Cart) {
        $sql = "INSERT INTO t_order (Date, NumberOrder, State, PayementMethod, PayementState, Fk_Cart)
                        VALUES ('$Date', '$NumberOrder', '$State','$PayementMethod','$PayementState','$Fk_Cart')";
        $this->dbManager->Query($sql);
    }
    public function updateValuePanier($idCart) {
        $sql = "UPDATE t_cart SET isOrder=1 WHERE idCart='$idCart'";
        $this->dbManager->Query($sql);
    }
    //Récupère la commande
    public function getAllOrder($Fk_User) {
        $sql = "SELECT * FROM t_order INNER JOIN t_cart ON t_order.Fk_Cart = t_cart.idCart WHERE t_cart.Fk_User = '$Fk_User'";
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetchAll();
    }
    public function getArticleById($idarticle) {
        $sql = "SELECT * FROM t_article WHERE idArticle=".intval($idarticle);
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetchAll();
    }
    public function getArticle() {
        $sql = "SELECT * FROM t_article";
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetchAll();
    }
    public function updateValueArticle($NewStock,$idArticle) {
        $sql = "UPDATE t_article SET Stock='$NewStock' WHERE idArticle='$idArticle'";
        $this->dbManager->Query($sql);
    }
    
    //Récupère la commande
    public function getOrder($Fk_User,$NumberOrder) {
        $sql = "SELECT * FROM t_order INNER JOIN t_cart ON t_order.Fk_Cart = t_cart.idCart WHERE t_cart.Fk_User = '$Fk_User' AND t_order.NumberOrder= '$NumberOrder'";
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetchAll();
    }
    
    //Récupère la commande
    public function getOrderByID($orderId) {
        $sql = "SELECT * FROM t_order  WHERE idOrder =".intval($orderId);
        $resultat = $this->dbManager->Query($sql);
        return $resultat->fetchAll();
    }
    
    //récupére et recherche les commande en attente
    public function searchWaitingOrder($search_keyword, $limit = null){
        $sql = "SELECT * FROM t_order WHERE State = 0  AND (Date LIKE :keyword OR NumberOrder LIKE :keyword)
                ORDER BY idOrder DESC";
        
        if(empty($limit) || $limit == NULL){
            $resultat = $this->dbManager->tablesQuery($sql, $search_keyword);
        }else{
            $sqlQuery = $sql.$limit;
            $resultat = $this->dbManager->tablesQuery($sqlQuery, $search_keyword);
        }
        
        return $resultat;
    }
    
    //récupére et recherche les commande refusées
    public function searchSendOrder($search_keyword, $limit = null){
        $sql = "SELECT * FROM t_order WHERE State = 1  AND (Date LIKE :keyword OR NumberOrder LIKE :keyword)
                    ORDER BY idOrder DESC";
        
        if(empty($limit) || $limit == NULL){
            $resultat = $this->dbManager->tablesQuery($sql, $search_keyword);
        }else{
            $sqlQuery = $sql.$limit;
            $resultat = $this->dbManager->tablesQuery($sqlQuery, $search_keyword);
        }
        
        return $resultat;
    }
    
    //récupére et recherche les commande validées
    public function searchDeliveredOrder($search_keyword, $limit = null){
        $sql = "SELECT * FROM t_order WHERE State = 2  AND (Date LIKE :keyword OR NumberOrder LIKE :keyword)
                    ORDER BY idOrder DESC";
        
        if(empty($limit) || $limit == NULL){
            $resultat = $this->dbManager->tablesQuery($sql, $search_keyword);
        }else{
            $sqlQuery = $sql.$limit;
            $resultat = $this->dbManager->tablesQuery($sqlQuery, $search_keyword);
        }
        
        return $resultat;
    }
    
    
    //Modifie un commentaire existant
    public function modifyOrderById($numberorder, $orderState, $orderPaymentState){
        $sql = "UPDATE t_order SET State = '$orderState', PayementState = '$orderPaymentState'  WHERE NumberOrder =".intval($numberorder);
        $resultat = $this->dbManager->Query($sql);
    }
}