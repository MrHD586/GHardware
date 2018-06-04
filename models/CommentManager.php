<?php
    ################################################################################
    #### Auteur : Viquerat Killian
    #### Date : 24 mai 2018
    #### Classe CommentaireManager :
    #### 		Cette classe possède des fonctions effectuants
    ####		des requêtes souvant utilisées.
    ################################################################################
    
    //include de la classe DbManager
    include("models/DbManager.php");
    
    
    class CommentManager {
        
        private $dbManager;
        
        function __construct(){
            //instantiation de la classe DbManager
            $this->dbManager = new DbManager();
        }
        
        
        // crée un nouveau commentaire
        public function setNewComment($State, $Texte, $Fk_User, $Fk_Article, $Date) {
            $sql = "INSERT INTO t_comment (State, Text, Fk_User, Fk_Article, Date)
                    VALUES ('$State', '".addslashes($Texte)."', '$Fk_User', '$Fk_Article', '$Date')";
            $this->dbManager->Query($sql);
        }
        
        // récupération des user par login
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
        
        // récupération du login par id
        public function getArticleNameById($articleId){
            $sql = "SELECT Name FROM t_article WHERE idArticle = '$articleId'";
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetch();
        }
        
        // 
        public function deleteValueComment($idComment) {
            $sql = "DELETE FROM t_comment WHERE idComment='$idComment'";
            $this->dbManager->Query($sql);
        }
        
        //récupére le commentaire par id
        public function getCommentById($idComment){
            $sql = "SELECT * FROM t_comment WHERE idComment=".intval($idComment);
            $resultat = $this->dbManager->Query($sql);
            return $resultat->fetchAll();
        }
        
        
        //récupére et recherche les commentaires en attente
        public function searchWaitingComment($search_keyword, $limit = null){
            $sql = "SELECT * FROM t_comment WHERE State = 0  AND (State LIKE :keyword OR Text LIKE :keyword OR Date LIKE :keyword) 
                    ORDER BY idComment";
            
            if(empty($limit) || $limit == NULL){
                $resultat = $this->dbManager->tablesQuery($sql, $search_keyword);
            }else{
                $sqlQuery = $sql.$limit;
                $resultat = $this->dbManager->tablesQuery($sqlQuery, $search_keyword);
            }
            
            return $resultat;
        }
        
        //récupére et recherche les commentaires refusés
        public function searchRefusedComment($search_keyword, $limit = null){
            $sql = "SELECT * FROM t_comment WHERE State = 1  AND (Text LIKE :keyword OR Date LIKE :keyword)
                    ORDER BY idComment";
            
            if(empty($limit) || $limit == NULL){
                $resultat = $this->dbManager->tablesQuery($sql, $search_keyword);
            }else{
                $sqlQuery = $sql.$limit;
                $resultat = $this->dbManager->tablesQuery($sqlQuery, $search_keyword);
            }
            
            return $resultat;
        }
        
        //récupére et recherche les commentairse validés
        public function searchValidateComment($search_keyword, $limit = null){
            $sql = "SELECT * FROM t_comment WHERE State = 2  AND (Text LIKE :keyword OR Date LIKE :keyword)
                    ORDER BY idComment";
            
            if(empty($limit) || $limit == NULL){
                $resultat = $this->dbManager->tablesQuery($sql, $search_keyword);
            }else{
                $sqlQuery = $sql.$limit;
                $resultat = $this->dbManager->tablesQuery($sqlQuery, $search_keyword);
            }
            
            return $resultat;
        }
        
        
        //Modifie un commentaire existant
        public function modifyCommentById($commentId, $commentState, $commentText){
                $sql = "UPDATE t_comment SET State = '$commentState', Text = '$commentText'  WHERE idComment =".intval($commentId);
                $resultat = $this->dbManager->Query($sql);
        }
    }