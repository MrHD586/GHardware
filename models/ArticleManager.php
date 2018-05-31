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
		 
		//Récupère les articles par id
		public function getArticles($idarticle) {
			$sql = "SELECT * FROM t_articles WHERE idArticle='$idarticle'"; 
			$resultat = $this->dbManager->Query($sql);
			return $resultat->fetchAll();
		}
		
		
		public function searchArticle($search_keyword, $limit = null){
		    $sql = "SELECT * FROM t_articles WHERE AName LIKE :keyword OR AStock LIKE :keyword 
                    OR APrix LIKE :keyword OR ADescription LIKE :keyword OR APrix LIKE :keyword OR Fk_Categories LIKE :keyword 
                    OR Fk_Marque LIKE :keyword OR Fk_PicArticles LIKE :keyword ORDER BY idArticle";
		    
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
		    $sql = "INSERT INTO t_articles (AName, AStock, APrix, ADescription,isActive, Fk_Categories, Fk_Marque, Fk_PicArticles)
                    VALUES ('$articleName', '$articleStock', '$articlePrice', '$articleDescription',
		                     b'$articleIsActive', '$articleCategory',' $articleBrand', '$articlePicArticle')";
		    $this->dbManager->Query($sql);
		}
		
		//Modifie un article existant
		public function modifyArticle($articleId, $articleName, $articleStock, $articlePrice, $articleDescription,
		                              $articleCategory, $articleBrand, $articlePicArticle, $articleIsActive){
	       $sql = "UPDATE t_articles SET AName = '$articleName', AStock ='$articleStock', APrix ='$articlePrice', 
                       ADescription = '$articleDescription', isActive = b'$articleIsActive',Fk_Categories ='$articleCategory', 
                       Fk_Marque ='$articleBrand', Fk_PicArticles ='$articlePicArticle' 
                       WHERE idArticle = '$articleId'";
		  $resultat = $this->dbManager->Query($sql);
		}
		
		//Récupère arts par nom
		public function articleExists($articleName){
		    $sql = "SELECT COUNT(*) AS articleExists FROM t_articles WHERE AName = '$articleName'";
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
		
		//Récupère toutes les catègories
		public function ListArticleActive() {
		    $sql = "SELECT * FROM t_articles WHERE isActive = 1 ORDER BY idArticle";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
		
		//Récupère toutes les catègories
		public function ListArticleInactive() {
		    $sql = "SELECT * FROM t_articles WHERE isActive = 0 ORDER BY idArticle";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
		
		//Rend inactif les arcticles
		public function setArticleInactive($idarticle) {
		    $sql = "UPDATE t_articles SET isActive = b'0' WHERE idArticle = '$idarticle'";
		    $resultat = $this->dbManager->Query($sql);
		}		
		
		//Récupère les noms des catègories
		public function getCategoriesName() {
		    $sql = "SELECT Ccategorie FROM t_categories WHERE isActive = 1 ORDER BY Ccategorie";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
		
		//Récupère tout des catégories
		public function getCategoriesAll() {
		    $sql = "SELECT * FROM t_categories WHERE isActive = 1 ORDER BY CCategorie";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
		
		//Récupère toutes les marques
		public function getBrandAll() {
		    $sql = "SELECT * FROM t_marque WHERE isActive = 1 ORDER BY MMarque";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
		
		
		//Récupère toutes les images
		public function getPicArticleAll() {
		    $sql = "SELECT * FROM t_picarticles WHERE isActive = 1 ORDER BY PPicArticles";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
		
		
		public function getarticleCommentaire($idarticle) {
		    $sql = "SELECT * FROM t_commentaire WHERE Fk_Article='$idarticle' AND CEtat=2";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
		
		public function getuserCommentaire($iduser) {
		    $sql = "SELECT * FROM t_commentaire WHERE Fk_User='$iduser'";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat->fetchAll();
		}
		
		public function getUserName($userLogin){
		    $sql = "SELECT * FROM t_user WHERE idUser ='$userLogin'";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat;
		}
		
		public function setNewCommentaire($CEtat, $CTexte, $Fk_User, $Fk_Article) {
		    $sql = "INSERT INTO t_commentaire (CEtat, CTexte, Fk_User, Fk_Article)
                    VALUES ('$CEtat', '$CTexte', 'Fk_User', 'Fk_Article')";
		    $this->dbManager->Query($sql);
		}
		public function getidUserName($userLogin){
		    $sql = "SELECT * FROM t_user WHERE ULogin = '$userLogin'";
		    $resultat = $this->dbManager->Query($sql);
		    return $resultat;
		}
		
	}
