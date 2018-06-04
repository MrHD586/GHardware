<?php
	################################################################################
	#### Auteur : Butticaz Yvann   
	#### Date : 26 Février 2018
	#### Classe ArticleManager :
    #### 		Cette classe possède des fonctions effectuants
    ####		des requêtes souvant utilisées.
	################################################################################

	//include de la classe DbManager
	include("models/DbManager.php");
	
	
	class ArticleManager {
		
		private $dbManager;
		
		function __construct(){
			//instantiation de la classe DbManager
            $this->dbManager = new DbManager();
		}
		 
		//Récupère les articles et image par id
		public function getArticleByIdAndImage($idarticle) {
		    $sql = "SELECT * FROM t_article INNER JOIN t_imagearticle ON t_article.Fk_ImageArticle = t_imagearticle.idImageArticle WHERE idArticle='".intval($idarticle)."' AND t_imagearticle.isActive = 1"; 
			$resultat = $this->dbManager->Query($sql);
			return $resultat->fetchAll();
		}
		
		//Récupère les articles et image par id
		public function getArticleIdByName($articleName) {
		    $sql = "SELECT idArticle FROM t_article WHERE Name = '$articleName'";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
		
		
		//récupére et recherche les articles actifs
		public function searchActiveArticle($search_keyword, $limit = null){
		    $sql = "SELECT * FROM t_article WHERE isActive = 1 AND (Name LIKE :keyword OR Stock LIKE :keyword 
                    OR Price LIKE :keyword OR Description LIKE :keyword OR Fk_Category LIKE :keyword 
                    OR Fk_Brand LIKE :keyword OR Fk_ImageArticle LIKE :keyword) ORDER BY idArticle";
		    
		    if(empty($limit) || $limit == NULL){
		      $resultat = $this->dbManager->tablesQuery($sql, $search_keyword);   
		    }else{
		      $sqlQuery = $sql.$limit;
		      $resultat = $this->dbManager->tablesQuery($sqlQuery, $search_keyword);
		    }
		    
		    return $resultat;
		}
		
		
		//récupére et recherche les articles inactifs
		public function searchInactiveArticle($search_keyword, $limit = null){
		    $sql = "SELECT * FROM t_article WHERE isActive = 0 AND (Name LIKE :keyword OR Stock LIKE :keyword
                    OR Price LIKE :keyword OR Description LIKE :keyword OR Price LIKE :keyword OR Fk_Category LIKE :keyword
                    OR Fk_Brand LIKE :keyword OR Fk_ImageArticle LIKE :keyword) ORDER BY idArticle";
		    
		    if(empty($limit) || $limit == NULL){
		        $resultat = $this->dbManager->tablesQuery($sql, $search_keyword);
		    }else{
		        $sqlQuery = $sql.$limit;
		        $resultat = $this->dbManager->tablesQuery($sqlQuery, $search_keyword);
		    }
		    
		    return $resultat;
		}		
		
		
		//Crée un nouvel article
		public function setNewArticle($articleName, $articleStock, $articlePrice, $articleDescription,
		                              $articleCategory, $articleBrand, $articlePicArticle, $articleIsActive) {
		    $sql = "INSERT INTO t_article (Name, Stock, Price, Description, isActive, Fk_Category, Fk_Brand, Fk_ImageArticle)
                    VALUES ('$articleName', '$articleStock', '$articlePrice', '$articleDescription',
		                     b'$articleIsActive', '$articleCategory',' $articleBrand', '$articlePicArticle')";
		    $this->dbManager->Query($sql);
		}
		
		//Modifie un article existant
		public function modifyArticleById($articleId, $articleName, $articleStock, $articlePrice, $articleDescription,
		                              $articleCategory, $articleBrand, $articlePicArticle, $articleIsActive){
	       $sql = "UPDATE t_article SET Name = '$articleName', Stock ='$articleStock', Price ='$articlePrice', 
                       Description = '$articleDescription', isActive = b'$articleIsActive',Fk_Category ='$articleCategory', 
                       Fk_Brand ='$articleBrand', Fk_ImageArticle ='$articlePicArticle' 
                       WHERE idArticle =".intval($articleId); 
		  $resultat = $this->dbManager->Query($sql);
		}
		
		//Rend inactif les arcticles
		public function setArticleInactiveById($idarticle) {
		    $sql = "UPDATE t_article SET isActive = b'0' WHERE idArticle =".intval($idarticle); 
		    $resultat = $this->dbManager->Query($sql);
		}	
		
		
		//Récupère articles par nom
		public function articleNameExists($articleName){
		    $sql = "SELECT COUNT(*) AS articleExists FROM t_article WHERE Name = '$articleName'";
		    $resultat = $this->dbManager->Query($sql);
		    $donnees = $resultat->fetch();
		    $resultat->closeCursor();
		    $resultOfCount = $donnees['articleExists'];
		    
		    if($resultOfCount != 0){
		        $resultat = TRUE;
		    }else{
		        $resultat = FALSE;
		    }
		    
		    return $resultat;
		}
		
		
		//Récupère tout des catégories
		public function getCategory() {
		    $sql = "SELECT * FROM t_category WHERE isActive = 1 ORDER BY CName";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
		
		//Récupère les noms des catègories
		public function getCategoryName() {
		    $sql = "SELECT CName FROM t_category WHERE isActive = 1 ORDER BY CName";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
	
		//Récupère tout des catégories
		public function getCategoryNameById($idCategory) {
		    $sql = "SELECT CName FROM t_category WHERE idCategory = '$idCategory'"; 
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetch();
		}
		
		
		
		//Récupère toutes les marques
		public function getBrand() {
		    $sql = "SELECT * FROM t_brand WHERE isActive = 1 ORDER BY BName";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
		
		//Récupère toutes les marques
		public function getBrandNameById($idBrand) {
		    $sql = "SELECT BName FROM t_brand WHERE isActive = 1 AND idBrand =".intval($idBrand); ;
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetch();
		}
		
		
		
		//Récupère toutes les images
		public function getImageArticle() {
		    $sql = "SELECT * FROM t_ImageArticle WHERE isActive = 1 ORDER BY Link";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
		
		//Récupère les images par id
		public function getImageArticleNameById($idImageArticle) {
		    $sql = "SELECT Link FROM t_ImageArticle WHERE isActive = 1 AND idImageArticle = ".intval($idImageArticle); 
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetch();
		}
		
		
		public function getArticleCommentByID($idArticle) {
		    $sql = "SELECT * FROM t_comment WHERE Fk_Article ='".intval($idArticle)."' AND State=2";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
		
		public function getCommentByUserId($idUser) {
		    $sql = "SELECT * FROM t_comment WHERE Fk_User =".intval($idUser); 
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
		
		public function getUserByIdAndImage($userId){
		    $sql = "SELECT * FROM t_user INNER JOIN t_imageuser ON t_user.Fk_ImageUser = t_imageuser.idImageUser WHERE idUser ='".intval($userId)."' AND t_imageuser.isActive = 1" ; 
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat;
		}
		
		public function setNewComment($State, $Text, $Fk_User, $Fk_Article) {
		    $sql = "INSERT INTO t_comment (State, Text, Fk_User, Fk_Article)
                    VALUES ('$State', '$Text', 'Fk_User', 'Fk_Article')";
		    $this->dbManager->Query($sql);
		}
		public function getUserByLogin($userLogin){
		    $sql = "SELECT * FROM t_user WHERE Login = '$userLogin'";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat;
		}
		
		
		//Crée un nouvel article
		public function insertRss($rssTitle, $rssLink, $rssGuid, $rssDescription, $rssPubDate) {
		        $sql = "INSERT INTO t_rss (Title, Link, Guid, Description, pubDate)
                        VALUES ('$rssTitle', '$rssLink', '$rssGuid', '$rssDescription', '$rssPubDate')";
		        $this->dbManager->Query($sql);
		}
		//Récupère les données du rss
		public function getRSS($index_selection, $limitation) {
		    $sql = "SELECT * FROM t_rss ORDER BY pubDate DESC LIMIT :index_selection, :limitation";
		    $resultat = $this->dbManager->RSSQuery($sql, $index_selection, $limitation);
		    return $resultat->fetchAll();
		}
	}
